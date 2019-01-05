<?php
include '../../config/config.php';
require ("../sms/SmsInterface.inc");
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '0';
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : 'test';
$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
$si = new SmsInterface ();
if(!$si->connect ('TBLTechNerds002', 'j7FjPQBT', true, false)){
	echo "Unable to connect to the SMS server.";
}else{
	$qry = mysqli_query($con,"select * from sms where sl = ".$id);
	$qryFtc = mysqli_fetch_object($qry);
	mysqli_query($con,"insert into sms set user_id = ".$qryFtc->user_id.", messageID = ".$id.", clientID = ".$qryFtc->clientID.", userPhoneNumber = '".$phone."', smsReply = '".mysqli_real_escape_string($con,htmlspecialchars($message))."', userStatus = ".$qryFtc->userStatus);
	echo 'OK';
}
?>