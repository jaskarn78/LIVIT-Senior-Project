<?php
	error_reporting(E_ALL & E_NOTICE);
        session_start();
        $connection = include_once("connection.php");

        //Get the JSONObject from android input
        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        //store user id from JSONObject into local variable
        $user_id = $obj->{"user_id"};
        //echo "user id sent from android ".$user_id;   
	$query = "SELECT join_date FROM users where user_id='$user_id'";
        $array = array();
        $result = mysqli_query($dbCon, $query);

        if (!$result){
                // echo "Failure to query";
        }
        else{
                while($row = mysqli_fetch_assoc($result))
                {
                        $array[]=$row;
                }
                echo json_encode($array);
        }
