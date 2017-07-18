<?php	
	$json = file_get_contents('php://input');
        $obj = json_decode($json);
        $user_id = $obj->{'user_id'};
	$event_id = $obj->{'event_id'};
        $connection = include_once("connection.php");

        if(mysqli_connect_errno())
                echo "Failed to connect to MySQL: " . mysqli_connect_errno();
        $sql = "SELECT * FROM event_likes where user_id='$user_id' and event_id='$event_id'";
	
	$array = array();
        $result = mysqli_query($dbCon, $sql);

        if (!$result){
        //         echo "Failure to query";
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
