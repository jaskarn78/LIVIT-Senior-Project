<?php
	include_once ('../../php/init_facebook_php_sdk.php');
	include_once ('string_normalize.php');
	require_once ('../../php/Facebook/autoload.php');
	use Facebook\FacebookRequest;

	ini_set('display_errors', 1);
	session_start();
	
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	if (isset($_SESSION['facebook_access_token'])) {
		try {
			$accessToken = $_SESSION['facebook_access_token'];
			$appsecret_proof = $_SESSION['appsecret_proof'];
			$request = $fb->get("/me/events?fields=attending_count,cover,name,description,id,place,start_time,is_viewer_admin", $accessToken, $appsecret_proof);
			
			$graphEdge = $request->getGraphEdge();
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
	}
	
	if (isset($graphEdge)) { 
		$output = "<table id='thirdPartyPulltable' align='center' style='text-align:center;'>\n";
		$output .= "<tbody>\n";
		
		
		foreach ($graphEdge as $eventNode) {
			if ($eventNode['is_viewer_admin']) {
				$eventId = $eventNode['id'];
				$eventName = $eventNode['name'];
				$eventLoc  = '';
				$eventSDate= '';
				$eventSHour= -1;
				$eventSMin = -1;
				$eventDesc = '';
				$eventPic = "http://athena.ecs.csus.edu/~teamone/images/logo.jpg";
				
				$adjName = $eventName;
				$adjDesc = $eventDesc;
				
				if (isset($eventNode['start_time'])) {
					$dt = $eventNode['start_time'];
					$eventSDate = $dt->format('m/d/Y');
					$eventSHour = $dt->format('H');
					$eventSMin  = $dt->format('i');
				}
				
				if (isset($eventNode['cover'])) {
					$eventPic = $eventNode['cover']['source'];
					$eventPic = str_replace('"', '%q', $eventPic);
					$eventPic = str_replace("'", '%s', $eventPic);
				}
				
				if (isset($eventNode['place'])) {
					if (isset($eventNode['place']['name'])) {
						$eventLoc .= $eventNode['place']['name'];
						$eventLoc .= "    ";
					}
					
					if (isset($eventNode['place']['location'])) {
						if (isset($eventNode['place']['location']['city']))
							$eventLoc .= $eventNode['place']['location']['city'];
						if (isset($eventNode['place']['location']['state']))
							$eventLoc .= ", " . $eventNode['place']['location']['state'];
					}
				} 
				
				if (isset($eventNode['description'])) {
					$eventDesc = $eventNode['description'];
				}
				
				$adjDesc = convertString($eventDesc);
				$adjName = convertString($eventName);
				$adjLoc = convertString($eventLoc);
				
				$output .= "<tr style='cursor: pointer' onclick='fillForms(\"$adjName\", \"$adjDesc\", \"$adjLoc\", \"$eventSDate\", $eventSHour, $eventSMin, \"$eventPic\")'>\n";						
				$output .= "<td><img src='". $eventPic ."' width='100' height='auto' align='middle'/></td>\n";
				$output .= "<td style='text-align:center;'>\n";
				$output .= $eventName . "<br><br>\n";
				//$output .= $location . "<br><br>\n";
				$output .= $eventSDate . "<br><br>\n";
				$output .= "</td>\n";
				$output .= "</tr>\n";
			}
		}
		
		$output .= "</tbody>\n";
		$output .= "</table>\n";
		echo $output;
	}
?>