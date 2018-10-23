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