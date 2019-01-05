<?php

class View extends Controller {

	private $pageVars = [];
	private $template;

	public function __construct($template){
        global $config;
        self::has_user();
        if($template == 'dashboard'){
            if($config['admin'] == ture){
                $this->template = APP_DIR .'views/'. $template .'.php';
            }
            else {
                $this->template = APP_DIR .'views/'. $template .'.php';
            }
        }
        elseif($template == 'login'){
            $this->template = APP_DIR .'views/'. $template .'.php';
        }
        elseif($template == 'register'){
            $this->template = APP_DIR .'views/'. $template .'.php';
        }

        else{
            $this->template = APP_DIR .'views/'. $template .'.php';
        }
	}

	public function set($var, $val){
		$this->pageVars[$var] = $val;
	}

	public function render(){
        global $gcdb, $config;
		extract($this->pageVars);

        ob_start();
		require($this->template);
		echo ob_get_clean();
	}

    public static function has_user(){
        global $gcdb, $config;

        if(isset($_SESSION['user']) && $_SESSION['user'] == $config['current_user']['pk_user_id']){

            return true;
        }
        else return false;
    }

}
