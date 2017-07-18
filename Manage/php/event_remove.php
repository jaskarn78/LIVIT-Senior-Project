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
	
	$image   = $_POST['image'];
	$eventId = $_POST['event_id'];
	
	// Delete from saved_events
	$query = "DELETE FROM saved_events WHERE saved_event_ID=$eventId";

	$result = mysqli_query($dbCon, $query);
	if (!$result){             
		echo "Failure to query:\n" . $query . "\n";
	} else {
		echo "Successfully Removed Events:\n" . $query . "\n";
	}
	
	// Delete from saved_events
	$query = "DELETE FROM deleted_events WHERE deleted_event_id=$eventId";
	
	$result = mysqli_query($dbCon, $query);
	if (!$result){             
		echo "Failure to query:\n" . $query . "\n";
	} else {
		echo "Successfully Removed Events:\n" . $query . "\n";
	}
	
	// Delete from Events
	$query = "DELETE FROM events WHERE event_id=$eventId";
	
	$result = mysqli_query($dbCon, $query);
	if (!$result){             
		echo "Failure to query:\n" . $query . "\n";
	} else {
		echo "Successfully Removed Events:\n" . $query . "\n";
	}
	
	
	if (isset($image) && !empty($image)) {
		if (!in_array($image, $default_imgs)) {
			if (unlink($target_dir . $image)) {
				echo "\n\nImage Removed: " . $image;
			} else {
				echo "Error Removing Image: " . $image;
			}
		} else {
			echo "\nImage is a Default Image...";
		}
	}
	
	mysqli_close($dbCon);
?>
