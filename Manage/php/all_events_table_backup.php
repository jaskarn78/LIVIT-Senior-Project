<?php
	ini_set('display_errors', 1);
	include_once ('../../php/connection.php');
	include_once ('../../php/init_facebook_php_sdk.php');
	//include 'string_normalize.php';
	session_start();
	
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	if (isset($_SESSION['facebook_access_token'])) {
		try {
			$accessToken = $_SESSION['facebook_access_token'];
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}catch (FacebookRequestException $ex) {
			// Session not valid, Graph API returned an exception with the reason.
			echo $ex->getMessage();
		} catch (\Exception $ex) {
			// Graph API returned info, but it may mismatch the current app or have expired.
			echo $ex->getMessage();
		} catch (Facebook\Exceptions\FacebookSDKException $ex) {
			
		}
		
		$nameSet = isset($_REQUEST['event_name']) ? $_REQUEST['event_name'] : '';
		$dateSet = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
		$sponSet = isset($_REQUEST['event_sponsor']) ? $_REQUEST['event_sponsor'] : '';
		
		//$nameSet = convertString($nameSet);
		//$sponSet = convertString($sponSet);
		
		if ($nameSet !== "" || $dateSet !== "" || $sponSet !== "") {
			$query = "SELECT event_id, event_name, event_sponsor, event_location, preference_id, start_date
				      FROM events WHERE ";

			if ($nameSet) {
				$query .= sprintf("event_name LIKE '%%s%'", $nameSet);
				if ($dateSet || $sponSet)
					$query .= " or ";
			}
			
			if ($dateSet) {
				$query .= "start_date='%$dateSet%'";
				if ($sponSet)
					$query .= " or ";
			}
			
			if ($sponSet) {
				$query .= "event_sponsor LIKE '%$sponSet%'";
			}
			
			$array = array();
			$result = mysqli_query($dbCon, $query);

			if (!$result){             
			  echo "Failure to query";
			} else {
			  //echo "Query execution success\n";
			  while($row = mysqli_fetch_assoc($result)) {
				$array[]=$row;
			  }
			}
		} else {
			$query = "SELECT event_id, event_name, event_sponsor, event_location, preference_id, start_date
				      FROM events"; 
			$array = array();
			$result = mysqli_query($dbCon, $query);

			if (!$result){             
			  echo "Failure to query";
			} else {
			  //echo "Query execution success\n";
			  while($row = mysqli_fetch_assoc($result)) {
				$array[]=$row;
			  }
			}
		}
	}

	if (isset($array)) { 
		$output = "<table id =\"t01\" align=\"center\">\n";

		$output .= "<tr>\n";
		$output .= "<th>" . "Image" . "</th>\n";
		$output .= "<th>" . "Event Name" ."</th>\n";
		$output .= "<th>" . "Location" . "</th>\n";
		$output .= "<th>" . "Date" . "</th>\n";
		$output .= "<th>" . "Sponsor" . "</th>\n";
		$output .= "<th>" . "Select" . "</th>\n";
		
		for ($i = 0; $i < count($array); $i++) {
			# Add "onclick" to change to event preview
			# Add JavaScript to create an array of checked events
			//$eventName = revertString($array[$i]['event_name']);
			//$eventSpon = revertString($array[$i]['event_sponsor']);
			
			
			$output .= "<tr id='" . $array[$i]['event_id'] . "' name='" . $array[$i]['event_id'] . "'>\n";
			$output .= "<td><img src=\"http://athena.ecs.csus.edu/~teamone/images/logo.jpg\" width='100' height='100' align='middle'/></td>\n";
			$output .= "<td>" . $array[$i]['event_name'] . "</td>\n";
			$output .= "<td>" . $array[$i]['event_location'] . "</td>\n";
			$output .= "<td>" . $array[$i]['start_date'] . "</td>\n";
			$output .= "<td>" . $array[$i]['event_sponsor'] . "</td>\n";
			$output .= "<td><input type=\"checkbox\" name =\"removeSelect\" id=\"removeSelect\"/></td>\n";
		}
		$output .= "</tablet01>\n";
		
		echo $output;
	}
?>