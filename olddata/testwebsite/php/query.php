<?php
	header('Access-Control-Allow-Origin: *');
	error_reporting(E_ALL & E_NOTICE);
	session_start();
	$connection = include_once("connection.php");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	/*$query = "select u.user_name, e.eventName, e.eventLocation
	from users as u, events as e, saved_events as s
	where u.user_id=s.user_id and e.eventID=s.eventID";*/
	$query = "select * from users";
	$array = array();

	$result = mysqli_query($dbCon, $query);


	if (!$result)
		echo "Failure to query";
	else
	{
		//echo json_encode(mysqli_fetch_assoc($result));

		while($row = mysqli_fetch_assoc($result))
		{
			$array[]=$row;
		}
		echo json_encode($array);
		/*for($i=0; $i<count($array); $i++){
			echo "\n";
			echo "Name: ".$array[$i]["user_name"].", \nEvent:".$array[$i]["eventName"]. " \nLocation:".$array[$i]["eventLocation"]. "\n";
			//echo "\n";
		}*/

	}
?>
