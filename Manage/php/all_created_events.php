<?php
	ini_set('display_errors', 1);
	include_once ('../../php/connection.php');
	define ('PATH', 'http://athena.ecs.csus.edu/~teamone/events/');
	session_start();
	
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	if (isset($_SESSION['facebook_access_token'])) {
		$nameSet = isset($_REQUEST['event_name']) ? mysqli_real_escape_string($dbCon, $_REQUEST['event_name']) : '';
		$dateSet = isset($_REQUEST['start_date']) ? mysqli_real_escape_string($dbCon, $_REQUEST['start_date']) : '';
		$sponSet = isset($_REQUEST['event_sponsor']) ? mysqli_real_escape_string($dbCon, $_REQUEST['event_sponsor']) : '';
		
		// set user ID
		$userId = $_SESSION['user_id'];
		
				// Default query
		$query = sprintf("SELECT event_id, event_name, event_sponsor, event_location, preference_id, start_date, img_path
						  FROM events WHERE poster_id='$userId'");
		
		// Check which variables are set (inputted by the user), pick appropriate query
		if (!empty($nameSet) && !empty($dateSet) && !empty($sponSet)) {
			$query = sprintf("SELECT event_id, event_name, event_sponsor, event_location, preference_id, start_date, img_path
				    FROM events WHERE poster_id='$userId' AND event_name LIKE '%%%s%%' or start_date LIKE '%%%s%%' or event_sponsor LIKE '%%%s%%'",
					$nameSet, $dateSet,  $sponSet);
		} else if (!empty($nameSet) && !empty($dateSet)) {
			$query = sprintf("SELECT event_id, event_name, event_sponsor, event_location, preference_id, start_date, img_path
					FROM events WHERE poster_id='$userId' AND event_name LIKE '%%%s%%' or start_date LIKE '%%%s%%'", 
					$nameSet, $dateSet);
		} else if (!empty($nameSet) && !empty($sponSet)) {
			$query = sprintf("SELECT event_id, event_name, event_sponsor, event_location, preference_id, start_date, img_path
					FROM events WHERE poster_id='$userId' AND event_name LIKE '%%%s%%' or event_sponsor LIKE '%%%s%%'", 
					$nameSet, $sponSet);
		} else if (!empty($dateSet) && !empty($sponSet)) {
			$query = sprintf("SELECT event_id, event_name, event_sponsor, event_location, preference_id, start_date, img_path
					FROM events WHERE poster_id='$userId' AND start_date LIKE '%%%s%%' or event_sponsor LIKE '%%%s%%'", 
					$dateSet, $sponSet);
		} else if (!empty($nameSet)) {
			$query = sprintf("SELECT event_id, event_name, event_sponsor, event_location, preference_id, start_date, img_path
					FROM events WHERE poster_id='$userId' AND event_name LIKE '%%%s%%'", $nameSet);
		} else if (!empty($sponSet)) {
			$query = sprintf("SELECT event_id, event_name, event_sponsor, event_location, preference_id, start_date, img_path
					FROM events WHERE poster_id='$userId' AND event_sponsor LIKE '%%%s%%'", $sponSet);
		} else if (!empty($dateSet)) {
			$query = sprintf("SELECT event_id, event_name, event_sponsor, event_location, preference_id, start_date, img_path
					FROM events WHERE poster_id='$userId' AND start_date LIKE '%%%s%%'", $dateSet);
		}
		
		// Query the results, store in an array
		$array = array();
		$result = mysqli_query($dbCon, $query);

		if (!$result){             
		  echo "Failure to query";
		} else {
		  while($row = mysqli_fetch_assoc($result)) {
			$array[]=$row;
		  }
		}
	}
	if (isset($array)) { 
		$output = "";
		for ($i = 0; $i < count($array); $i++) {
			$output .= "<form action='http://athena.ecs.csus.edu/~teamone/Manage/admin_review.php' id='" . $array[$i]['event_id'] . "' method='POST'>\n";
			$output .= "<input readonly id='eventId' name='eventId' value='" . $array[$i]['event_id'] . "' hidden></input>\n";
			$output .= "</form>\n";
		}
	}

	
	// Print the event list in HTML code
	if (isset($array)) { 
		$output .= "<table id =\"t01\" align=\"center\">\n";

		$output .= "<tr>\n";
		$output .= "<th>" . "Image" . "</th>\n";
		$output .= "<th>" . "Event Name" ."</th>\n";
		$output .= "<th>" . "Location" . "</th>\n";
		$output .= "<th>" . "Date" . "</th>\n";
		$output .= "<th>" . "Sponsor" . "</th>\n";
		$output .= "<th>" . "Select" . "</th>\n";
		
		for ($i = 0; $i < count($array); $i++) {
			# Add "onclick" to change to event preview
			# Add JavaScript to create an array of checked event
			$img = isset($array[$i]['img_path']) ? PATH . $array[$i]['img_path'] : PATH . 'logo.jpg';
			$checkId = "remove_" . $array[$i]['event_id'];
			
			$output .= "<tr style='cursor: pointer;' onmouseover=''>\n";
			$output .= "<td onclick='document.getElementById(\"" . $array[$i]['event_id'] . "\").submit();'><img src='" . $img . "' width='100' height='100' align='middle'/></td>\n";
			$output .= "<td onclick='document.getElementById(\"" . $array[$i]['event_id'] . "\").submit();'>" . $array[$i]['event_name'] . "</td>\n";
			$output .= "<td onclick='document.getElementById(\"" . $array[$i]['event_id'] . "\").submit();'>" . $array[$i]['event_location'] . "</td>\n";
			$output .= "<td onclick='document.getElementById(\"" . $array[$i]['event_id'] . "\").submit();'>" . $array[$i]['start_date'] . "</td>\n";
			$output .= "<td onclick='document.getElementById(\"" . $array[$i]['event_id'] . "\").submit();'>" . $array[$i]['event_sponsor'] . "</td>\n";
			$output .= "<td style=\"text-align:center;\"><input type=\"checkbox\" onclick=\"addChecked('$checkId', '" . $array[$i]['event_id'] . "', '" . $array[$i]['img_path'] . "');\" id=\"$checkId\"/></td>\n";
		}
		$output .= "</tablet01>\n";
		
		echo $output;
	}
?>