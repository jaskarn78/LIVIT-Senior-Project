<?php

        header('Access-Control-Allow-Origin: *');
        error_reporting(E_ALL & E_NOTICE);
        session_start();
        $connection = include_once("connection.php");

	if (mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
	$json = file_get_contents('php://input');
        $obj = json_decode($json);
        $user_id = $obj->{'user_id'};
        echo "user id from android json ".$user_id."\n";

        $query = "select user_id from users where user_id=$user_id";
	$result = mysqli_query($dbCon, $query);
        $user_name = $obj->{'user_name'};
        $user_email = $obj->{'user_email'};

        if (mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
	if(mysqli_num_rows($result)){
	   echo "User already exists";
	}else{
	$sql="INSERT INTO users(user_id, user_name, user_email) VALUES ('$user_id', '$user_name', '$user_email')";
	}
         if (mysqli_query($dbCon,$sql)) {
      echo "Values have been inserted successfully";
  	 }else{
       	 echo "insertion failed";
       	 }
        $array = array();

        $result = mysqli_query($dbCon, $query);
        

        if (!$result)
                echo "Failure to query";
        else
        {

                while($row = mysqli_fetch_assoc($result))
                {
                        $array[]=$row;
                }
                echo "user ids from db" . json_encode($array);

        }
?>
