<?php
	 header('Access-Control-Allow-Origin: *');
        error_reporting(E_ALL & E_NOTICE);
        session_start();
        $connection = include_once("connection.php");

        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $user_id     = $obj->{'user_id'};
        echo "user id from android json ".$user_id."\n";
	
	for($i=1; $i<=9; $i++){
	  $sql = "INSERT INTO user_preferences VALUES ('$user_id', '$i')";

        	if (mysqli_query($dbCon,$sql)) {
       		   echo "Values have been inserted successfully.\n";
        	   echo $user_id;
     	        }else{
          	  echo "error";
     	        }
	}	
?>
