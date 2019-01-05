<?php
include '../../config/config.php'; 
include '../../_fwc/login.check.php';
//$smsReplyQry = mysqli_query($con,"SELECT * FROM sms WHERE sl = ".$_POST['smsReplyID']);
$smsReplyQry = mysqli_query($con,"SELECT *, min(sl) as maxSL FROM sms WHERE user_id = ".$_POST['smsReplyID']);
$smsReplyFtc = mysqli_fetch_object($smsReplyQry);
$smsContent = mysqli_real_escape_string($con,$_POST['smsContent']);
//mysqli_query($con,"insert into sms set messageID = ".$smsReplyFtc->sl.", userPhoneNumber = '".$_POST['smsReplyTO']."', clientID = ".$client_id.", userStatus = ".$smsReplyFtc->userStatus.", smsContent = '$smsContent', datentime = '".date('m/d/Y H:i:s')."'");
mysqli_query($con,"insert into sms set user_id = ".$smsReplyFtc->user_id.", messageID = ".$smsReplyFtc->maxSL.", userPhoneNumber = '".$_POST['smsReplyTO']."', clientID = ".$client_id.", userStatus = ".$smsReplyFtc->userStatus.", smsContent = '$smsContent'");
//send sms

$messageID = $smsReplyFtc->sl;//$smsReplyFtc->userStatus.$client_id.$smsReplyFtc->sl;
$strSession = 'phone='.$_POST['smsReplyTO'].'&message='.urlencode($smsContent).'&client_id='.$messageID;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'http://witnessone.net/bin/sms/send.php?'.$strSession);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
$info = curl_getinfo($ch);
if ($debug) {
	var_export($info);
}
curl_close ($ch);
?>