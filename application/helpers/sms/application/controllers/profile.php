<?php

/**
 * Created by PhpStorm.
 * User: Tareq
 * Date: 04/19/2016
 * Time: 8:18 PM
 */
class profile extends Controller {

    function index(){
        global $config;
        if(isset($_SESSION['user'])){
            if($config['current_user']['user_type'] == 'admin' || $config['current_user']['user_type'] == 'user'){
                self::redirect('admin/dashboard');
            } else {

                $data = $this->get_all_post();

                $template = $this->loadView('profile');
                $template->set('data', $data);
                $template->render();
            }
        }
        else {
            $template = $this->loadView('login');
            $template->render();
        }
    }

    public function forget_something(){
        $template = $this->loadView('forget');
        $template->render();
    }

    public function user($user_id){
        global $gcdb, $config;

        $data = $this->get_all_post();

        $template = $this->loadView('profile');
        $template->set('user', $user_id);
        $template->set('data', $data);
        $template->render();
    }

    public function update_user($data){
        global $gcdb, $config;

        $for_alert = [];

        $u_data = $gcdb->get_row("SELECT * FROM gc_user WHERE pk_user_id='" . $data . "'");


        $template = $this->loadView('add_users');
        $template->set('notify', $for_alert);
        $template->set('user_data', $u_data);
        $template->render();

    }

    public function regUser(){
        global $gcdb, $config;

        pre($_POST);

        $data = [
            'user_name' => $_POST['user_name'],
            'user_firstname' => $_POST['first_name'],
            'user_lastname' => $_POST['last_name'],
            'company' => $config['site_name'],
            'user_address' => $_POST['user_address'],
            'user_email' => $_POST['user_email'],
            'user_phone' => $_POST['user_phone'],
            'user_password' => $_POST['user_password'],
            'user_type' => 'user',
            'user_status' => $_POST['user_status'],
            'user_verification_code' => $this->randString(40),
            'user_verification_status' => 'false',
            'user_created_at' => date('Y-m-d H:i:s'),
            'user_created_by' => $config['current_user']['pk_user_id'],
            'user_modified_by' => $config['current_user']['pk_user_id'],
            'user_modified_at' => date('Y-m-d H:i:s'),
        ];

        pre($data);

        $for_alert = [];
        $inserted = $gcdb->insert_update('gc_user', $data);
        if($inserted){
            $for_alert['status'] = 'success';
            $for_alert['msg'] = 'Registration Successful. Please check your email for verification link.';

			$verification_link = $config['base_url'] . "profile/verify/?auth=" . $data['user_verification_code'] . "&em=" . $data['user_email'] . "";
			
			$mail_body = "
			<div style='
			width: 100%; 
			text-align: center;
			color: #fff;
			line-height: 5px;
			user-select: none;
			border: 1px solid transparent;
			padding: .375rem 1rem;
			background-color: #039BE5;
			border-color: #039BE5;'>
				<h1>" . $config['site_name'] . "</h1><br>
			</div>
			
			<h4>Dear " . $data['user_lastname'] . ', ' . $data['user_firstname'] . "</h4>
			<h4>Welcome to " . $config['site_name'] . ".</h4><br><br>
			
			<span>Please click the link below to verify your email address.</span> <br><br>
			
			<a href='" . $verification_link . "' style='
			color: #fff;
			background-color: #039BE5;
			border-color: #039BE5;
			display: inline-block; 
			font-weight: 400;
			text-decoration: none;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			cursor: pointer;
			user-select: none;
			border: 1px solid transparent;
			padding: .375rem 1rem;
			font-size: 1rem;
			line-height: 1.5;
			border-radius: 0;'>Confim Email Now</a> <br><br><br><br>
			
			<div style='
			width: 100%; 
			text-align: center;
			color: #444;
			line-height: 30px;
			font-size: 14px;
			user-select: none;
			border: 1px solid transparent;
			padding: .375rem 1rem;
			background-color: #fff;'>
			Feel free to contact anytime <br>
			" . $config['copyright_text'] . "<br>
			
			" . $config['contact_address'] . " <br>
			Email:
			" . $config['contact_email'] . "	<br>
			Phone : 
			" . $config['contact_number'] . "			
			<br><br></div>
			
			";
			
			
            $mailer = $this->loadModel('essentials');

            $mail_data = new stdClass();
            $mail_data->sendTo = $data['user_email'];
            $mail_data->subject = 'Complete Registration - ' . $config['site_name'];
            $mail_data->name = $config['site_name'];
            $mail_data->email = $config['contact_email'];
            $mail_data->content =  $mail_body;

            $mailer->sendMail($mail_data);

            $template = $this->loadView('add_users');
            $template->set('notify', $for_alert);
            $template->render();
        }
        else {
            $for_alert['status'] = 'error';
            $for_alert['msg'] = "Something missing. Please try again.";
            $template = $this->loadView('add_users');
            $template->set('notify', $for_alert);
            $template->render();
        }
    }

    public function verify(){
        global $gcdb, $config;

		$for_alert = [];
		
        if($_GET['auth'] && $_GET['em']){

            $check = $gcdb->get_row("SELECT user_status, user_verification_code, user_verification_status FROM gc_user WHERE user_email='" . $_GET['em'] . "'");
			
            if($check){
                $data = [
                    'user_type' => 'user',
                    'user_status' => 'active',
                    'user_verification_status' => 'true'
                ];

                $upinfo = $gcdb->insert_update('gc_user', $data, " user_verification_code ='" . $_GET['auth'] . "'");
				
		if($upinfo){
                     $for_alert['status'] = "success";
		     $for_alert['msg'] = "You are now a verified user of TBLSMS. Please login to start.";
                }
                else {
                      $for_alert['status'] = "error";
		     $for_alert['msg'] = "Cannot verify you email. Please register.";
                }
				
            }
            else {
                $for_alert['status'] = "error";
				$for_alert['msg'] = "Cannot complete your registration. Please try again.";
            }
			
			$template = $this->loadView('login');
            $template->set('notify', $for_alert);
            $template->render();
			
        }

    }

    public function update_user_info(){
        global $gcdb, $config;

        $data = [
            'user_name' => $_POST['user_name'],
            'user_firstname' => $_POST['first_name'],
            'user_lastname' => $_POST['last_name'],
            'company' => $config['site_name'],
            'user_address' => $_POST['user_address'],
            'user_email' => $_POST['user_email'],
            'user_phone' => $_POST['user_phone'],
            'user_status' => $_POST['user_status'],
            'user_modified_by' => $config['current_user']['pk_user_id'],
            'user_modified_at' => date('Y-m-d H:i:s'),
        ];

        if($_POST['user_password'] != ''){
            $data['user_password'] = $_POST['user_password'];
        }

        $for_alert = [];
        $updated = $gcdb->insert_update('gc_user', $data, " pk_user_id='" . $_POST['u_id'] . "'");
        if($updated){
            $for_alert['status'] = 'success';
            $for_alert['msg'] = 'User information successfully updated.';

        }
        else {
            $for_alert['status'] = 'error';
            $for_alert['msg'] = "Could not update user information. Please try again.";
        }
        $template = $this->loadView('all_users');
        $template->set('notify', $for_alert);
        $template->render();
    }

    public function add_user_pic(){

        global $gcdb, $config;

        $get_ext = explode('.', $_FILES['user_pic']['name']);

        $u_img_temp_name = $_FILES['user_pic']['tmp_name'];
        $u_img_new_name = time(). '_' . $get_ext[0] . '.' . $get_ext[1];
        $upload_path = $config['upload_dir'] . $u_img_new_name;

        if(move_uploaded_file($u_img_temp_name, $upload_path)){

            $data = [
                'user_pic' => $u_img_new_name
            ];
            $updated = $gcdb->insert_update('gc_user', $data, " pk_user_id='" . $_POST['u_id'] . "'");
            return $upload_path;
        }
        else {
            $for_alert = "Cannot upload image now.";
            return $for_alert;
        }

    }

    function randString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}

new profile();