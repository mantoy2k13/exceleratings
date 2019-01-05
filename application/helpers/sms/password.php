<HTML>
<HEAD><TITLE> Change password result </TITLE></HEAD>
<BODY>
    <?php
	require ("SmsInterface.inc");

	$si = new SmsInterface ();
	if (!$si->connect ($_POST["username"], $_POST["password"], true, false))
	    echo "<P> Unable to connect to the SMS server.\n";
	elseif (!$si->changePassword ($_POST["newpassword"])) {
	    echo "Unable to change password for " . $_POST["username"] . "\n";
	    if ($si->getResponseMessage () !== NULL)
		echo "<BR>Reason: " . $si->getResponseMessage() . "\n";
	} else {
	    echo "Successfully changed the password for " . $_POST["username"];
	    echo "\n";
	}
    ?>
</BODY>
</HTML>
