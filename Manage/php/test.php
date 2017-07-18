<?php 
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	session_start();
	if (mkdir("../../event_photos", 0755))
		echo "yes";
	else
		echo "no";
	
?>