<?php
	session_start();
	include_once ('../php/check_login.php');
	include_once('../php/connection.php');
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	
	$eventName 			= isset($_POST['eventname']) ? ($_POST['eventname']) : '';
	$eventSponsor 		= isset($_POST['eventsponsor']) ? ($_POST['eventsponsor']) : '';
	$eventDesc 			= isset($_POST['eventdescription']) ? ($_POST['eventdescription']) : '';
	$eventWeb 			= isset($_POST['eventWebsite']) ? ($_POST['eventWebsite']) : '';
	$eventPhone 		= isset($_POST['eventPhone']) ? ($_POST['eventPhone']) : '';
	$startDate			= isset($_POST['datepicker']) ? ($_POST['datepicker']) : '';
	$endDate 			= isset($_POST['datepicker2']) ? ($_POST['datepicker2']) : '';
	$startTime			= isset($_POST['startTime']) ? ($_POST['startTime']) : '';
	$endTime			= isset($_POST['endTime']) ? ($_POST['endTime']) : '';
	$location 			= isset($_POST['eventlocation']) ? ($_POST['eventlocation']) : '';
	$preferences 		= isset($_POST['eventPreferences']) ? ($_POST['eventPreferences']) : '';
	$age  				= isset($_POST['age']) ? ($_POST['age']) : 'All';
	$lat				= isset($_POST['lat']) ? ($_POST['lat']) : '';
	$long				= isset($_POST['long']) ? ($_POST['long']) : '';
	$cost 				= isset($_POST['eventCost']) ? ($_POST['eventCost']) : '0';
	
	$pref1 = -1;
	$pref2 = -1;
	$pref3 = -1;
	
	if (!empty($preferences)) {
		$size = count($preferences);
		if ($size >= 1)
			$pref1 = $preferences[0];
		if ($size >= 2)
			$pref2 = $preferences[1];
		if ($size == 3)
			$pref3 = $preferences[2];
	}
?>
<!--<img id="logoImage" src="http://athena.ecs.csus.edu/~teamone/events/logo.jpg" alt="your image" style="height:300px; width:300px;" /><br>-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Confirmation Page</title>
<script type="text/javascript" src="http://athena.ecs.csus.edu/~teamone/js/jquery.js"></script>
<script type="text/javascript" src="http://athena.ecs.csus.edu/~teamone/js/jquery-ui.js"></script> 
<link rel="icon" href="http://athena.ecs.csus.edu/~teamone/images/favicon.png" type="image/png" />
<link rel="shortcut icon"  href="http://athena.ecs.csus.edu/~teamone/images/favicon.png" type="image/png"/>
<link href="http://athena.ecs.csus.edu/~teamone/css/realStyle.css" rel="stylesheet" type="text/css"/>
<link href="http://athena.ecs.csus.edu/~teamone/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script>
window.onload = function() {
	// set event name
	var eventName = <?php echo '\'' . mysqli_real_escape_string($dbCon, $eventName) . '\''; ?>;
	document.getElementById("eventNameForm").value = eventName;
	
	// set event sponsor
	var eventSpon = <?php echo '\'' . mysqli_real_escape_string($dbCon, $eventSponsor) . '\''; ?>;
	document.getElementById("eventSponsorForm").value = eventSpon;
	// set event description
	var eventDesc = <?php echo '\'' . mysqli_real_escape_string($dbCon, $eventDesc) . '\''; ?>;
	document.getElementById("eventDescForm").value = eventDesc;
	
	// set event website
	var eventWeb = <?php echo '\'' . mysqli_real_escape_string($dbCon, $eventWeb) . '\''; ?>;
	document.getElementById("eventWebsite").value = eventWeb;
	
	var eventPhone = <?php echo '\'' . mysqli_real_escape_string($dbCon, $eventPhone) . '\''; ?>;
	document.getElementById("eventPhone").value = eventPhone;
	
	// set event start date
	var startDate = <?php echo '\'' . $startDate . '\''; ?>;
	document.getElementById("datepicker").value = startDate;
	
	// set event start time
	var startTime = <?php echo '\'' . $startTime . '\''; ?>;
	document.getElementById("startTime").value = startTime;
	
	// set event end date
	var endDate   = <?php echo '\'' . $endDate . '\''; ?>;
	document.getElementById("datepicker2").value = endDate;
	
	// set event end time
	var endTime	  = <?php echo '\'' . $endTime . '\''; ?>;
	document.getElementById("endTime").value = endTime;
	
	// set event location
	var location  = <?php echo '\'' . mysqli_real_escape_string($dbCon, $location) . '\''; ?>;
	document.getElementById("pac-input").value = location;
	
	// set event age
	var age		  = <?php echo '\'' . $age . '\''; ?>;
	document.getElementById("age").value = age;
	
	// set event cost
	var cost	  = <?php echo '\'' . mysqli_real_escape_string($dbCon, $cost) . '\''; ?>;
	document.getElementById("eventCost").value = cost;
	
	// set event location latitude 
	var lat		  = <?php echo $lat; ?>;
	document.getElementById("lat").value = lat;
	
	// set event location longitude
	var lng		  = <?php echo $long; ?>;
	document.getElementById("long").value = lng;
		
		
	// Preference Checking
	var pref1 = <?php echo $pref1; ?>;
	var pref2 = <?php echo $pref2; ?>;
	var pref3 = <?php echo $pref3; ?>;
	
	if (pref1 != -1) {
		document.getElementById("preference" + pref1).checked = true;
		document.getElementById("preference" + pref1).disabled = true;
	} if (pref2 != -1) {
		document.getElementById("preference" + pref2).checked = true;
		document.getElementById("preference" + pref2).disabled = true;
	} if (pref3 != -1) {
		document.getElementById("preference" + pref3).checked = true;
		document.getElementById("preference" + pref3).disabled = true;
	}
	
	<?php mysqli_close($dbCon); ?>
	
	
	var max = 3;
    var checkboxes = $('input[type="checkbox"]');

	var current = checkboxes.filter(':checked').length;
	checkboxes.filter(':not(:checked)').prop('disabled', current >= max);

	for (var i=1; i<=9; i++) {
			document.getElementById("preference" + i).disabled= true;
	}
	
}

</script>

<script>

	function pushEvent()
	{
		var xmlhttp = new XMLHttpRequest({mozSystem: true});
		var url = "http://athena.ecs.csus.edu/~teamone/Manage/php/event_push.php";
		var formData = new FormData(document.getElementById("reviewForm"));
		
		xmlhttp.open("POST", url, true);
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				console.log(xmlhttp.responseText);
				window.location.href = "http://athena.ecs.csus.edu/~teamone/Manage/headliner.php";
			} else {
				console.log(xmlhttp.responseText);
			}
		};
	
		xmlhttp.send(formData);
	}
</script>
  
 <!--enable/disable textfieds script-->
    <script type="text/javascript">
function toggleTextbox(opt)
{
    if (opt == 'F'){
        document.getElementById('eventNameForm').removeAttribute('readonly');
		document.getElementById('eventSponsorForm').removeAttribute('readonly');
		document.getElementById('pac-input').removeAttribute('readonly');
		document.getElementById('pac-input').removeAttribute('style');
		document.getElementById('datepicker').removeAttribute('readonly');
		document.getElementById('datepicker2').removeAttribute('readonly');
		document.getElementById('eventCost').removeAttribute('readonly');
		document.getElementById('eventDescForm').removeAttribute('readonly');
		document.getElementById('eventURL').removeAttribute('readonly');
		
		
		document.getElementById('startTimeSelect').disabled = false;
		document.getElementById('endTimeSelect').disabled = false;
		document.getElementById('age').disabled = false;
		
		$(document).ready(function() {
		// Datepicker Popups calender to Choose date.
		  $(window).keydown(function(event){
			if(event.keyCode == 13) {
			  event.preventDefault();
			  return false;
			}
		  });
		// Datepicker Popups calender to Choose date.
		$(function() {
			$("#datepicker").datepicker();
			// Pass the user selected date format.
				$("#format").change(function() {
					$("#datepicker").datepicker("option", "dateFormat", $(this).val());
				});
			});
		});
		
		
		$(document).ready(function() {
			// Datepicker Popups calender to Choose date.
			$(function() {
				$("#datepicker2").datepicker();
				// Pass the user selected date format.
				$("#format").change(function() {
					$("#datepicker2").datepicker("option", "dateFormat", $(this).val());
				});
			});
		});
		
		
		var max = 3;
		var checkboxes = $('input[type="checkbox"]');

		var current = checkboxes.filter(':checked').length;
		checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
		
		for (var i=1; i<=9; i++) {
			if (document.getElementById("preference" + i).checked == true)
				document.getElementById("preference" + i).disabled= false;
		}	
	}		
}
    </script> 

<!--checkbox max script-->
<script>
jQuery(function(){
    var max = 3;
    var checkboxes = $('input[type="checkbox"]');
                       
    checkboxes.change(function(){
        var current = checkboxes.filter(':checked').length;
        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
    });
});	
</script>

<script>
function cancelConfirm() {
    if (confirm("Are you sure you wan't to remove this event?") == true) {
		window.location.href="http://athena.ecs.csus.edu/~teamone/Manage/manage.php"
    }
}
</script>

<!--Google API Inline Styling-->			
<style>
 #map {
		z-index:20;
	    min-height:130px;
        height: inherit;
		width: 100%;
		margin:0px;
		margin-right:5px;
      }
	  
	  
	  .hiddnInputFile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
	}
	
	.unSelectable {
            -moz-user-select:none;
            -webkit-user-select:none;
        }
</style>



</head>
 	
<body>
<div class="container" style="width:100%; margin:0px; padding:0px;"><!--body div-->
<header>

  <nav class="navbar navbar-inverse" style="border-color:transparent; border-width: 0px;">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myInverseNavbar2" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#"><img src="http://athena.ecs.csus.edu/~teamone/images/LivitLogo.jpg" style="float:left; height:42px; width:42px; padding-bottom:0px;" /></a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="myInverseNavbar2">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://athena.ecs.csus.edu/~teamone/">HOME</a></li>
        <li> <a href="http://athena.ecs.csus.edu/~teamone/About/about.php">ABOUT</a></li>
        <li> <a href="http://athena.ecs.csus.edu/~teamone/Contact/contact.php">CONTACT</a></li>
        <?php
          if (isset($_SESSION['facebook_access_token'])) {
			 echo '<li> <a href="http://athena.ecs.csus.edu/~teamone/Manage/manage.php">MANAGE</a></li>';
             echo '<li><a href="http://athena.ecs.csus.edu/~teamone/php/login/logout.php">LOGOUT</a></li>';
          } else {
             echo '<li><a href="http://athena.ecs.csus.edu/~teamone/login_page.php">LOG IN</a></li>';
          }
        ?>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>


<!-- Old GOod Header
<a href="">
<h4 class="logo"><img id="logoImage" src="http://athena.ecs.csus.edu/~teamone/images/LivitLogo.jpg" style="float:left; height:44px; width:44px;" /></h4> 
</a>
<nav class="nav">
<ul class="nav-list">	
	<li  class="nav-item"><a href="http://athena.ecs.csus.edu/~teamone/">HOME</a></li>
	<li  class="nav-item"> <a href="http://athena.ecs.csus.edu/~teamone/About/about.php">ABOUT</a></li>
	<li  class="nav-item"> <a href="http://athena.ecs.csus.edu/~teamone/Contact/contact.php">CONTACT</a></li>

  </ul>
</nav>
 
 End Old Good-->
  </header>
  <form action="#" onsubmit="pushEvent();" id="reviewForm" name="reviewForm" method="POST" enctype="multipart/form-data"><!--Push Form-->
  <div id="hero_review" name="hero_review"> 
  <div id="top" name="top" style="width:100%; font-size:36px; margin: 0px; text-align:center; "><label><b>Event Preview</b></label></div>
  
  <!--info Container-->
    <div id="info" name="info" style="width:100%; height:100%; text-align:center;  vertical-align: middle; margin:0px; ">
	
	
    <!--left div-->
    <div id="left" class="unSelectable" style="height: inherit; width:inherit; max-width:28%; min-width:275px; display: inline-block; text-align:left; padding-left: 2%; margin:0px; vertical-align: middle;">
		<b><label>Event:</label></b>
  <input type="text" id="eventNameForm" name="eventName" style="margin:5px;" readonly value=""></input><br>
		<b><label>Sponsor:</label></b>
  <input type="text" id="eventSponsorForm" name="eventSponsor"  style="margin:5px;" readonly value=""></input><br>
  		<b><label>Website:</label></b>
  <input type="text" id="eventWebsite" name="eventWebsite"  style="margin:5px;" readonly value=""></input><br>
  		<b><label>Phone:</label></b>
  <input type="text" id="eventPhone" name="eventPhone"  style="margin:5px;" readonly value=""></input><br>
  
  <b><label>Start Date: </label></b>	
  <input type="text" id="datepicker" name="startDate"  style="margin:5px;" readonly   value=""></input><br>
    <b><label>End Date:</label></b>  
  <input type="text" id="datepicker2" name="endDate"  style="margin:5px;" readonly   value=""></input><br>
	
  <b><label>Start Time:</label></b>
   <select name="startTimeSelect" id="startTimeSelect" class="startTime"  style="margin:5px;"  onmousedown="if(this.options.length>5){this.size=5;}" disabled='true' onchange='this.size=0;' onblur="this.size=0;">
<option value="00:00:00">12:00 AM</option>	
<option value="00:15:00">12:15 AM</option>
<option value="00:30:00">12:30 AM</option>
<option value="00:45:00">12:45 AM</option>

<option value="01:00:00">1:00 AM</option>
<option value="01:15:00">1:15 AM</option>
<option value="01:30:00">1:30 AM</option>
<option value="01:45:00">1:45 AM</option>

<option value="02:00:00">2:00 AM</option>
<option value="02:15:00">2:15 AM</option>
<option value="02:30:00">2:30 AM</option>
<option value="02:45:00">2:45 AM</option>

<option value="03:00:00">3:00 AM</option>
<option value="03:15:00">3:15 AM</option>
<option value="03:30:00">3:30 AM</option>
<option value="03:45:00">3:45 AM</option>

<option value="04:00:00">4:00 AM</option>
<option value="04:15:00">4:15 AM</option>
<option value="04:30:00">4:30 AM</option>
<option value="04:45:00">4:45 AM</option>

<option value="05:00:00">5:00 AM</option>
<option value="05:15:00">5:15 AM</option>
<option value="05:30:00">5:30 AM</option>
<option value="05:45:00">5:45 AM</option>
 
<option value="06:00:00">6:00 AM</option>
<option value="06:15:00">6:15 AM</option>
<option value="06:30:00">6:30 AM</option>
<option value="06:45:00">6:45 AM</option>
 
<option value="07:00:00">7:00 AM</option>
<option value="07:15:00">7:15 AM</option>
<option value="07:30:00">7:30 AM</option>
<option value="07:45:00">7:45 AM</option>
 
<option value="08:00:00">8:00 AM</option>
<option value="08:15:00">8:15 AM</option>
<option value="08:30:00">8:30 AM</option>
<option value="08:45:00">8:45 AM</option>
 
<option value="09:00:00">9:00 AM</option>
<option value="09:15:00">9:15 AM</option>
<option value="09:30:00">9:30 AM</option>
<option value="09:45:00">9:45 AM</option>
 
<option value="10:00:00">10:00 AM</option>
<option value="10:15:00">10:15 AM</option>
<option value="10:30:00">10:30 AM</option>
<option value="10:45:00">10:45 AM</option>
 
<option value="11:00:00">11:00 AM</option>
<option value="11:15:00">11:15 AM</option>
<option value="11:30:00">11:30 AM</option>
<option value="11:45:00">11:45 AM</option>
 
<option value="12:00:00">12:00 PM</option>
<option value="12:15:00">12:15 PM</option>
<option value="12:30:00">12:30 PM</option>
<option value="12:45:00">12:45 PM</option>
 
<option value="13:00:00">1:00 PM</option>
<option value="13:15:00">1:15 PM</option>
<option value="13:30:00">1:30 PM</option>
<option value="13:45:00">1:45 PM</option>
 
<option value="14:00:00">2:00 PM</option>
<option value="14:15:00">2:15 PM</option>
<option value="14:30:00">2:30 PM</option>
<option value="14:45:00">2:45 PM</option>
 
<option value="15:00:00">3:00 PM</option>
<option value="15:15:00">3:15 PM</option>
<option value="15:30:00">3:30 PM</option>
<option value="15:45:00">3:45 PM</option>
 
<option value="16:00:00">4:00 PM</option>
<option value="16:15:00">4:15 PM</option>
<option value="16:30:00">4:30 PM</option>
<option value="16:45:00">4:45 PM</option>
 
<option value="17:00:00">5:00 PM</option>
<option value="17:15:00">5:15 PM</option>
<option value="17:30:00">5:30 PM</option>
<option value="17:45:00">5:45 PM</option>
 
<option value="18:00:00">6:00 PM</option>
<option value="18:15:00">6:15 PM</option>
<option value="18:30:00">6:30 PM</option>
<option value="18:45:00">6:45 PM</option>
 
<option value="19:00:00">7:00 PM</option>
<option value="19:15:00">7:15 PM</option>
<option value="19:30:00">7:30 PM</option>
<option value="19:45:00">7:45 PM</option>
 
<option value="20:00:00">8:00 PM</option>
<option value="20:15:00">8:15 PM</option>
<option value="20:30:00">8:30 PM</option>
<option value="20:45:00">8:45 PM</option>
 
<option value="21:00:00">9:00 PM</option>
<option value="21:15:00">9:15 PM</option>
<option value="21:30:00">9:30 PM</option>
<option value="21:45:00">9:45 PM</option>
 
<option value="22:00:00">10:00 PM</option>
<option value="22:15:00">10:15 PM</option>
<option value="22:30:00">10:30 PM</option>
<option value="22:45:00">10:45 PM</option>
 
<option value="23:00:00">11:00 PM</option>
<option value="23:15:00">11:15 PM</option>
<option value="23:30:00">11:30 PM</option>
<option value="23:45:00">11:45 PM</option>
</select> 
<input hidden id="startTime" name="startTime" value='document.getElementById("startTimeSelect").value;'/>

<script>
	var start = <?php echo '\'' . $startTime . '\''; ?>;
	var mySelect = document.getElementById("startTimeSelect");

	for(var i, j = 0; i = mySelect.options[j]; j++) {
		if(i.value == start) {
			mySelect.selectedIndex = j;
			break;
		}
	}
	
</script>

<br>
  <b><label>End Time:</label></b>
 <select name="endTimeSelect" id="endTimeSelect"  style="margin:5px;" class="endTime" readonly="readonly" onmousedown="if(this.options.length>5){this.size=5;}" disabled='true' onchange='this.size=0;' onblur="this.size=0;">
<option value="00:00:00">12:00 AM</option>
<option value="00:15:00">12:15 AM</option>
<option value="00:30:00">12:30 AM</option>
<option value="00:45:00">12:45 AM</option>

<option value="01:00:00">1:00 AM</option>
<option value="01:15:00">1:15 AM</option>
<option value="01:30:00">1:30 AM</option>
<option value="01:45:00">1:45 AM</option>

<option value="02:00:00">2:00 AM</option>
<option value="02:15:00">2:15 AM</option>
<option value="02:30:00">2:30 AM</option>
<option value="02:45:00">2:45 AM</option>

<option value="03:00:00">3:00 AM</option>
<option value="03:15:00">3:15 AM</option>
<option value="03:30:00">3:30 AM</option>
<option value="03:45:00">3:45 AM</option>

<option value="04:00:00">4:00 AM</option>
<option value="04:15:00">4:15 AM</option>
<option value="04:30:00">4:30 AM</option>
<option value="04:45:00">4:45 AM</option>

<option value="05:00:00">5:00 AM</option>
<option value="05:15:00">5:15 AM</option>
<option value="05:30:00">5:30 AM</option>
<option value="05:45:00">5:45 AM</option>
 
<option value="06:00:00">6:00 AM</option>
<option value="06:15:00">6:15 AM</option>
<option value="06:30:00">6:30 AM</option>
<option value="06:45:00">6:45 AM</option>
 
<option value="07:00:00">7:00 AM</option>
<option value="07:15:00">7:15 AM</option>
<option value="07:30:00">7:30 AM</option>
<option value="07:45:00">7:45 AM</option>
 
<option value="08:00:00">8:00 AM</option>
<option value="08:15:00">8:15 AM</option>
<option value="08:30:00">8:30 AM</option>
<option value="08:45:00">8:45 AM</option>
 
<option value="09:00:00">9:00 AM</option>
<option value="09:15:00">9:15 AM</option>
<option value="09:30:00">9:30 AM</option>
<option value="09:45:00">9:45 AM</option>
 
<option value="10:00:00">10:00 AM</option>
<option value="10:15:00">10:15 AM</option>
<option value="10:30:00">10:30 AM</option>
<option value="10:45:00">10:45 AM</option>
 
<option value="11:00:00">11:00 AM</option>
<option value="11:15:00">11:15 AM</option>
<option value="11:30:00">11:30 AM</option>
<option value="11:45:00">11:45 AM</option>
 
<option value="12:00:00">12:00 PM</option>
<option value="12:15:00">12:15 PM</option>
<option value="12:30:00">12:30 PM</option>
<option value="12:45:00">12:45 PM</option>
 
<option value="13:00:00">1:00 PM</option>
<option value="13:15:00">1:15 PM</option>
<option value="13:30:00">1:30 PM</option>
<option value="13:45:00">1:45 PM</option>
 
<option value="14:00:00">2:00 PM</option>
<option value="14:15:00">2:15 PM</option>
<option value="14:30:00">2:30 PM</option>
<option value="14:45:00">2:45 PM</option>
 
<option value="15:00:00">3:00 PM</option>
<option value="15:15:00">3:15 PM</option>
<option value="15:30:00">3:30 PM</option>
<option value="15:45:00">3:45 PM</option>
 
<option value="16:00:00">4:00 PM</option>
<option value="16:15:00">4:15 PM</option>
<option value="16:30:00">4:30 PM</option>
<option value="16:45:00">4:45 PM</option>
 
<option value="17:00:00">5:00 PM</option>
<option value="17:15:00">5:15 PM</option>
<option value="17:30:00">5:30 PM</option>
<option value="17:45:00">5:45 PM</option>
 
<option value="18:00:00">6:00 PM</option>
<option value="18:15:00">6:15 PM</option>
<option value="18:30:00">6:30 PM</option>
<option value="18:45:00">6:45 PM</option>
 
<option value="19:00:00">7:00 PM</option>
<option value="19:15:00">7:15 PM</option>
<option value="19:30:00">7:30 PM</option>
<option value="19:45:00">7:45 PM</option>
 
<option value="20:00:00">8:00 PM</option>
<option value="20:15:00">8:15 PM</option>
<option value="20:30:00">8:30 PM</option>
<option value="20:45:00">8:45 PM</option>
 
<option value="21:00:00">9:00 PM</option>
<option value="21:15:00">9:15 PM</option>
<option value="21:30:00">9:30 PM</option>
<option value="21:45:00">9:45 PM</option>
 
<option value="22:00:00">10:00 PM</option>
<option value="22:15:00">10:15 PM</option>
<option value="22:30:00">10:30 PM</option>
<option value="22:45:00">10:45 PM</option>
 
<option value="23:00:00">11:00 PM</option>
<option value="23:15:00">11:15 PM</option>
<option value="23:30:00">11:30 PM</option>
<option value="23:45:00">11:45 PM</option>
</select>
<input hidden id="endTime" name="endTime" value='document.getElementById("endTimeSelect").value;'/>

<script>
	var end = <?php echo '\'' . $endTime . '\''; ?>;
	var mySelect = document.getElementById("endTimeSelect");

	for(var i, j = 0; i = mySelect.options[j]; j++) {
		if(i.value == end) {
			mySelect.selectedIndex = j;
			break;
		}
	}
</script>

  <br><b><label>Cost:</label></b>
  <input type="text" id="eventCost" name="cost"  style="margin:5px;" readonly value=""></input><br>
  
	<b><label>Age:</label></b>
  	<select name="age" id="age" class="age" disabled readonly="readonly"  style="margin:5px;">
		<option value="All">All</option>
		<option value="18">18+</option>
		<option value="21">21+</option>
	</select>
	
<script>
	var age = <?php echo '\'' . $age . '\''; ?>;
	var mySelect = document.getElementById("age");

	for(var i, j = 0; i = mySelect.options[j]; j++) {
		if(i.value == age) {
			mySelect.selectedIndex = j;
			break;
		}
	}
</script>
	
    <br>
	
	<b><div id="setPreferences" style="">Set Prefrences</div></b>
	<div id="prefDiv" style=" font-size: 12px; padding: 2%; diplay:inline-block;">		
        <div style="display: inline-block; float:left; text-align:left">
		<input  id="preference1" style="color:#000000" type="checkbox"  value="1" readonly name="eventPreferences[]"> Music
		</input></br>
		<input  id="preference2" type="checkbox" value="2" readonly name="eventPreferences[]"> Food & Drinks
		</input></br>
		<input  id="preference3" type="checkbox" value="3" readonly name="eventPreferences[]"> Sporting Events
		</input></br>
		<input id="preference4" type="checkbox" value="4" readonly name="eventPreferences[]"> Outdoor
		</input></br>
		<input d="preference5" type="checkbox" value="5" readonly name="eventPreferences[]"> Health & Fitness
        </input></br>
		</div>
		<div style="display:inline-block'; float:left; text-align:left;">

		<input id="preference6" type="checkbox" value="6" readonly name="eventPreferences[]"> Family Friendly
        </input></br>
		<input id="preference7" type="checkbox" value="7" readonly name="eventPreferences[]"> Retail
        </input></br>
        <input id="preference8" type="checkbox" value="8" readonly name="eventPreferences[]"> Charity/Philanthropy
        </input></br>
		<input id="preference9" type="checkbox" value="9" readonly name="eventPreferences[]"> Entertainment
        </input></br>
		</div>
	</div>
<!--	
	  <script language="javascript">
// disable all the options that are not in use:
$("#age").not(":selected").attr("disabled", "disabled");
$("#startTime").not(":selected").attr("disabled", "disabled");
$("#endTime").not(":selected").attr("disabled", "disabled");
</script>
-->	
	
  </div><!--end left-->
  
    
    
	<!--start center -->
	<div id="center" name="center" style="display: inline-block; text-align:center; height:inherit; width:inherit; min-width:275px; max-width:29%;padding-left:2%;  vertical-align: middle; padding-right:2%;  margin: 0px; ">
	<b><label>Event Description</label></b></br><textarea   id="eventDescForm" readonly name="eventDescription" style="height:auto; max-height:275px; width:100%; resize:none; " rows="15" columns="70" value=""></textarea>
<br>	
<br>

	  <b><label>Location:</label></b>
  <input type="text" style="pointer-events:none;" id="pac-input" name="eventLocation" readonly value="<?php echo $location; ?>"></input><br>
	
	
	  <!--HIDDEN Long/Lat Div-->
	<div style="display:none;">
		<input type="text" name="lat" id="lat" class="lat" value="<?php echo $lat; ?>">
		<input type="text" name="long" id="long" class="lat" value="<?php echo $long; ?>">
	</div>
  
	<br>
      <!--map div-->
  	<div id="map"></div>
	
		<script>
    // People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.
    var markers = [];
	  
    function initAutocomplete() {
        window.map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 38.5816, lng: -121.4944},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });
		
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
		  var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }
			
          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
		  
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
			
            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
			
			console.log("init" + document.getElementById('lat').value);
			//declare lat and long variables
			document.getElementById('lat').value = place.geometry.location.lat();
        	document.getElementById('long').value = place.geometry.location.lng();
			console.log("init post" + document.getElementById('lat').value);
			
          });
          map.fitBounds(bounds);
        });
		
		var geocoder = new google.maps.Geocoder();
		geocodeCoord(geocoder, map);
	}
	  
	function geocodeAddress(geocoder, resultsMap) {
		var address = document.getElementById('pac-input').value;
		console.log(address);
		geocoder.geocode({'address': address}, function(results, status) {
			if (status === 'OK') {
				var bounds = new google.maps.LatLngBounds();
				// Clear out the old markers.
				markers.forEach(function(marker) {
					marker.setMap(null);
				});
				markers = [];
		
				// Set new bounds for the newly inputted place
				if (results[0].geometry.viewport) {
				  // Only geocodes have viewport.
				  bounds.union(results[0].geometry.viewport);
				} else {
				  bounds.extend(results[0].geometry.location);
				}
				
				// Create new marker for the input location
				resultsMap.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: resultsMap,
					position: results[0].geometry.location
				});
				markers.push(marker);
				
				console.log("geo" + document.getElementById('lat').value);
					
				// update latitude and longitude fields
				document.getElementById('lat').value  = results[0].geometry.location.lat();
				document.getElementById('long').value = results[0].geometry.location.lng();
				
				console.log("geopost" + document.getElementById('lat').value);
				
				map.fitBounds(bounds);
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}
		});
	}
	  
	function geocodeCoord(geocoder, resultsMap) {
		var nLat = parseFloat(document.getElementById('lat').value);
		var nLong = parseFloat(document.getElementById('long').value);
		var latlng = {lat: nLat, lng: nLong};
		
		geocoder.geocode({'location': latlng}, function(results, status) {
			if (status === 'OK') {
				if (results[1]) {
					var bounds = new google.maps.LatLngBounds();
					// Clear out the old markers.
					markers.forEach(function(marker) {
						marker.setMap(null);
					});
					markers = [];
					
					// Set new bounds for the newly inputted place
					if (results[1].geometry.viewport) {
					  // Only geocodes have viewport.
					  bounds.union(results[1].geometry.viewport);
					} else {
					  bounds.extend(results[1].geometry.location);
					}
					
					resultsMap.setCenter(results[0].geometry.location);
					var marker = new google.maps.Marker({
						position: latlng,
						map: resultsMap
					})
					markers.push(marker);
					
					} else {
						window.alert('No results found');
					}  
					
					map.fitBounds(bounds);
			} else {
				window.alert('Geocoder failed due to: ' + status);
			 }
		});
	}
    </script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkAik0mFJzy4vTrOP4IyfIGcO6vdX1odY&libraries=places&callback=initAutocomplete"></script>


	</div>
<!--end Center-->
  
<!--start right-->

  <div id="right" name="right"  style="display: inline-block; padding-top:2%; height:inherit; width:inherit; min-width:275px; max-width:29%; padding-left:4%;padding-right:2%; text-align:center; margin:0px;  vertical-align: middle;">

 <img id="imageFile" src="http://athena.ecs.csus.edu/~teamone/events/logo.jpg" alt="your image" style="height:300px; width:300px;" /><br>
 <input type="file" id="fileToUpload" name="fileToUpload" class="hiddnInputFile" onchange="readURL(this);" />
 <label for="fileToUpload" class="revInButton" >Upload Pic</label>
 
 <script>
 
 function readURL(input) {
	if (input.files && input.files[0] && input.files[0].size < 800000) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#imageFile')
				.attr('src', e.target.result)
				.height(300);
		};

		reader.readAsDataURL(input.files[0]);
	} else {
		alert("Image too large!");
		document.getElementById("fileToUpload").value = null;
		$('#imageFile')
				.attr('src', "http://athena.ecs.csus.edu/~teamone/images/logo.jpg")
				.height(300);
	}
 }
</script>

 
  <div  id="buttonDivGo" name="buttonDivGo"  class="buttonDivGo">
 
  <input type="button" id="editButton" class="revButton"  onclick="toggleTextbox('F')" value="Edit" ></input>
  
  <input onclick="return checkFields();" type="submit" name="publishButton" id="publishButton" class="revButton"  value="Publish" ></input>

<input type="button" id="revButton" name="revButton" class="revButton" value="cancel" onclick="cancelConfirm()"></input>  
  </div>
  
  </div><!--end right div-->
  </div><!--end info div-->
</form>
<!--hamburger menu-->
<script>
	function checkFields() {
		var eventName = document.getElementById("eventNameForm").value;
		var eventSpon = document.getElementById("eventSponsorForm").value;
		var eventDesc = document.getElementById("eventDescForm").value;
		var eventLoc  = document.getElementById("pac-input").value;
		var startDate = document.getElementById("datepicker").value;
		var cost	  = document.getElementById("eventCost").value;
		var age		  = document.getElementById("age").value;
		var lat		  = document.getElementById("lat").value;
		var lng		  = document.getElementById("long").value;

		var retFalse = false;
		
		var eventPhone= document.getElementById("eventPhone").value;
		
		if (eventPhone != null && eventPhone != "") {
			var isnum = /^[0-9]+$/.test(eventPhone);
			if (isnum) {
				if (eventPhone.length != 10 && eventPhone.length != 0) {
					document.getElementById("eventPhone").style.borderColor = "red";
					retFalse = true;
				} else {
					document.getElementById("eventPhone").style.removeProperty("border");
				}
			} else {
				document.getElementById("eventPhone").style.borderColor = "red";
				retFalse = true;
			}
		} else {
			document.getElementById("eventPhone").style.removeProperty("border");
		}
		
		// Check if event name is set
		if (eventName == null || eventName == "") {
			document.getElementById("eventNameForm").style.borderColor = "red";
			retFalse = true;
		} else {
			document.getElementById("eventNameForm").style.removeProperty("border");
		}
		
		// check if event sponsor is set
		if (eventSpon == null || eventSpon == "") {
			document.getElementById("eventSponsorForm").style.borderColor = "red";
			retFalse = true;
		} else {
			document.getElementById("eventSponsorForm").style.removeProperty("border");
		}
		
		// check if event location is set
		if (eventLoc == null || eventLoc == "") {
			document.getElementById("pac-input").style.borderColor = "red";
			retFalse = true;
		} else {
			geocodeAddress(new google.maps.Geocoder(), map);
			document.getElementById("pac-input").style.removeProperty("border");
		}
		
		// check if event description is set
		if (eventDesc == null || eventDesc == "") {
			document.getElementById("eventDescForm").style.borderColor = "red";
			retFalse = true;
		} else {
			document.getElementById("eventDescForm").style.removeProperty("border");
		}
		
		// check if start date is set
		if (startDate == null || startDate == "") {
			document.getElementById("datepicker").style.borderColor = "red";
			retFalse = true;
		} else {
			document.getElementById("datepicker").style.removeProperty("border");
		}
		
		// check if start time is set
		if (startTime == "default") {
			document.getElementById("startTime").options[0].innerHTML = "*Start Time";
			retFalse = true;
		}
		
		// check if cost is set
		if (cost == null || cost == "" || isNaN(cost)) {
			document.getElementById("eventCost").style.borderColor = "red";
			retFalse = true;
		} else {
			document.getElementById("eventCost").style.removeProperty("border");
		}
		
		// check if age is set
		if (age == "selectAge") {
			document.getElementById("age").options[0].style.color = "red"; 
			document.getElementById("age").options[0].innerHTML = "*Select Age";
			retFalse = true;
		}
		
		var prefNull = true;
		for (var i=1; i<=9; i++) {
			var id = "preference" + i;
			var pref	  = document.getElementById(id).checked;
			if (pref)
				prefNull = false;
		}
		
		if (prefNull) {
			document.getElementById("setPreferences").style.color = "red";
			document.getElementById("setPreferences").innerHTML = "*Set Preferences";
			retFalse = true;
		} else {
			document.getElementById("setPreferences").style.color = "rgba(255,255,255,1.00)";
			document.getElementById("setPreferences").innerHTML = "Set Preferences";
		}

		if (retFalse) return false;
		else { 
			for (var i=1; i<=9; i++) {
				if (document.getElementById("preference" + i).checked == true)
					document.getElementById("preference" + i).disabled=false;
			}
			
			return true;
		}
	}

		(function () {
		
		    // Create mobile element
		    var mobile = document.createElement('div');
		    mobile.className = 'nav-mobile';
		    document.querySelector('.nav').appendChild(mobile);
		
		    // hasClass
		    function hasClass(elem, className) {
		        return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
		    }
		
		    // toggleClass
		    function toggleClass(elem, className) {
		        var newClass = ' ' + elem.className.replace(/[\t\r\n]/g, ' ') + ' ';
		        if (hasClass(elem, className)) {
		            while (newClass.indexOf(' ' + className + ' ') >= 0) {
		                newClass = newClass.replace(' ' + className + ' ', ' ');
		            }
		            elem.className = newClass.replace(/^\s+|\s+$/g, '');
		        } else {
		            elem.className += ' ' + className;
		        }
		    }
		
		    // Mobile nav function
		    var mobileNav = document.querySelector('.nav-mobile');
		    var toggle = document.querySelector('.nav-list');
		    mobileNav.onclick = function () {
		        toggleClass(this, 'nav-mobile-open');
		        toggleClass(toggle, 'nav-active');
		    };
		});
</script>

</div><!-- end hero div-->
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
</div><!--end body div-->
</body>
</html>