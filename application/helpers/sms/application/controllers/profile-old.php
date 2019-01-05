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

    public function get_all_post(){
        global $gcdb, $config;

        $posts = $gcdb->get_results("SELECT * FROM gc_posts ORDER BY created_by DESC");
        return $posts;
    }

    public function new_post(){
        global $gcdb, $config;
        $template = $this->loadView('new_post');
        $template->render();
    }

    public function edit_post($pid){
        global $gcdb, $config;

        $data = $gcdb->get_row("SELECT * FROM gc_posts WHERE pk_post_id='" . $pid . "'");

        $template = $this->loadView('new_post');
        $template->set('data', $data);
        $template->render();
    }

    public function regUser(){
        global $gcdb, $config;

        $data = [
            'user_name' => $_POST['user_name'],
            'user_firstname' => $_POST['first_name'],
            'user_lastname' => $_POST['last_name'],
            'company' => $_POST['company'],
            'country_name' => $_POST['country_list'],
            'user_email' => $_POST['user_email'],
            'user_phone' => $_POST['user_phone'],
            'user_password' => $_POST['user_password'],
            'user_type' => 'public',
            'user_status' => 'deactive',
            'user_verification_code' => $this->randString(40),
            'user_verification_status' => 'false',
            'user_created_at' => date('Y-m-d H:i:s'),
            'user_created_by' => $_SESSION['user'] ? $_SESSION['user'] : '1',
            'user_modified_by' => $_SESSION['user'] ? $_SESSION['user'] : '1',
            'user_modified_at' => date('Y-m-d H:i:s'),
        ];

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
				<h1>TBL Tech Nerds</h1><br>
				<h4>Tech is our middle name.</h4>
			</div>
			
			<h4>Dear " . $data['user_lastname'] . ', ' . $data['user_firstname'] . "</h4>
			<h4>Welcome to TBLSMS.</h4><br><br>
			
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
			font-size: 18px;
			user-select: none;
			border: 1px solid transparent;
			padding: .375rem 1rem;
			background-color: #fff;'>
			&copy; Copyright TBL Development Firm 2016.<br>
			
			Feel free to contact anytime at support@tbldevelopmentfirm.com			
			<br><br></div>
			
			";
			
			
            $mailer = $this->loadModel('essentials');

            $mail_data = new stdClass();
            $mail_data->sendTo = $data['user_email'];
            $mail_data->subject = 'Colmpleate Registration - TBLSMS';
            $mail_data->name = 'TBLSMS';
            $mail_data->email = $config['contact_email'];
            $mail_data->content =  $mail_body;

            $mailer->sendMail($mail_data);

            $template = $this->loadView('login');
            $template->set('notify', $for_alert);
            $template->render();
        }
        else {
            $for_alert['status'] = 'error';
            $for_alert['msg'] = "Something missing. Please try again.";
            $template = $this->loadView('login');
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
				
				$for_alert['status'] = "success";
				$for_alert['msg'] = "You are now a verified user of TBLSMS. Please login to start.";
				
            }
            else {
                $for_alert['status'] = "error";
				$for_alert['msg'] = "Cannot compleate your registration. Please try again.";
            }
			
			$template = $this->loadView('login');
            $template->set('notify', $for_alert);
            $template->render();
			
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