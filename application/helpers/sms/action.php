<?php
require_once("../sms/functions.php");
if(!empty($_POST["action"]))
{
	switch($_POST["action"])
	{
		case "smsFeed":
			$smsReplyID = $_POST['smsReplyID'];
			$smsRcvSent = pf_twoWaySmsCheck($smsReplyID);
			$allSMSCount = pf_twoWaySmsCount();
			$smsReplyIDFeed = array("smsRcvSent" => $smsRcvSent, "AllSMSCount" => $allSMSCount);
			echo json_encode($smsReplyIDFeed);
			break;
	}
}
?>