<?php
//include '../../_fwc/login.check.php';
//echo 'client ID: '.$client_id; 
	require ("SmsInterface.inc.php");

	// Site Specific Text Setup Area
	$url=$_SERVER['SERVER_NAME'];
	$keyword="WitnessOne";
	$help_phone="+1.888.417.1495";

Function AddAudit($description, $GraysonDNA, $debug, $mycr, $user_id) {
	include "../../config/config.php";
	$ip = isset($_REQUEST['ip']) ? $_REQUEST['ip'] : (($_SERVER['HTTP_X_FORWARDED_FOR'] != '') ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
	$rlookup = isset($_REQUEST['rlookup']) ? $_REQUEST['rlookup'] : gethostbyaddr((($_SERVER['HTTP_X_FORWARDED_FOR'] != '') ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']));
	
	$sql="INSERT INTO Audit (datetime, ip, rlookup, description, user_id) ";
	$sql=$sql."VALUES ('".date("Y-m-d H:i:s")."','".trim($ip)."','".trim($rlookup)."'".",'".$_SERVER["SCRIPT_NAME"].":".trim($description)."\nSession:".urlencode(var_export($_SESSION,true))."', ".$user_id.")";
	if ($debug) print "$mycrAddAudit$mycrSQL=".$sql.$mycr;
	
	if (mysqli_query($con, $sql)) {
		if ($debug) print "$mycrLog Record Created ".$description.$mycr;
	} else {
		print "$mycrAddAudit - Error inserting Log record: " . mysqli_error($con).$mycr;
		
	}
}




/* ==================================================================== */


	// do I need this to send? - header("HTTP/1.1 200 OK\n");




	$debug = isset($_REQUEST['debug']) ? TRUE : FALSE;
	if ($debug) echo "<pre>";
	
	if ($debug)  {
		echo "<pre>";
		echo "<HR>_REQUEST:<BR>";
		var_dump($_REQUEST);
		
		echo "<HR>_SESSION:".session_id()."<BR>";
		var_dump($_SESSION);
		
	}
	
	
	

	
	// Prepare the data for storage
	$smsid = isset($_REQUEST['id']) ? $_REQUEST['id'] : "0";
	$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : "0";
	$client_id = isset($_REQUEST['client_id']) ? $_REQUEST['client_id'] : '0';
	if ($debug) echo '<hr>Phone input:'.$phone.'<br>';
	// the given string
	$text =$phone;
	
	// number selection
	$selection = "0123456789";
	
	$arr = str_split($text);
	$len = count($arr);
	$count = -1;
	
	$output = "";
	
	while (++$count < $len) {
		$selected = $arr[$count];
		if (strpos($selection, $selected) !== false)
			$output .= $selected;
	}
	$phone = $output;
	// 9732169550
	// 1234567890
	if  ( (strlen($phone)<=10) && (substr($phone,0,1) != "1") ) $phone = "1".$phone;
		
	if ($debug) echo 'strlen($phone):'.strlen($phone).', Phone output:'.$phone.'<br><hr>';
	
	$carriercode = isset($_REQUEST['Carrier']) ? $_REQUEST['Carrier'] : "0";
	
	// Extract the DNA/Serial Number from the request
	$message_received = $smsmsg = isset($_REQUEST['message']) ? $_REQUEST['message'] : "0";
	//$message_received = isset($_REQUEST['p1']) ? $_REQUEST['p1'] : "0";
	$command_word=substr($smsmsg,0,8);
	$message_received = trim(str_replace("WitnessOne ", "", strtolower($smsmsg)));
	$message_received = trim(str_replace("WitnessOne ", "", strtolower($message_received)));
	//only furst line is needed. beyond that might be a signature.
	if (($crloc = strpos($message_received,"\n")) > 0) {
		$message_received = substr($message_received,0,$crloc-1);
	}


// The session variable are so we can call dna_smart



	$htm = isset($_REQUEST['htm']) ? $_REQUEST['htm'] : "0";
	
	//$smsto = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : "0";
	$shortcode = "57682"; // isset($_REQUEST['phone']) ? $_REQUEST['phone'] : "32075";
	
	$dontsend = isset($_REQUEST['dontsend']) ? $_REQUEST['dontsend'] : "false";
	
	// This won't be set. I need to set it based on the short code used (that should be client specific)
	$user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : "0";
	
	
	//$debug = true;
	if ($htm=='true') {
		$mycr="<br>";
	} else {
		$mycr="\r";
	}

	
	// Log access to this page
	AddAudit("SMS send:".urlencode(var_export($_REQUEST,true)),$GraysonDNA, $debug, $mycr, $user_id);

/* Security, check reverse lookup:
	• smsmaster.m4u.com.au
	• smsmaster1.m4u.com.au
	• smsmaster2.m4u.com.au
	• smsmaster.m4ubackup.com
	• smsmaster1.m4ubackup.com
	• smsmaster2.m4ubackup.com
*/

	$response = $smsmsg;
	
	if ($dontsend !== 'true') {
		//$curl_parameters = 'user='.$login.'&pass='.$password.'&split=3&smsto='.trim($phone).'&smsmsg='.$response;
		if ($debug) echo 'Sending to: '.$phone."<br>";
		$si = new SmsInterface (false, false);
		
		$si->addMessage ("+".$phone, $response, $client_id);

		$response = $response . $mycr . " SMS SEND RESULTS: ";
		//if (!$si->connect ("MDCAHoldingsL002", "m3JLXNxD", false, false))
		if (!$si->connect ("TBLTechNerds001", "y6DKNHZM", true, false))
			$response = $response . "failed. Could not contact server.$mycr";
		elseif (!$si->sendMessages ()) {
			$response = $response . "failed. Could not send message to server.$mycr";
			
		if ($si->getResponseMessage () !== NULL)
			$response = $response . " Reason: " . $si->getResponseMessage () . $mycr;
		} else
			$response = $response . "OK.$mycr";
			
		AddAudit("SMS sent to MessageMedia:".urlencode($response),$GraysonDNA, $debug, $mycr, $user_id);
	} else {
		echo "dontsend = true<br>";
	}
	
	if ($debug) {
		echo "</pre>";
		echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><title>SMS Send</title></head> <body><h1>REQUEST Parameters</h><hr><table>';
		foreach ($_REQUEST as $name => $value) { 
			print '<tr><td valign="top">'.$name.':</td><td valign="top">'.$value.'</td></tr>'; 
		} 
		echo '</table><br><hr><br></body></html>';
	}	 else {
		echo "SMS Send Response:".$response."<br>";
	}
	
	
 ?> 