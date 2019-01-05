<?php
include '../../config/config.php';
if($_REQUEST['smsReplyID']){
	$smsReplyID = $_REQUEST['smsReplyID'];
}
//$smsAll = array();
$qry3 = mysqli_query($con,"select * from sms where user_id = ".$smsReplyID." order by sl desc");
while($rows = mysqli_fetch_object($qry3)){
	//$smsAll[] = $rows;
	if($rows->smsReply != ''){
	?>
	<div class="form-group"><div class="col-lg-12"><div class="col-lg-7" style="background-color: #CCC; padding:6px; border-radius:5px; white-space:normal; float:left"><?php echo $rows->smsReply;?><br><small><?php echo $rows->datentime;?></small></div></div></div>
    <?php
	}
	if($rows->smsContent != ''){?>
	<div class="form-group" id="smsContentTO"><div class="col-lg-12" align="right"><div class="col-lg-7" style="background-color:#0C0; padding:6px; border-radius:5px;white-space:normal; float:right"><?php echo $rows->smsContent;?><br><small><?php echo $rows->datentime;?></small></div></div></div>
<?php
	}
}
?>