<?php
	header('Access-Control-Allow-Origin: *');
	error_reporting(E_ALL & E_NOTICE);
	session_start();
	$connection = include_once("connection.php");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$userId = $_POST['user_id'];
   	$query = "SELECT * FROM users WHERE user_id=$userId";

	$array = array();

	$result = mysqli_query($dbCon, $query);


	if (!$result)
		echo null;
	else
	{

		while($row = mysqli_fetch_assoc($result))
		{
			$array[]=$row;
		}
		echo json_encode($array);
	}

	 mysqli_close($dbCon);
?>
