<?php
include '../../config/config.php';
include '../../_fwc/login.check.php';
require("../sms/SmsInterface.inc.php");
$si = new SmsInterface ();
if (!$si->connect ('TBLTechNerds001', 'y6DKNHZM', true, false)){
	echo "<div class='xyz'>Unable to connect to the SMS server.</div>";
}elseif (($srl = $si->checkReplies ()) === NULL) {
	echo "<div class='xyz'>Unable to read messages from the SMS server.</div>";
	if ($si->getResponseMessage () !== NULL){
		echo "<div class='xyz'>Reason: " . $si->getResponseMessage() . "</div>";
	}
}elseif (count ($srl) == 0){
	//echo "<div class='xyz'>No unread message(s) found.</div>";
}else {
	foreach ($srl as $sr) {
		if(substr($sr->messageID,0,6) != $client_id){
			//echo $client_id;
			return;
		}else{
			if ($sr->status == MessageStatus::none ()){
				//$messageID = substr($sr->messageID,7);
				//mysqli_query($con,"insert into sms set messageID = ".$messageID.", userPhoneNumber = '".$sr->phoneNumber."', clientID = ".substr($sr->messageID,1,6).", smsReply = '".$sr->message."', userStatus = ".substr($sr->messageID,0,1));
				//echo "messages: ".$sr->message;
			}elseif ($sr->status == MessageStatus::pending ()){
				echo "Message delivery pending";
			}elseif ($sr->status == MessageStatus::delivered ()){
				echo "Message successfully delivered";
			}else{
				echo "Message delivery failed";
			}
		}
	}
}
?>