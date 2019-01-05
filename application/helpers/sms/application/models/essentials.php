<?php

class essentials extends Model {

    public function randString($length = 40) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function get_all_numbers(){
        global $gcdb, $config;

        $all_numb = $gcdb->get_results("SELECT * FROM tbl_sms_numbers WHERE deleted='false' AND  created_by='" . $config['current_user']['pk_user_id'] . "' ORDER BY created_at DESC");
        return $all_numb;
    }

    public function get_all_sent_sms(){
        global $gcdb, $config;

        $all_sent_sms = $gcdb->get_results("SELECT * FROM tbl_sms WHERE created_by='" . $config['current_user']['pk_user_id'] . "' AND deleted='false' ORDER BY created_at DESC");
        return $all_sent_sms;
    }

    public function get_all_users(){

        global $gcdb, $config;

        $cor_data = [];

        $emp_data = [];

        if($config['current_user']['user_type'] == 'admin'){
            $all_emp = $gcdb->get_results("SELECT * FROM gc_user WHERE user_type!='admin' ORDER BY pk_user_id DESC");
        }
        else {
            $all_emp = $gcdb->get_results("SELECT * FROM gc_user WHERE user_type!='admin' AND user_created_by='" . $config['current_user']['pk_user_id'] . "' ORDER BY pk_user_id DESC");
        }

        foreach($all_emp as $i => $cor){

            $correspond = $gcdb->get_row("SELECT user_firstname, user_lastname FROM gc_user WHERE pk_user_id='" . $cor['user_created_by'] . "'");
            $cor_data['cor'] = $correspond;
            $emp_data[$i] = array_merge($cor, $cor_data);
        }

        return $emp_data;
    }

    public function get_corresponds_name(){
        global $gcdb;

        $correspond = $gcdb->get_results("SELECT gc_user.user_first_name, gc_user.user_first_name FROM gc_user WHERE created_by=gc_user.user_created_by");
        return $correspond;

    }

    public function sendMail($param) {

        $to = $param->sendTo;
        $subject = $param->subject;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: " . $param->name . ' <' . $param->email . '> ' . "\r\n" .
            "Reply-To: " . $param->email . "\r\n" .
            "X-Mailer: PHP/" . phpversion();
        $message = "<html><head>" .
            "<meta http-equiv='Content-Language' content='en-us'>" .
            "<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>" .
            "</head><body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0' bgcolor='' class='background'>" . $param->content .
            "<br><br></body></html>";
        mail($to, $subject, $message, $headers);
    }

}

