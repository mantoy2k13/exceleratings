<?php
include '../../config/config.php'; 
mysqli_query($con,"delete from sms where messageID = ".$_POST['smsReplyID']);
echo 'success';
?>