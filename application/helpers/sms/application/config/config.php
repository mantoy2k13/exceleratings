<?php
require(ROOT_DIR .'system/functions.php');
require(ROOT_DIR .'system/ezSQL/ez_sql_core.php');
require(ROOT_DIR .'system/ezSQL/ez_sql_mysql.php');

$config = [];

//"DBNAME" => "tbl2016_sms",
//"HOST" => "localhost",
//"USER" => "tbl2016_sms",
//"PASS" => "tbl2016_sms"

$config["DB"] = array(
    "DBNAME" => "tbl2016_sms",
    "HOST" => "localhost",
    "USER" => "tbl2016_sms",
    "PASS" => "tbl2016_sms"
);

$config['admin'] = true;

$config['base_url'] = 'http://' . $_SERVER['HTTP_HOST'] . '/'; // Base URL including trailing slash (e.g. http://localhost/)
$config['upload_dir'] = 'static/uploads/';
$config['allowed_types'] = ['jpg', 'png', 'gif', 'mp4', 'flv', 'mp3'];
$config['default_controller'] = 'home'; // Default controller to load
$config['error_controller'] = 'error'; // Controller used for errors (e.g. 404, 500 etc)

error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

// connect to db
$gcdb = new ezSQL_mysql($config['DB']['USER'],$config['DB']['PASS'],$config['DB']['DBNAME'],$config['DB']['HOST']);

$sys_config = $gcdb->get_results("SELECT config_name, config_value FROM sys_config");
foreach($sys_config as $i=>$v) {
    $config[$v['config_name']] = $v['config_value'];
}

if(isset($_SESSION['user'])){
    $cur_user = $gcdb->get_row("SELECT * FROM gc_user WHERE pk_user_id='" . $_SESSION['user'] . "'");
    unset($cur_user['user_password']);

    foreach($cur_user as $i=>$v){
        $config['current_user'][$i] = $v;
    }
}

//actions based on configuration
date_default_timezone_set($config['time_zone']);

require(ROOT_DIR .'system/controller.php');
require(ROOT_DIR .'system/model.php');
require(ROOT_DIR .'system/view.php');
require(ROOT_DIR .'system/twilio/Twilio.php');
require(ROOT_DIR . 'system/gc.php');

?>