<?php

/**
 * Created by PhpStorm.
 * User: Tareq
 * Date: 04/10/2016
 * Time: 2:36 AM
 */
class admin extends Controller {

    function index(){
        global $config;
        if($config['current_user']['user_type'] == 'admin' || $config['current_user']['user_type'] == 'user'){
            $this->dashboard();
        } else {
            self::redirect('profile');
        }
    }

    public function dashboard(){
        if(isset($_SESSION['user'])) {
            $template = $this->loadView('dashboard');
            $template->render();
        }
        else {
            self::redirect('login');
        }
    }

    public function manage_numbers(){

        if(isset($_SESSION['user'])) {

            $module = $this->loadModel('essentials');
            $all_numbers = $module->get_all_numbers();

            $template = $this->loadView('manage_numbers');
            $template->set('all_numbers', $all_numbers);
            $template->render();
        }
        else {
            self::redirect('login');
        }
    }

    public function view_numbers(){

        if(isset($_SESSION['user'])) {

            $module = $this->loadModel('essentials');
            $all_numbers = $module->get_all_numbers();

            $template = $this->loadView('view_numbers');
            $template->set('all_numbers', $all_numbers);
            $template->render();
        }
        else {
            self::redirect('login');
        }
    }

    public function manage_sms(){

        if(isset($_SESSION['user'])) {

            $module = $this->loadModel('essentials');
            $all_numbers = $module->get_all_numbers();

            $template = $this->loadView('manage_sms');
            $template->set('all_numbers', $all_numbers);
            $template->render();
        }
        else {
            self::redirect('login');
        }
    }

    public function view_sms(){

        if(isset($_SESSION['user'])) {

            $module = $this->loadModel('essentials');
            $all_numbers = $module->get_all_sent_sms();

            $template = $this->loadView('view_sms');
            $template->set('all_sent_sms', $all_numbers);
            $template->render();
        }
        else {
            self::redirect('login');
        }
    }


    public function add_users(){
        if(isset($_SESSION['user'])) {

            $template = $this->loadView('add_users');
            $template->render();
        }
        else {
            self::redirect('login');
        }
    }

    public function all_users(){
        if(isset($_SESSION['user'])) {

            $model = $this->loadModel('essentials');

            $all_users = $model->get_all_users();

            $template = $this->loadView('all_users');
            $template->set('all_users',$all_users);
            $template->render();
        }
        else {
            self::redirect('login');
        }
    }

    public function system_settings(){
        $template = $this->loadView('system_settings');
        $template->render();
    }

    public function process_post($action){
        global $gcdb;

        if($_POST == null){
            echo "You don't have permission to process this call. Please stay out from here.";
        }
        else {
            $data = $_POST;

            $process = $this->$action($data);

            return $process;
        }
        return false;
    }

    public function do_ajax_call(){
        global $gcdb;

        $data = $_POST['data'];
        $action = $_POST['action'];

        $process = $this->$action($data);

        echo json_encode($process);

        exit();
    }

    public function add_number(){

        global $gcdb, $config;

        $for_alert = [];

        $_POST = $gcdb->deep_escape($_POST);

        $snumber = str_replace('-', '', $_POST['new_number']);


        $data = [
            'sms_number' => '+' . $_POST['countryCode'] . $snumber,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $config['current_user']['pk_user_id'],
            'modified_at' => date('Y-m-d H:i:s'),
            'modified_by' => $config['current_user']['pk_user_id'],
        ];

        $check = $gcdb->get_row("SELECT sms_number FROM tbl_sms_numbers WHERE sms_number='" . $data['sms_number'] . "'");

        if(!$check){
            $add_num = $gcdb->insert_update('tbl_sms_numbers', $data);

            if(!$add_num){
                $for_alert['status'] = 'error';
                $for_alert['msg'] = 'Opps! number cannot added at this time. There was a problem.';
            }
            else {
                $for_alert['status'] = 'success';
                $for_alert['msg'] = 'Number successfully added.';
            }
        }
        else {
            $for_alert['status'] = 'error';
            $for_alert['msg'] = "Number already used. please double check <span style='color: #ff0000;'>" . $data['number'] . "</span> and try again." ;
        }

        $template = $this->loadView('manage_numbers');
        $template->set('notify', $for_alert);
        $template->render();

    }

    public function import_from_text(){

        global $gcdb, $config;

        $inserted = [];

        $for_alert = [];

        if ($_FILES['txt_file']['size'] > 0) {

            //get the csv file
            $file = $_FILES['txt_file']['tmp_name'];
            $handle = fopen($file, "r");

            $create_numbers = explode(PHP_EOL, file_get_contents($_FILES['txt_file']['tmp_name']));

            //loop through the csv file and insert into database

            foreach ($create_numbers as $i => $v){
                $inserted[$i] = $v;
            }

            $duplicate_count = 1;

            foreach(array_filter($inserted) as $v){
                $check_nums = $gcdb->get_row("SELECT sms_number FROM tbl_sms_numbers WHERE sms_number = '" . $v . "'");

                if(!$check_nums){
                    $sql = "INSERT INTO tbl_sms_numbers(sms_number, created_at, created_by, modified_at, modified_by) VALUES ('" . $v . "', '" . date('Y-m-d H:i:s') . "', '" . $config['current_user']['pk_user_id'] . "', '" . date('Y-m-d H:i:s') . "', '" . $config['current_user']['pk_user_id'] . "')";
                    $dis = $gcdb->query($sql);

                    if($dis){
                        $for_alert['status'] = 'success';
                        $for_alert['msg'] = 'Import Success.';
                    }
                    else {
                        $for_alert['status'] = 'error';
                        $for_alert['msg'] = 'Sorry! There was an error. Cant import now.';
                    }

                }
                else {
                    $for_alert['status'] = 'success';
                    $for_alert['msg'] = "Total <span color='#ff0000'>" . $duplicate_count++ . "</span> Duplicate number found on this file.";
                }
            }
            fclose($handle);
            $template = $this->loadView('manage_numbers');
            $template->set('notify', $for_alert);
            $template->render();
        }

    }

    public function import_from_csv(){
        global $gcdb, $config;

        $inserted = [];

        $for_alert = [];

        if ($_FILES['csv_file']['size'] > 0) {

            //get the csv file
            $file = $_FILES['csv_file']['tmp_name'];
            $handle = fopen($file, "r");

            //loop through the csv file and insert into database
            while (($line = fgetcsv($handle)) !== FALSE) {
                //$line is an array of the csv elements
                $inserted[] = $line[0];
            }

            $duplicate_count = 1;
            foreach($inserted as $v){
                $check_nums = $gcdb->get_row("SELECT sms_number FROM tbl_sms_numbers WHERE sms_number = '" . $v . "'");

                if(!$check_nums){
                    $sql = "INSERT INTO tbl_sms_numbers(sms_number, created_at, created_by, modified_at, modified_by) VALUES ('" . $v . "', '" . date('Y-m-d H:i:s') . "', '" . $config['current_user']['pk_user_id'] . "', '" . date('Y-m-d H:i:s') . "', '" . $config['current_user']['pk_user_id'] . "')";
                    $dis = $gcdb->query($sql);

                    if($dis){
                        $for_alert['status'] = 'success';
                        $for_alert['msg'] = 'Import Success.';
                    }
                    else {
                        $for_alert['status'] = 'error';
                        $for_alert['msg'] = 'Sorry! There was an error. Cant import now.';
                    }

                }
                else {
                    $for_alert['status'] = 'success';
                    $for_alert['msg'] = "Total <span color='#ff0000'>" . $duplicate_count++ . "</span> Duplicate number found on this file.";
                }
            }
            fclose($handle);
            $template = $this->loadView('manage_numbers');
            $template->set('notify', $for_alert);
            $template->render();
        }
    }

    public function delete_number($data){
        global $gcdb, $config;

        $datad = [
            'deleted' => 'true',
        ];

        $for_alert = [];

        $delete = $gcdb->insert_update('tbl_sms_numbers', $datad, " num_id='" . $data . "'");
        if($delete){
            $for_alert['status'] = 'success';
            $for_alert['msg'] = 'Number successfully Deleted.';
        }
        else {
            $for_alert['status'] = 'error';
            $for_alert['msg'] = 'Sorry we cannot delete this number now.';
        }
        $module = $this->loadModel('essentials');
        $all_numbers = $module->get_all_numbers();

        $template = $this->loadView('view_numbers');
        $template->set('notify', $for_alert);
        $template->set('all_numbers', $all_numbers);
        $template->render();

    }

    public function delete_sms($data){
        global $gcdb, $config;

        $datad = [
            'deleted' => 'true',
        ];

        $for_alert = [];

        $delete = $gcdb->insert_update('tbl_sms', $datad, " send_id='" . $data . "'");

        if($delete){
            $for_alert['status'] = 'success';
            $for_alert['msg'] = 'SMS successfully Deleted.';
        }
        else {
            $for_alert['status'] = 'error';
            $for_alert['msg'] = 'Sorry we cannot delete this conversion now.';
        }

        $module = $this->loadModel('essentials');
        $all_numbers = $module->get_all_sent_sms();

        $template = $this->loadView('view_sms');
        $template->set('notify', $for_alert);
        $template->set('all_sent_sms', $all_numbers);
        $template->render();

    }

    public function send_sms(){
        global $gcdb, $config;

        $for_alert = [];

        $data = [
            'numbers_list' => serialize($_POST['numbers_list']),
            'msg_content' => $_POST['sms_content'],
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $config['current_user']['pk_user_id'],
            'modified_at' => date('Y-m-d H:i:s'),
            'modified_by' => $config['current_user']['pk_user_id'],
        ];


        if($_POST){

			$version = "2010-04-01";
            $AccountSid = $config['twilio_sid'];
            $AuthToken = $config['twilio_token'];
            $tclient = new Services_Twilio($AccountSid, $AuthToken, $version);

			try{
                $num_list = sizeof($data['numbers_list']);
				if($num_list > 1){

                    $sent_numbers = unserialize($data['numbers_list']);

                    foreach($sent_numbers as $number) {
                        $tclient->account->messages->sendMessage(
                            $config['twilio_number'],
                            $number,
                            $data['msg_content']
                        );
                    }
                }
                else {
                    $snum = unserialize($data['numbers_list']);
                    $tclient->account->messages->sendMessage(
                        $config['twilio_number'],
                        $snum[0],
                        $data['msg_content']
                        );
                    }
				
				$sended = $gcdb->insert_update('tbl_sms', $data);
				$for_alert['status'] = 'success';
				$for_alert['msg'] = 'Massage successfully send.';
				
				
			}catch (Exception $e) {
				$for_alert['status'] = 'error';
				$for_alert['msg'] = 'Error: ' . $e->getMessage();
			}
            
        }

        $template = $this->loadView('manage_sms');
        $template->set('notify', $for_alert);
        $template->render();

    }

    public function forget_something(){
        $template = $this->loadView('forget');
        $template->render();
    }


    public function update_system_settings($data = []){
        global $gcdb;

        $for_alert = [];

        foreach($data as $i => $up_sys){
            echo $i;
            $sql = "UPDATE sys_config SET config_value='" . $up_sys . "' WHERE config_name='" . $i . "'";
            $update = $gcdb->query($sql);
        }

        if($update){
            $for_alert['status'] = 'success';
            $for_alert['msg'] = "System Configuration Updated.";
        }
        else {
            $for_alert['status'] = 'error';
            $for_alert['msg'] = "System Configuration could not update at this time.";
        }
        $template = $this->loadView('system_settings');
        $template->set('notify', $for_alert);
        $template->render();
    }

    function gpass($pass){
        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        echo password_hash($pass, PASSWORD_BCRYPT, $options)."\n";
    }
    public function logout(){
        session_destroy();
        $this->redirect('');
    }

}