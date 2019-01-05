<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 require ('sms/SmsInterface.inc.php');

function sms_send( $phone, $message ){
	
	$url = $_SERVER['SERVER_NAME'];
	$mycr = "<br>";
	$debug = true;
	$phone = isset($phone) ? $phone : "0";
	$client_id = isset($_REQUEST['client_id']) ? $_REQUEST['client_id'] : '0';
	$selection = "0123456789";
	$arr = str_split($phone);
	$len = count($arr);
	$count = -1;
	$output = "";
	while(++$count < $len){
		$selected = $arr[$count];
		if(strpos($selection, $selected) !== false)
			$output .= $selected;
	}
	$phone = $output;
	if((strlen($phone) <= 10) && (substr($phone,0,1) != "1")) 
	$phone = "1".$phone;
//	if($debug) echo 'strlen($phone):'.strlen($phone).', Phone output:'.$phone.'<br><hr>';
	// Extract the DNA/Serial Number from the request
	$message_received = $smsmsg = isset($message) ? $message : '0';
	
	$command_word=substr($smsmsg,0,8);
	$message_received = trim(str_replace("WitnessOne ", "", strtolower($smsmsg)));
	$message_received = trim(str_replace("WitnessOne ", "", strtolower($message_received)));
	//only furst line is needed. beyond that might be a signature.
	if (($crloc = strpos($message_received,"\n")) > 0) {
		$message_received = substr($message_received,0,$crloc-1);
	}
	$response = $smsmsg;
	$si = new SmsInterface (false, false);
	$si->addMessage ("+".$phone, $response, $client_id);
	$response = $response . $mycr . " SMS SEND RESULTS: ";
	//if (!$si->connect ("MDCAHoldingsL002", "m3JLXNxD", false, false))
	if(!$si->connect ("TBLTechNerds001", "y6DKNHZM", true, false)){
		$response = $response . "failed. Could not contact server.$mycr";
	}elseif (!$si->sendMessages ()){
		$response = $response . "failed. Could not send message to server.$mycr";
		if($si->getResponseMessage () !== NULL){
			$response = $response . " Reason: " . $si->getResponseMessage () . $mycr;
		}
	}else{
		$response = $response . "OK.$mycr";
	}
	 
}
