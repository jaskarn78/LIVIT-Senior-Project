<?php
	header('Access-Control-Allow-Origin: *');
	error_reporting(E_ALL & E_NOTICE);
	session_start();
	$connection = include_once("connection.php");

	//Get the JSONObject from android input
	$json = file_get_contents('php://input');
	$obj = json_decode($json);
	
	//store user id from JSONObject into local variable
	$user_id = $obj->{"user_id"};
	
	//echo "user id sent from android ".$user_id;	
	$query = "SELECT f.*, e.event_phone
                  FROM filtered_events_temp as f, events as e 
                  WHERE user_id=$user_id and f.event_id=e.event_id ORDER BY event_location ASC";
	$array = array();
	$result = mysqli_query($dbCon, $query);
	$eventLocArray = Array();
	$response=null;
	
	if (!$result){
		//echo "Failure to query";
	}
	else
	{
		//echo "Query execution success\n";
		while($row = mysqli_fetch_assoc($result)){
			$array[]=$row;
			$eventLocArray[] = $row['event_location'];
		}
		echo json_encode($array);
		for($i=0; $i<=sizeof(eventLocArray); $i++){
			$address = str_replace(" ", "+", $address); 
			$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
			$response = file_get_contents($url);
			echo json_decode(file_get_contents($url));
		}    
	}
?>
