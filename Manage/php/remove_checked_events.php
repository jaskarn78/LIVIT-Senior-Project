<?php
	session_start();
	ini_set('display_errors',1);
	include_once('../../php/connection.php');
	
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$default_imgs = array("logo.jpg", "outdoor1.jpg", "outdoor2.jpg", "outdoor3.jpg", "outdoor4.jpg",
					"food1.jpg", "food2.jpg", "food3.jpg", "food4.jpg", 
					"entertainment1.jpg", "entertainment2.jpg", "entertainment3.jpg", "entertainment4.jpg", 
					"health1.jpg", "health2.jpg", "health3.jpg", "health4.jpg", 
					"retail1.jpg", "retail2.jpg", "retail3.jpg", "retail4.jpg", 
					"music1.jpg", "music2.jpg", "music3.jpg", "music4.jpg", 
					"family1.jpg", "family2.jpg", "family3.jpg", "family4.jpg", 
					"performing1.jpg", "performing2.jpg", "performing3.jpg", "performing4.jpg", 
					"sports1.jpg", "sports2.jpg", "sports3.jpg", "sports4.jpg");
	
	$target_dir = "../../events/";

	$userId = $_SESSION['user_id'];
	
	$array  = json_decode($_POST['jsondata']);
	
	if (is_array($array)) {
		if (count($array) > 0) {
			// Delete from saved_events
			$query = "DELETE FROM saved_events WHERE saved_event_ID IN (";
			for ($i=0; $i<count($array); $i++) {
				$query .= $array[$i][0];
				if ($i < count($array)-1) {
					$query .= ", ";
				}
			}
			
			$query .= ")";
			
			$result = mysqli_query($dbCon, $query);
			if (!$result){             
				echo "Failure to query:\n" . $query . "\n";
			} else {
				echo "Successfully Removed Events:\n" . $query . "\n";
			}
			
			// Delete from saved_events
			$query = "DELETE FROM deleted_events WHERE deleted_event_id IN (";
			for ($i=0; $i<count($array); $i++) {
				$query .= $array[$i][0];
				if ($i < count($array)-1) {
					$query .= ", ";
				}
			}
			
			$query .= ")";
			
			$result = mysqli_query($dbCon, $query);
			if (!$result){             
				echo "Failure to query:\n" . $query . "\n";
			} else {
				echo "Successfully Removed Events:\n" . $query . "\n";
			}
			
			// Delete from Events
			$query = "DELETE FROM events WHERE event_id IN (";
			for ($i=0; $i<count($array); $i++) {
				$query .= $array[$i][0];
				if ($i < count($array)-1) {
					$query .= ", ";
				}
			}
			
			$query .= ")";
			
			$result = mysqli_query($dbCon, $query);
			if (!$result){             
				echo "Failure to query:\n" . $query . "\n";
			} else {
				echo "Successfully Removed Events:\n" . $query . "\n";
			}
			
			
			// Remove Image
			for ($i=0; $i<count($array); $i++) {
				if (!in_array($array[$i][1], $default_imgs)) {
					if (unlink($target_dir . $array[$i][1])) {
						echo "\n\nImage Removed: " . $array[$i][1];
					} else {
						echo "Error Removing Image: " . $array[$i][1];
					}
				} else {
					echo "\nImage is a Default Image...";
				}
			}
			
		}
	}
	
	mysqli_close($dbCon);
?>
