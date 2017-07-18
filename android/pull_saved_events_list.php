	
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

	$query = 	"SELECT g.*,event_description,event_sponsor,event_cost,lat,lng,start_date, start_time, preference_name 
				 FROM get_all_saved_event_info as g, events as e 
				 WHERE user_id=$user_id and g.event_id=e.event_id";
	$array = array();
	$result = mysqli_query($dbCon, $query);

	if (!$result){
		// echo "Failure to query";
	}
	else
	{
		//echo "Query execution success\n";
		while($row = mysqli_fetch_assoc($result))
		{
			$array[]=$row;
		}
		echo json_encode($array);
	}
?>
