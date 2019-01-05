<HTML>
<HEAD><TITLE> Credits remaining </TITLE></HEAD>
<BODY>
    <?php
	require ("SmsInterface.inc");

	$si = new SmsInterface ();
	if (!$si->connect ('TBLTechNerds001', 'y6DKNHZM', true, false))
	    echo "<P> Unable to connect to the SMS server.\n";
	else {
	    $cr = $si->getCreditsRemaining ();

	    if ($cr == -2) {
		echo "Unable to read credits for " . $_POST["username"];
		echo " from the SMS server.\n";
		if ($si->getResponseMessage () !== NULL)
		    echo "<BR>Reason: " . $si->getResponseMessage() . "\n";
	    } elseif ($cr == -1) {
		echo "The account for " . 'TBLTechNerds001';
		echo " is not a pre-paid account.\n";
	    } else {
		echo "The account for " . 'TBLTechNerds001';
		echo " has $cr credits remaining.\n";
	    }
	}
    ?>
</BODY>
</HTML>
