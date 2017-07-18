<?php
	header('Access-Control-Allow-Origin: *');
	$dbCon = mysqli_connect("athena.ecs.csus.edu","teamone_user","teamone_db","teamone");
	if(mysqli_connect_errno()){
		echo "Failed to connect: ".mysqli_connect_error();
	}
?>
