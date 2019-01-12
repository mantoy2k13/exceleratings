<?php

function pre($string){
	echo '<pre>';
	print_r($string);
	echo '</pre>';
}
function prex($string){
	echo '<pre>';
	print_r($string);
	echo '</pre>';
	exit;
}

function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}
