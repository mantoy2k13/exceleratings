<style>
.xyz{width:100%; padding:15px; text-align:center; font-size:24px; color: #F00}
.shadow{box-shadow: 10px 0px 10px -7px rgba(0,0,0,0.5), -10px 10px 10px -7px rgba(0,0,0,0.5); overflow: auto;}
.red{color:#F00}
.nopadding{padding:0}
</style>
<?php
$redirection = '?mr=_t';
if(isset($_POST['smsSent'])){
	$smsStatus = $_POST['smsStatus'];
	$smsContent = mysqli_real_escape_string($con,$_POST['smsContent']);
	$smsRcvrs = array();
	$smsRcvrQry = mysqli_query($con,"SELECT * FROM User WHERE client_id = ".$client_id." && status = $smsStatus");
	while ($row = mysqli_fetch_object($smsRcvrQry))
	{
		$smsRcvrs[] = $row;
	}
	foreach ($smsRcvrs as $smsRcvr):
	$smsContents = 'Hi '.ucwords($smsRcvr->auth_level).' '.ucwords($smsRcvr->user_name).', ';
	$user_phone_cell = $smsRcvr->user_phone_cell;
	$mobile_msg = $smsContents.$smsContent;
	$maxSmsID = mysqli_query($con,"select max(sl) as maxSL from sms");
	$maxSmsIDFtc = mysqli_fetch_object($maxSmsID);
	$maxIdCount = $maxSmsIDFtc->maxSL+1;
	$messageID = $client_id.$smsStatus.$maxIdCount;
	$strSession = 'phone='.$user_phone_cell.'&message='.urlencode($mobile_msg).'&client_id='.$messageID;
	mysqli_query($con,"insert into sms set messageID = ".$maxIdCount.", userPhoneNumber = '".$user_phone_cell."', clientID = ".$client_id.", userStatus = ".$smsStatus.", sentRcv = 's', smsContent = '$smsContent', datentime = '".date('m/d/Y H:i:s')."'");
	//send sms
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$ssl.$url.'/bin/sms/send.php?'.$strSession);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	if ($debug) {
		var_export($info);
	}
	curl_close ($ch);
	endforeach;
}elseif(isset($_POST['response'])){
	$smsContent = mysqli_real_escape_string($con,$_POST['smsContent']);
	//$smsContents = 'Hi '.ucwords($smsRcvr->auth_level).' '.ucwords($smsRcvr->user_name).', ';
	$user_phone_cell = $_POST['hiddenPhoneNumber'];
	if(substr($user_phone_cell,0,2) == '+1'){
		$user_phone_cell = substr($user_phone_cell,2);
	}elseif(substr($user_phone_cell,0,3) == '880'){
		$user_phone_cell = substr($user_phone_cell,3);
	}elseif(substr($user_phone_cell,0,4) == '+880'){
		$user_phone_cell = substr($user_phone_cell,4);
	}else{
		$user_phone_cell = $user_phone_cell;
	}
	$smsStatus = $_POST['hiddenUserStatus'];
	$mobile_msg = $smsContent;//$smsContents.$smsContent;
	$messageID = $_POST['hiddenMsgID'];
	$strSession = 'phone='.$user_phone_cell.'&message='.urlencode($mobile_msg).'&client_id='.$messageID;
	mysqli_query($con,"insert into sms set messageID = ".substr($messageID,7).", userPhoneNumber = '".$user_phone_cell."', clientID = ".$client_id.", userStatus = ".$smsStatus.", sentRcv = 'rs', smsContent = '$smsContent', datentime = '".date('m/d/Y H:i:s')."'");
	//send sms
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$ssl.$url.'/bin/sms/send.php?'.$strSession);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	if ($debug) {
		var_export($info);
	}
	curl_close ($ch);
	if(isset($_GET['reply'])){
		header("location: ".$redirection."&reply=".$_GET['reply']);
	}else{
		header("location: ".$redirection);
	}
	exit();	
}
//delete all kind of message under session commander
if(isset($_GET['dltAllMsgs'])){
	mysqli_query($con,"delete from sms where clientID = ".$client_id);
	if(isset($_GET['reply'])){
		header("location: ".$redirection."&reply=".$_GET['reply']);
	}else{
		header("location: ".$redirection);
	}
	exit();	
}elseif(isset($_GET['dltSingleMsg'])){
	mysqli_query($con,"delete from sms where messageID = ".$_GET['dltSingleMsg']);
	if(isset($_GET['reply'])){
		header("location: ".$redirection."&reply=".$_GET['reply']);
	}else{
		header("location: ".$redirection);
	}
	exit();	
}

//reply message
if(isset($_GET['reply'])){
	//$smsReplyQry = mysqli_query($con,"SELECT * FROM sms WHERE sl = ".$_GET['reply']);
	$smsReplyQry = mysqli_query($con,"SELECT * FROM sms WHERE sl = ".$_GET['reply']);
	$smsReplyFtc = mysqli_fetch_object($smsReplyQry);
	$smsID = $client_id.$smsReplyFtc->userStatus.$smsReplyFtc->sl;
	//echo $smsID;
	$redirection = '?mr=_t&reply='.$_GET['reply'];
}
?>
<div class="col-lg-4 nopadding">
	<header>
		<div class="icons"><i class="fa fa-envelope"></i></div>
		<h5>Message Send</h5>
    </header>
	<div class="body">
    <form class="form-horizontal" id="popup-validation" method="post" enctype="multipart/form-data" style="margin-top:15px;">
      <div class="col-lg-12">
      <?php
	  if(isset($_GET['reply'])){?>
      	<div class="form-group">
          <label class='col-lg-12 nopadding'>MessageID: <span class="red"><?php echo $_GET['reply'];?></span></label>
        	<label class='col-lg-12 nopadding'>Reply to: <span class="red"><?php echo $smsReplyFtc->userPhoneNumber;?></span></label>
            <input type="hidden" name="hiddenPhoneNumber" value="<?php echo $smsReplyFtc->userPhoneNumber;?>" />
            <input type="hidden" name="hiddenMsgID" value="<?php echo $smsID;?>" />
            <input type="hidden" name="hiddenUserStatus" value="<?php echo $smsReplyFtc->userStatus;?>" />
            <label class="col-lg-12 nopadding">Conversation(s):</label>
            <div class="col-lg-12 nopadding" style="padding-top:10px;max-height:250px; overflow:scroll; border-top:1px solid #CCC">
            	<?php
                $allMSGQry = mysqli_query($con,"SELECT * FROM sms WHERE messageID = ".$_GET['reply']." order by sl asc");
				while($allMSGQryFtc = mysqli_fetch_object($allMSGQry)){
					if(!empty($allMSGQryFtc->smsReply)){?>
                	<div class="form-group">
                    	<div class="col-lg-12">
							<span style="background-color: #CCC; padding:6px; border-radius:5px"><?php echo $allMSGQryFtc->smsReply;?></span>
                      	</div>
                  	</div>
					<?php
                    }if(!empty($allMSGQryFtc->smsContent)){?>
                    <div class="form-group">
						<div class="col-lg-12" align="right">
                            	<div class="col-lg-7" style="background-color:#0C0; padding:6px; border-radius:5px;white-space:normal; float:right"><?php echo $allMSGQryFtc->smsContent;?></div>
                       	</div>
                   	</div>
					<?php
                    }
                }
				?>
            </div>
        </div>
        
	 <?php }else{?>
      	<div class="form-group">
        	<label class='col-lg-12 nopadding'>Send Message to:</label>
            <div class='col-lg-12 nopadding'>
            	<select name="smsStatus" class="validate[required] form-control" required>
                	<option value=""> Select User Type </option>
                	<option value="0"> Transport </option>
                    <option value="1"> Agent </option>
                </select>
            </div>
        </div>
	  <?php
	  }
	  ?>
      	<div class='form-group'>
            <label class='col-lg-12 nopadding' style="border-top:1px solid #CCC"><br />Write Message:</label>
            <div class='col-lg-12 nopadding'>
            <textarea class="validate[required] form-control" name="smsContent" style="height:100px;" required></textarea>
            </div>
     	</div>
        <div class="form-group">
            <div class="col-lg-12 nopadding" align="right">		
                <input type="reset" name="reset" value="Reset" class="btn btn-danger" />
                <?php 
				if(isset($_GET['reply'])){?>
                <input type="submit" name="response" value="Reply" class="btn btn-primary" />
                <?php
				}else{?>
                <input type="submit" name="smsSent" value="Send" class="btn btn-primary" />
                <?php
				}
				?>
            </div>
        </div>
      </div>
  	</form>
    </div>
</div>
<div class="col-lg-8">
	<header>
		<div class="icons"><i class="fa fa-envelope"></i></div>
		<h5>Sent/Received Message(s)</h5>
        <div class="toolbar">
        	<div class="btn-group">
            	<a href="?mr=_t&dltAllMsgs=_t" onclick="return dltAllMessages()" class="btn btn-danger btn-sm">
                	<i class="fa fa-trash"></i></a>
           	</div>
        	<div class="btn-group">
            	<a href="<?php echo $redirection?>" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> </a>
           	</div>
        </div>
    </header>
<?php
$sentSmsQry = mysqli_query($con,"SELECT * FROM sms WHERE clientID = ".$client_id." group by messageID order by messageID desc");
if(mysqli_num_rows($sentSmsQry)<1){
	echo "<div class='xyz'>No message(s) found in your account.</div>";
}else{
?>
<table class="table table-bordered table-condensed table-hover table-striped">
	<tr>
		<th> MsgID </th>
		<th> Sent Message(s) </th>
		<th> Received Message(s) </th>
		<th> Status </th>
		<th> Action </th>
	</tr>
	<?php
	while($sentSmsQryFtc = mysqli_fetch_object($sentSmsQry)){
		//$qry = mysqli_query($con,"select *, count(smsContent) as cscontent, count(smsReply) as csreply from sms where messageID = ".$sentSmsQryFtc->messageID." && (smsContent != '' || smsReply != '')");
		$qry = mysqli_query($con,"select *, SUM(IF(smsContent != '', 1,0)) AS `cscontent`, SUM(IF(smsReply != '', 1,0)) AS `csreply` from sms where messageID = ".$sentSmsQryFtc->messageID);
		while($qryFtc = mysqli_fetch_object($qry)){
	?>
	<tr>
		<td><?php echo $qryFtc->messageID//if(substr($sentSmsQryFtc->userPhoneNumber,0,3) == '880') echo substr($sentSmsQryFtc->userPhoneNumber,3); elseif(substr($sentSmsQryFtc->userPhoneNumber,0,4) == '+880') echo substr($sentSmsQryFtc->userPhoneNumber,4); elseif(substr($sentSmsQryFtc->userPhoneNumber,0,2) == '+1') echo substr($sentSmsQryFtc->userPhoneNumber,2); else echo $sentSmsQryFtc->userPhoneNumber;?></td>
		<td><?php echo ucwords($qryFtc->cscontent);?></td>
		<td><?php echo ucwords($qryFtc->csreply);?></td>
		<td><?php if($qryFtc->userStatus == 0) echo 'Transport'; elseif($qryFtc->userStatus == 1) echo 'Agent'; ?></td>
		<td align="center">
        <div class="btn-group">
        	<button class="btn btn-primary btn-sm">Action</button>
            <button class="btn btn-metis-5 btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
            <ul class="dropdown-menu pull-right">
            	<li><a href="?mr=_t&reply=<?php echo $qryFtc->messageID; ?>"><i class="fa fa-eye"></i> View Details</a></li>
                <li><a href="?mr=_t&reply=<?php echo $qryFtc->messageID; ?>"><i class="fa fa-reply"></i> Reply Message</a></li>
                <li><a href="?mr=_t&dltSingleMsg=<?php echo $qryFtc->messageID; ?>" onclick="return DltSingleMSG()">
				<i class="fa fa-trash"></i> Delete</a></li>
            </ul>
        </div>
        </td>
	</tr>    	
	<?php
		}
	}
	?>
</table>
<?php
}

require ("SmsInterface.inc.php");
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
			return;
		}else{
			if ($sr->status == MessageStatus::none ()){
				$messageID = substr($sr->messageID,7);
				$smsReply = mysqli_query($con,"select * from sms where sl = ".$messageID." and smsReply = ''");
				if(mysqli_num_rows($smsReply)>0){
					mysqli_query($con,"update sms set sentRcv = 'sr', smsReply = '".$sr->message."' where sl = ".$messageID);
				}else{
					//$smsReply1 = mysqli_query($con,"select * from sms where sl = ".$messageID);
					//$smsReply1Ftc = mysqli_fetch_object($smsReply1);
					//mysqli_query($con,"insert into sms set messageID = ".$messageID.", userPhoneNumber = '".$sr->phoneNumber."', clientID = ".substr($sr->messageID,0,6).", sentRcv = 'r', smsContent = '".$smsReply1Ftc->smsContent."', smsReply = '".$sr->message."', userStatus = ".substr($sr->messageID,6,1));
					mysqli_query($con,"insert into sms set messageID = ".$messageID.", userPhoneNumber = '".$sr->phoneNumber."', clientID = ".substr($sr->messageID,0,6).", sentRcv = 'r', smsReply = '".$sr->message."', userStatus = ".substr($sr->messageID,6,1));
				}
				//echo $sr->message;
			}elseif ($sr->status == MessageStatus::pending ()){
				echo "Message delivery pending";
			}elseif ($sr->status == MessageStatus::delivered ()){
				echo "Message successfully delivered";
			}else{
				echo "Message delivery failed";
			};
		}
	}
}
?>
</div>
<script>
function dltAllMessages(){//delete logged in commander's all messages
	var dltAll = confirm("Are you sure you want to delete all messages from your account?");
		if (dltAll == true){
			alert("Message(s) Successfully Deleted")
		}
		return dltAll;
}
function DltSingleMSG(){//delete logged in commander's selected message
	var dlt = confirm("Are you sure you want to delete this message from your account?");
		if (dlt == true){
			alert("Message Successfully Deleted")
		}
		return dlt;
}

</script>