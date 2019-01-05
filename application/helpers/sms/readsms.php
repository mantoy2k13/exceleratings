<style>
.xyz{width:100%; padding:15px; text-align:center; font-size:24px; color: #F00}
.shadow{box-shadow: 10px 0px 10px -7px rgba(0,0,0,0.5), -10px 10px 10px -7px rgba(0,0,0,0.5);}
.red{color:#F00}
.nopadding{padding:0}
</style>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>-->
<?php
include '../sms/functions.php';
$qry2 = mysqli_query($con,"select * from sms where clientID = ".$client_id." and user_id is NOT NULL order by sl desc");
if(mysqli_num_rows($qry2) < 1){
	$UserID = 1;
}else{
	$qry2Ftc = mysqli_fetch_object($qry2);
	$UserID = $qry2Ftc->user_id;
}
//echo 'userID: '.$UserID;
//echo 'client ID: '.$client_id;
$redirection = '?mr=_t';
if(isset($_POST['smsSent'])){
	$smsStatus = $_POST['smsStatus'];
	$smsContent = mysqli_real_escape_string($con,$_POST['smsContent']);
	$smsRcvrs = array();
	$smsRcvrQry = mysqli_query($con,"SELECT * FROM User WHERE client_id = ".$client_id." && status = ".$smsStatus);
	while ($row = mysqli_fetch_object($smsRcvrQry))
	{
		$smsRcvrs[] = $row;
	}
	foreach ($smsRcvrs as $smsRcvr):
	$smsContents = 'Hi '.ucwords($smsRcvr->auth_level).' '.ucwords($smsRcvr->user_name).', ';
	$user_phone_cell = $smsRcvr->user_phone_cell;
	$user_id = $smsRcvr->user_id;
	$mobile_msg = $smsContents.$smsContent;
	$maxSmsID = mysqli_query($con,"select max(sl) as maxSL from sms order by sl desc");
	$maxSmsIDFtc = mysqli_fetch_object($maxSmsID);
	$maxIdCount = $maxSmsIDFtc->maxSL+1;
	//$messageID = $smsStatus.$client_id.$maxIdCount;
	$strSession = 'phone='.$user_phone_cell.'&message='.urlencode($mobile_msg).'&client_id='.$maxIdCount;//$messageID;
	//mysqli_query($con,"insert into sms set user_id = $user_id, messageID = ".$maxIdCount.", userPhoneNumber = '".$user_phone_cell."', clientID = ".$client_id.", userStatus = ".$smsStatus.", smsContent = '$smsContent', datentime = '".date('m/d/Y H:i:s')."'");
	mysqli_query($con,"insert into sms set user_id = ".$smsRcvr->user_id.", messageID = ".$maxIdCount.", userPhoneNumber = '".$user_phone_cell."', clientID = ".$client_id.", userStatus = ".$smsStatus.", smsContent = '".$smsContent."'");
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
	mysqli_query($con,"update User set messageID = ".$maxIdCount." where user_access_code = ".$client_id);
}/*elseif(isset($_POST['response'])){
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
	mysqli_query($con,"insert into sms set messageID = ".substr($messageID,7).", userPhoneNumber = '".$user_phone_cell."', clientID = ".$client_id.", userStatus = ".$smsStatus.", smsContent = '$smsContent', datentime = '".date('m/d/Y H:i:s')."'");
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
}*/
//delete all kind of message under session commander
if(isset($_GET['dltAllMsgs'])){
	mysqli_query($con,"delete from sms where clientID = ".$client_id." && messageID != 1");
	header("location: ".$redirection);
	exit();	
}/*elseif(isset($_GET['dltSingleMsg'])){
	mysqli_query($con,"delete from sms where messageID = ".$_GET['dltSingleMsg']);
	if(isset($_GET['reply'])){
		header("location: ".$redirection."&reply=".$_GET['reply']);
	}else{
		header("location: ".$redirection);
	}
	exit();	
}
*/
//reply message
/*if(isset($_GET['reply'])){
	mysqli_query($con,"update sms set where sl = ".$_GET['reply']);
	$smsReplyQry = mysqli_query($con,"SELECT * FROM sms WHERE sl = ".$_GET['reply']);
	$smsReplyFtc = mysqli_fetch_object($smsReplyQry);
	$smsID = $client_id.$smsReplyFtc->userStatus.$smsReplyFtc->sl;
	//echo $smsID;
	$redirection = '?mr=_t&reply='.$_GET['reply'];
}*/
?>
<script>
var jvSmsCountAll = <?php echo json_encode(pf_twoWaySmsCount());?>;
var jvSMSContentAll = <?php echo json_encode(pf_twoWaySmsCheck($UserID));?>;
var smsReplyID;
if(jvSMSContentAll == null || jvSMSContentAll == ''){
	smsReplyID = 1;
}else{
	smsReplyID = jvSMSContentAll[0]['user_id'];
}
//console.log(smsReplyID);
var globalClientID = <?php echo $client_id?>;
//var LastUserSMS = < ?php echo json_encode($smsAll);?>;
var	smsReplyTO = null;
var userNames;
$(function(){
	$("#smsSendOnly").show();
	$("#smsReplyView").hide();
	$('#response').hide();
	$('#smsSent').show();
	
});

$(document).on("click",".smsCheckID",function(){
	if($(this).attr("smsCheck_ID") == smsReplyID){
		var smsReplyCheck = {smsReplyID: smsReplyID};
		$.ajax({
		  type: "POST",
		 url: "../sms/userTwoWaySMS.php",
		 data: smsReplyCheck,
		 success: function(response){
				setTimeout(function(){
					$("#newSmsFound").html(response);
					//console.log(response);
				},500);
			}
		});	
	}else{
		$('#newSmsFound').html('loading....');
	}
	//console.log(smsReplyID);
	smsReplyID = $(this).attr("smsCheck_ID");
	//console.log(smsReplyID);
	smsReplyTO = $(this).attr("smsReplyTO");
	userNames = $(this).attr("userName");
	$("#smsSendOnly").hide();
	$("#smsReplyView").show();
	$("#user_Name").html(userNames);
	$("#replyTO").html(smsReplyTO);
	$('#smsSent').hide();
	$('#response').show();
	//console.log(smsReplyID);
});
//two way sms reply to sender
function SubmitForm() {
	var smsContent = $("#smsContentMain").val();
	$.post("../sms/submit.php", { smsContent: smsContent, smsReplyTO: smsReplyTO, smsReplyID: smsReplyID},
	function(data) {
		
	});
	$("#smsContentMain").val(null);
	//alert('Message sent to '+smsReplyTO);
}

function agentAllFeedCheck(){
	//console.log('n working');
	var buserData = {action:"smsFeed", smsReplyID: smsReplyID};
	$.ajax({
	  type: "POST",
	 url: "../sms/action.php",
	 data: buserData,
	 success: function(response){
		jvSmsCountAll = response.AllSMSCount;
		$(response.AllSMSCount).each(function(){
			$("#cscontent").html(this.cscontent);
			$("#csreply").html(this.csreply);
			//console.log(this.cscontent+', '+this.csreply);
		});
		
		//jvSMSContentAll = response.smsRcvSent;
		//smsReplyID = jvSMSContentAll[0]['user_id'];
		//console.log(smsReplyID);
		// console.log(jvSmsCountAll);
		if(response.smsRcvSent.length > 0){
				var newSMS = [];
				var newSMSIndex = 0;
				if(!jvSMSContentAll && jvSMSContentAll.length == 0){
					newSMS = response.smsRcvSent;
				}else{
					$(response.smsRcvSent).each(function(){
						var smsFeed = this;
						var found = false;
						$(jvSMSContentAll).each(function(){
							if(this.sl == smsFeed.sl){
								found = true;
								//console.log('old ' + this.sl + ', ' + smsFeed.sl + ', ' + smsFeed.smsReply);
								return false;
							}
						});
						if(found == false){
							//new sms
							newSMS[newSMSIndex] = smsFeed;
							//console.log('new ' + this.sl + ', ' + smsFeed.sl + ', ' + smsFeed.smsReply);
							newSMSIndex++;
						}
					});
				}
				
				if(newSMS.length > 0){
					//console.log(smsReplyID);
					//we have new set of sms, add them to the top of sms list
					var newSMSList = "";
					//var alertNewMsg = "";
					$(newSMS).each(function(){
						if(this.user_id != smsReplyID){
							//console.log(this.user_id+', '+smsReplyID);
							return;
						}
						//console.log(this.user_id+', '+smsReplyID);
						//received sms
						if(this.smsReply == null || this.smsReply == ''){

						}else{
							newSMSList += '<div class="form-group"><div class="col-lg-12"><div class="col-lg-7" style="background-color: #CCC; padding:6px; border-radius:5px; white-space:normal; float:left">'+this.smsReply+'<br><small>'+this.datentime+'</small></div></div></div>';
							if(globalClientID == this.clientID){
								//alertNewMsg += this.smsReply;
							}
						}
						
						//sent sms
						if(this.smsContent == null || this.smsContent == ''){

						}else{
							newSMSList += '<div class="form-group" id="smsContentTO"><div class="col-lg-12" align="right"><div class="col-lg-7" style="background-color:#0C0; padding:6px; border-radius:5px;white-space:normal; float:right">'+this.smsContent+'<br><small>'+this.datentime+'</small></div></div></div>';
							if(globalClientID == this.clientID){
								//alertNewMsg += 'Sent Message: '+this.smsContent;
							}
						}
					});
				if($("#newSmsFound div#smsReplyFrom").length > 0 || $("#newSmsFound div#smsContentTO").length > 0){
						$("#newSmsFound").prepend(newSMSList);
						//alert(alertNewMsg);
					}
					else{
						$("#newSmsFound").html("");
						$("#newSmsFound").html(newSMSList);
					}
				}
				//now reset the old
				jvSMSContentAll = response.smsRcvSent;
			}
			
		setTimeout(function(){
			agentAllFeedCheck();
		}, 1000);
	  },
	dataType: "json"
	});
}
setTimeout(function(){
	agentAllFeedCheck();
}, 1000);
</script>
<div class="col-lg-4 nopadding">
	<header>
		<div class="icons"><i class="fa fa-envelope"></i></div>
		<h5>Message Send</h5>
    </header>
	<div class="body">
    <form class="form-horizontal" id="popup-validation" method="post" enctype="multipart/form-data" style="margin-top:15px;">
      <div class="col-lg-12">
      <?php
	  //if(isset($_GET['reply'])){?>
      	<div class="form-group" id="smsReplyView">
          <label class='col-lg-12 nopadding'>User: <span class="red" id="user_Name"></span></label>
        	<label class='col-lg-12 nopadding'>Reply to: <span class="red" id="replyTO"></span></label>
            <label class="col-lg-12 nopadding">Conversation(s):</label>
            <div class="col-lg-12 nopadding" style="padding-top:10px;max-height:250px; overflow-y:scroll; border-top:1px solid #CCC" id="newSmsFound">
                	<div class="form-group" id="smsReplyFrom">
                    	<div class="col-lg-12">
                            <div class="col-lg-7" style="background-color: #CCC; padding:6px; border-radius:5px; white-space:normal; float:left"></div>
                      	</div>
                  	</div>
                    <div class="form-group" id="smsContentTO">
						<div class="col-lg-12" align="right">
                            	<div class="col-lg-7" style="background-color:#0C0; padding:6px; border-radius:5px;white-space:normal; float:right"></div>
                       	</div>
                   	</div>
            </div>
        </div>

      	<div class="form-group" id="smsSendOnly">
        	<label class='col-lg-12 nopadding'>Send Message to:</label>
            <div class='col-lg-12 nopadding'>
            	<select name="smsStatus" class="validate[required] form-control" required>
                	<option value=""> Select User Type </option>
                	<option value="0"> Transport </option>
                    <option value="1"> Agent </option>
                </select>
            </div>
        </div>

      	<div class='form-group'>
            <label class='col-lg-12 nopadding' style="border-top:1px solid #CCC"><br />Write Message:</label>
            <div class='col-lg-12 nopadding'>
            <textarea class="validate[required] form-control" name="smsContent" style="height:100px;" required id="smsContentMain"></textarea>
            </div>
     	</div>
        <div class="form-group">
            <div class="col-lg-12 nopadding" align="right">		
                <input type="reset" id="reset" name="reset" value="Reset" class="btn btn-danger" />
                <input type="submit" id="smsSent" name="smsSent" value="Send" class="btn btn-primary" />
                <input id="response" onclick="SubmitForm()" value="Reply" class="btn btn-success" />
            </div>
        </div>
      </div>
  	</form>
    </div>
</div>
<div class="col-lg-8">
	<header>
		<div class="icons"><i class="fa fa-envelope"></i></div>
		<h5 id="smsCheck">Sent/Received Message(s)</h5>
        <div class="toolbar">
        	<div class="btn-group">
            	<a href="?mr=_t&dltAllMsgs=_t" onclick="return dltAllMessages()" class="btn btn-danger btn-sm">
                	<i class="fa fa-trash"></i></a>
           	</div>
        </div>
    </header>
<?php
//$sentSmsQry = mysqli_query($con,"SELECT * FROM sms WHERE clientID = ".$client_id." group by messageID order by messageID desc");
$sentSmsQry = mysqli_query($con,"SELECT * FROM sms WHERE (clientID = ".$client_id." and user_id is not NULL) group by user_id order by sl desc");
if(mysqli_num_rows($sentSmsQry)<1){
	echo "<div class='xyz'>No message(s) found in your account.</div>";
}else{
?>
<table class="table table-bordered table-condensed table-hover table-striped">
	<tr>
		<th> User </th>
		<th> Sent Message(s) </th>
		<th> Received Message(s) </th>
		<th> Status </th>
		<th> Action </th>
	</tr>
	<?php
	while($sentSmsQryFtc = mysqli_fetch_object($sentSmsQry)){
		//$qry = mysqli_query($con,"select *, SUM(IF(smsContent != '', 1,0)) AS `cscontent`, SUM(IF(smsReply != '', 1,0)) AS `csreply` from sms where messageID = ".$sentSmsQryFtc->messageID);
		$qry = mysqli_query($con,"select *, SUM(IF(sms.smsContent != '', 1,0)) AS `cscontent`, SUM(IF(sms.smsReply != '', 1,0)) AS `csreply` from sms JOIN User on User.user_id = sms.user_id where sms.messageID = ".$sentSmsQryFtc->messageID);
		while($qryFtc = mysqli_fetch_object($qry)){
	?>
	<tr>
		<td id="userPhoneCell"><?php echo $qryFtc->user_name;?></td>
		<td align="center" id="cscontent"><?php echo ucwords($qryFtc->cscontent);?></td>
		<td align="center" id="csreply"><?php echo ucwords($qryFtc->csreply);?></td>
		<td id="userStatus"><?php if($qryFtc->userStatus == 0) echo 'Transport'; elseif($qryFtc->userStatus == 1) echo 'Agent'; ?></td>
		<td align="center" id="userAction">
        	<a href="javascript:void(0)" class="smsCheckID" smsCheck_ID="<?php echo $qryFtc->user_id;?>" smsReplyTO="<?php echo $qryFtc->userPhoneNumber;?>" userName="<?php echo $qryFtc->user_name;?>" title="View"><i class="fa fa-eye"></i></a> | 
         	<a href="javascript:void(0)" class="smsCheckID" smsCheck_ID="<?php echo $qryFtc->user_id;?>" smsReplyTO="<?php echo $qryFtc->userPhoneNumber;?>" userName="<?php echo $qryFtc->user_name;?>" title="Reply"><i class="fa fa-reply"></i></a> <!--|
       		<a href="javascript:void(0)" class="smsCheckID_dlt" smsCheck_ID=< ?php echo $qryFtc->messageID;?> onclick="return DltSingleMSG()" title="Delete">
				<i class="fa fa-trash"></i></a>-->
        <!--
        <div class="btn-group">
        	<button class="btn btn-primary btn-sm">Action</button>
            <button class="btn btn-metis-5 btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
            <ul class="dropdown-menu pull-right">
            	<li><a href="?mr=_t&reply=< ?php echo $qryFtc->messageID; ?>"><i class="fa fa-eye"></i> View Details</a></li>
                <li><a href="?mr=_t&reply=< ?php echo $qryFtc->messageID; ?>"><i class="fa fa-reply"></i> Reply Message</a></li>
                <li><a href="?mr=_t&dltSingleMsg=< ?php echo $qryFtc->messageID; ?>" onclick="return DltSingleMSG()">
				<i class="fa fa-trash"></i> Delete</a></li>
            </ul>
        </div>-->
        </td>
	</tr>    	
	<?php
		}
	}
	?>
</table>
<?php
}

//sms interface code here
?>
</div>
<script>
function dltAllMessages(){//delete logged in commander's all messages
	var dltAll = confirm("Are you sure you want to delete all messages from your account?");
		if (dltAll == true){
			alert("Message(s) Successfully Deleted");
		}
		return dltAll;
}
function DltSingleMSG(){//delete logged in commander's selected message
	var dlt = confirm("Are you sure you want to delete this message from your account?");
		if (dlt == true){
			alert("Message Successfully Deleted");
		}
		return dlt;
}

/*function twoWaySmsCheck(){
	if($("#smsCheck").trigger("click")){
		//console.log('running');
		$.post("../sms/readSmsSync.php", {},
			function(data){
				var ConsoleData = data;*/
				//console.log(ConsoleData);
				/*if(ConsoleData == 'OfficerNoFound'){
					//console.log('AGENT not found yet');
				}else if(ConsoleData == 'OfficerFound'){
					$("#text-frame").fadeIn();
					$("#text-overlay").fadeIn();
					$("#text-frame h1").html('AGENT found, please wait.....');
					setTimeout(function(){
						setTimeout(function(){
							window.location = './';
						},1000);
					}, 3000);
				}*/
		/*});
	}
	setTimeout(function(){
		twoWaySmsCheck();
	}, 500);
}
setTimeout(function(){
	twoWaySmsCheck(); 
}, 500);*/
</script>