<?php	
	$json = file_get_contents('php://input');
        $obj = json_decode($json);
        $event_id = $obj->{'event_id'};
	$user_id = $obj->{'user_id'};
        $connection = include_once("connection.php");

        if(mysqli_connect_errno())
                echo "Failed to connect to MySQL: " . mysqli_connect_errno();
        $sql = "UPDATE events set event_likes=event_likes-1 where event_id='$event_id'";

        if (mysqli_query($dbCon,$sql)){
                echo "$event_id updated event likes";
		$sql2 = "DELETE FROM event_likes where event_id='$event_id' and user_id='$user_id'";
		if(mysqli_query($dbCon, $sql2)){}
	}

?>
