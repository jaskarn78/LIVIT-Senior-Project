<?php
	header('Access-Control-Allow_Origin: *');
	error_reporting(E_ALL & E_NOTICE);
	session_start();
	$connection = include_once("connection.php");

	if(mysqli_connect_errno())
		echo "Failed to connect to MySQL: ". mysqli_connect_error();
	
	//Get the JSONObject from the input
	$json = file_get_contents('php://input');
	$obj = json_decode($json);

	//store all of the JSONObject information in local variables
	$user_id   =  $obj->{'user_id'};
	$pref_id1 =  $obj->{'pref_id1'};//music
	$pref_id2 =  $obj->{'pref_id2'};//food and drink
	$pref_id3 =  $obj->{'pref_id3'};//sports
	$pref_id4 =  $obj->{'pref_id4'};//outdoor
	$pref_id5 =  $obj->{'pref_id5'};//health and fitness
	$pref_id6 =  $obj->{'pref_id6'};//family friendly
	$pref_id7 =  $obj->{'pref_id7'};//retail
	$pref_id8 =  $obj->{'pref_id8'};//performing arts
	$pref_id9 =  $obj->{'pref_id9'};//entertainment

	echo "User id being sent from android: ".$user_id."\n";
	echo "Music: ".$pref_id1."\n";
	echo "food and drink: ".$pref_id2."\n";
	echo "sports: ".$pref_id3."\n";
	echo "outdoor: ".$pref_id4."\n";
	echo "health/fitness: ".$pref_id5."\n";

	//store all preferences into an array
	$pref_array= array($pref_id1, $pref_id2, $pref_id3, $pref_id4,
	$pref_id5, $pref_id6, $pref_id7, $pref_id8, $pref_id9);	

	//iterate through array to retrieve active preferences
	for($i=1; $i<=9; $i++){
		if($pref_array[$i-1]==1){
			$sql = 	sprintf("INSERT IGNORE INTO user_preferences(user_id, preference_id)
							 VALUES('%s', '$i')", mysql_real_escape_string($user_id));

			//Try inserting the preference into user_preference table
			if(mysqli_query($dbCon, $sql)){
				// echo "User preferences have been inserted successfully.\n";
			}
			//echo "Insertion failed.\n";	
		}
		if($pref_array[$i-1]==0){
			$sql= 	sprintf("DELETE FROM user_preferences 
							 WHERE preference_id=$i and user_id='%s'", mysql_real_escape_string($user_id));

			//Try removing the preference from user_preference table
			if(mysqli_query($dbCon, $sql)){
				//echo "User preferences have been removed successfully.\n";
			}else{
				//echo "failed to remove.\n";
			}
		}
	}


?> 
