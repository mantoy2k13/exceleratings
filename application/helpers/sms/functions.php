<?php
function pf_twoWaySmsCheck($smsReplyID){
	include '../../config/config.php';
	$allMSGQry = mysqli_query($con,"SELECT * FROM sms WHERE user_id = ".$smsReplyID." order by sl desc");
	//$allMSGQry = mysqli_query($con,"select *, SUM(IF(smsContent != '', 1,0)) AS `cscontent`, SUM(IF(smsReply != '', 1,0)) AS `csreply` from sms WHERE messageID = ".$smsReplyID." order by sl asc");
	$tuallfeeds = array();
	while($row = mysqli_fetch_object($allMSGQry)){
		$tuallfeeds[] = array(
			'sl' => $row->sl,
			'user_id' => $row->user_id,
			'messageID' => $row->messageID,
			'userPhoneNumber' => $row->userPhoneNumber,
			'clientID' => $row->clientID,
			'userStatus' => $row->userStatus,
			'smsReply' => urldecode($row->smsReply),
			'smsContent' => urldecode($row->smsContent),
			'datentime' => $row->datentime
		);
	}	
	//echo json_encode($tuallfeeds);
	return $tuallfeeds;
}
//pf_twoWaySmsCheck(24);

function pf_twoWaySmsCount(){
	include '../../config/config.php';
	include '../../_fwc/login.check.php';
	//$allMSGQry = mysqli_query($con,"select *, SUM(IF(smsContent != '', 1,0)) AS `cscontent`, SUM(IF(smsReply != '', 1,0)) AS `csreply` from sms where clientID = ".$client_id." group by messageID");
	$allMSGQry = mysqli_query($con,"select *, SUM(IF(smsContent != '', 1,0)) AS `cscontent`, SUM(IF(smsReply != '', 1,0)) AS `csreply` from sms where clientID = ".$client_id." group by messageID");
	$tuallfeeds = array();
	while($row = mysqli_fetch_object($allMSGQry)){
		$tuallfeeds[] = array(
			'cscontent' => $row->cscontent,
			'csreply' => $row->csreply
		);
	}	
	//echo json_encode($tuallfeeds);
	return $tuallfeeds;
}
?>