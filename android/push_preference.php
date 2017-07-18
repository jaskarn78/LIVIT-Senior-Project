<?php	
	$json = file_get_contents('php://input');
        $obj = json_decode($json);
        $user_id = $obj->{'user_id'};
        $pref1 = $obj->{'pref1'};
	$pref2 = $obj->{'pref2'};
	$pref3 = $obj->{'pref3'};
	$pref4 = $obj->{'pref4'};
	$pref5 = $obj->{'pref5'};
	$pref6 = $obj->{'pref6'};
	$pref7 = $obj->{'pref7'};
	$pref8 = $obj->{'pref8'};
	$pref9 = $obj->{'pref9'};
	
	echo $pref1;
	echo $pref2;
    $connection = include_once("connection.php");

    if(mysqli_connect_errno())
		 echo "Failed to connect to MySQL: " . mysqli_connect_errno();
        	//$sql="INSERT INTO user_preferences(user_id, preference_id)
			//VALUES('$user_id', $i)";
			
			//if (mysqli_query($dbCon,$sql))
         	//	echo "Values have been inserted successfully";
    		//else
        	//	echo "Error in sql syntax";
		//}
	//}
?>
