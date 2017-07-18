<?php
	$dbCon = mysqli_connect("athena.ecs.csus.edu","teamone_user","teamone_db","teamone");
	
	function connection(){
		header('Access-Control-Allow-Origin: *'); 
		//$dbCon = mysqli_connect("athena.ecs.csus.edu","teamone_user","teamone_db","teamone");
		if(mysqli_connect_errno()){
			echo "Failed to connect: ".mysqli_connect_error();
		} else {
			echo "Connection guuud";
		}
	}
	
	function query(){
		
		header('Access-Control-Allow-Origin: *'); 
		error_reporting(E_ALL & E_NOTICE);
		session_start();
	//	$connection = include_once("connection.php");
		echo "i ran";
	$query=null;
	$result=null;
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		//$user = $_SESSION["user_id"];
//		if ($user !== "") {
			//$query = "SELECT * FROM users WHERE user_id = $user";
			$query="SELECT * FROM users";
//		}
//		else
//		{
//			return null;
//		}
		
		$result = mysqli_query($dbCon, $query);
		
		
		if (!$result)
			echo "Failure to query";
		else
		{
			echo "in";
			echo json_encode(mysqli_fetch_assoc($result));
		}
	}
?>
