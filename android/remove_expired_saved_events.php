<?php
	error_reporting(E_ALL & E_NOTICE);
        session_start();
        $connection = include_once("connection.php");

        $query = "DELETE FROM saved_events where saved_event_ID in
                  (select event_id from expired_events)";
        $result1 = mysqli_query($dbCon, $query);

        if(!$result1){
                echo "deletion from saved_events failed";
        }else
            echo "success";


?>

