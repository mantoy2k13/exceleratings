<?php

/**
 * Created by PhpStorm.
 * User: Tareq
 * Date: 04/11/2016
 * Time: 4:13 AM
 */
class login extends Controller {

    function index(){
        global $config;
        if(isset($_SESSION['user'])){
            if($config['current_user']['user_type'] == 'admin' || $config['current_user']['user_type'] == 'user'){
                self::redirect('admin');
            } else {
                self::redirect('profile');
            }

        }
        else {
            $template = $this->loadView('login');
            $template->render();
        }
    }

    public function checkUser(){
        global $gcdb, $config;

        $data = $_POST;

        $for_alert = [];

        $check = $gcdb->get_row("SELECT * FROM gc_user WHERE user_name='" . $data['user_name'] . "' AND user_password='" . $data['user_pass'] . "'");

        if($check){
            if($check['user_verification_status'] == 'true'){

                if($check['user_status'] == 'active'){
                    $_SESSION['user'] = $check['pk_user_id'];
                    $for_alert['status'] = 'success';
                    $for_alert['msg'] = 'Log In Successful.';

                    if($check['user_type'] == 'admin' || $check['user_type'] == 'user'){
                        self::redirect('admin');
                    }
                    elseif($check['user_type'] == 'public'){
                        self::redirect('profile');
                    }
                    else {
                        $for_alert['status'] = 'error';
                        $for_alert['msg'] = "You are not a user of this system. Please re register your account.";
                        $template = $this->loadView('login');
                        $template->set('notify', $for_alert);
                        $template->render();
                    }

                }
                else {
                    $for_alert['status'] = 'error';
                    $for_alert['msg'] = "You are currently deactivated by your administration. Please contact your administration for this reason.";
                    $template = $this->loadView('login');
                    $template->set('notify', $for_alert);
                    $template->render();
                }
            }
            else {
                $for_alert['status'] = 'error';
                $for_alert['msg'] = "You are not confirmed email address yet. Please confirm your email by clicking activation link that sent to your email.";
                $template = $this->loadView('login');
                $template->set('notify', $for_alert);
                $template->render();
            }
        }
        else {
            $for_alert['status'] = 'error';
            $for_alert['msg'] = "Username and Password Doesn't match. <br> <span style='color: #ff0000;'>Please try again.</span>";
            $template = $this->loadView('login');
            $template->set('notify', $for_alert);
            $template->render();
        }

    }


}