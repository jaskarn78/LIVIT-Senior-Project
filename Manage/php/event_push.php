<?php
	session_start();
	ini_set('display_errors',1);
	include_once('../../php/connection.php');
	include ('date_converter.php');
	define ('EVENTS', '../../events/');
	define ('URL', 'http://athena.ecs.csus.edu/~teamone/events/');
	error_reporting(E_ALL);
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$userId = $_SESSION['user_id'];
	
	// Grab Form fields from event_review.php page
	$eventName 			= isset($_POST['eventName']) ? ($_POST['eventName']) : '';
	$eventSponsor 		= isset($_POST['eventSponsor']) ? ($_POST['eventSponsor']) : '';
	$eventDescription 	= isset($_POST['eventDescription']) ? ($_POST['eventDescription']) : '';
	$eventWeb 			= isset($_POST['eventURL']) ? ($_POST['eventURL']) : '';
	$eventPhone 		= isset($_POST['eventPhone']) ? ($_POST['eventPhone']) : '';
	$startDate			= isset($_POST['startDate']) ? ($_POST['startDate']) : '';
	$endDate 			= isset($_POST['endDate']) ? ($_POST['endDate']) : 'NULL';
	$startTime			= isset($_POST['startTime']) ? ($_POST['startTime']) : '';
	$endTime			= isset($_POST['endTime']) ? ($_POST['endTime']) : 'NULL';
	$location 			= isset($_POST['eventLocation']) ? ($_POST['eventLocation']) : '';
	$preferences 		= isset($_POST['eventPreferences']) ? ($_POST['eventPreferences']) : '';
	$age  				= isset($_POST['age']) ? ($_POST['age']) : 'All';
	$lat				= isset($_POST['lat']) ? ($_POST['lat']) : '';
	$long				= isset($_POST['long']) ? ($_POST['long']) : '';
	$cost 				= isset($_POST['cost']) ? ($_POST['cost']) : '0';
	
	
	// Set the values for the event preferences; must have at least 1 preference
	$pref1 = NULL;
	$pref2 = 'NULL';
	$pref3 = 'NULL';
	
	if (!empty($preferences)) {
		$size = count($preferences);
		if ($size >= 1)
			$pref1 = $preferences[0];
		if ($size >= 2)
			$pref2 = $preferences[1];
		if ($size == 3)
			$pref3 = $preferences[2];
	}
	
	// Convert the dates to database format
	$startDate  = convertDate($startDate);
	$endDate	= convertDate($endDate);

	$startDate = mysqli_real_escape_string($dbCon, $startDate);
	$startDate = strtotime($startDate);
	$startDate = date('Y-m-d',$startDate);
	
	$endDate = mysqli_real_escape_string($dbCon, $endDate);
	$endDate = strtotime($endDate);
	$endDate = date('Y-m-d',$endDate);
	
	// Convert the times to database format
	$startTime = mysqli_real_escape_string($dbCon, $startTime);
	$startTime = strtotime($startTime);
	$startTime = date('H:i:s',$startTime);
	
	$endTime = mysqli_real_escape_string($dbCon, $endTime);
	$endTime = strtotime($endTime);
	$endTime = date('H:i:s',$endTime);
	
	// Make sure cost is an integer value
	$cost = preg_replace("/[^0-9-.]/", "", $cost);
	
	echo "out";
	
	if (!empty($location)) echo "loc ok";
	
	
	// Make sure that all of the necessary fields have a value set
	if (!empty($eventName) && !empty($eventSponsor) && !empty($startDate) && !empty($startTime) && 
		!empty($eventDescription) && !empty($location) && !empty($lat) && !empty($long) && (!empty($cost) || $cost === 0 || $cost === '0') && 
		!empty($age) && $pref1 != NULL) {
		
		echo "in";
		// Upload event to database
		$query = 	sprintf("INSERT into events(event_id, poster_id, event_name, event_website, event_location, event_phone, lat, lng, preference_id, preference_id2, preference_id3, img_path, event_sponsor, start_date, start_time, end_date, end_time, event_description, event_cost, event_age)
							 VALUES(NULL, $userId, '%s', '%s', '%s', '$eventPhone', $lat, $long, $pref1, $pref2, $pref3, NULL, '%s', '$startDate', '$startTime', '$endDate', '$endTime', '%s', $cost, '$age')", 
							 mysqli_real_escape_string($dbCon, $eventName),
							 mysqli_real_escape_string($dbCon, $eventWeb),
							 mysqli_real_escape_string($dbCon, $location),
							 mysqli_real_escape_string($dbCon, $eventSponsor),
							 mysqli_real_escape_string($dbCon, $eventDescription));
							 

		$result = mysqli_query($dbCon, $query);
		
		if (!$result) {
			echo mysqli_error($dbCon);
		} else {
			// Upload the event image to the database
			if (is_uploaded_file ($_FILES["fileToUpload"]["tmp_name"]) && $eventSponsor!=='' && $eventName!=='' && $startTime!=='' ) {
				$target_dir = "../../events/";
				
				// Event ID
				$eventId = mysqli_insert_id($dbCon);
				
				// Adjust Sponsor name for image name 
				$adjSpon = preg_replace("/[^A-Za-z0-9 ]/", "", $eventSponsor);
				$adjSpon = preg_replace('/\s+/S', "", $adjSpon);
				if (strlen($adjSpon)>30)
					substr_replace($adjSpon, $adjSpon, 0, 30);
				
				// Adjusted end date for the image name
				$adjDate = str_replace('/', "", $startDate);
				
				// Get image type from current image 
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				
				// Name the file using the normal format
				$filename =	sprintf("%s_%s_%s.%s", 
									$adjSpon, 
									$eventId,
									$adjDate,
									$imageFileType);
				
				// Set the target file path
				$target_file = $target_dir . $filename;
				$uploadOk = 1;
				
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

				if($check !== false) {
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
				// Check if file already exists
				if (file_exists($target_file)) {
					$success = true;
					$uploadOk = 0;
				}
				
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 800000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk != 0) {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						// Add the new image URL name to the database
						chmod($target_file, 0655);
						$query = 	sprintf("UPDATE events
											 SET img_path='%s'
											 WHERE event_id=$eventId", 
											 mysqli_real_escape_string($dbCon,$filename));
											 
						echo $query;

						$result = mysqli_query($dbCon, $query);
						
						if ($result)
							echo "Image added";
						else
							echo mysqli_error($dbCon);
					} 
				} else {
						echo "Sorry, there was an error uploading your file.";
				}
			} else {
				// Event ID
				$eventId = mysqli_insert_id($dbCon);

				// Name the file using the normal format
				$filename =	"logo.jpg";
				
				$query = 	sprintf("UPDATE events
									 SET img_path='%s'
									 WHERE event_id=$eventId", 
									 mysqli_real_escape_string($dbCon,$filename));
									 
				echo $query;

				$result = mysqli_query($dbCon, $query);
				
				if ($result)
					echo "Image added";
				else
					echo mysqli_error($dbCon);
			
			}
		}
	}
	
	mysqli_close($dbCon);
?>
