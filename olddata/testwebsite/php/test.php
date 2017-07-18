<?php
	$json = file_get_contents('php://input');
	$obj = json_decode($json);
	$user_name = $obj->{'user_name'};
	$user_id = $obj->{'user_id'};
	$user_email = $obj->{'user_email'};
	print_r($user_name."\n");
	print_r($user_id."\n");
	if($user_email==NULL){
	 echo "User email is null";
	}else{
		print_r($user_email);
	}
	print_r("this is a test");
	 header('Access-Control-Allow-Origin: *');
        error_reporting(E_ALL & E_NOTICE);
        session_start();
        $connection = include_once("connection.php");

        if (mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
	   $sql="INSERT INTO users(user_id, user_name, user_email) VALUES ('$user_id', '$user_name', '$user_email')";

	 if (mysqli_query($dbCon,$sql)) {
      echo "Values have been inserted successfully";
   }else{
	echo "insertion failed";
	}
?>
