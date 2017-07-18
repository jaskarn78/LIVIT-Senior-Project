<?php
	error_reporting(E_ALL & E_NOTICE);
	ini_set('display_errors', 1);
	include_once ('php/init_facebook_php_sdk.php');
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage LivIT Events</title>
<link href="css/realStyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/listStyle.css">
<script>
	var event_name = "";
	var event_sponsor = "";
	var event_date = "";
	
	var search = "";
	
	function setValues(name, sponsor) {
		event_name = name;
		event_sponsor = sponsor;
		showList();
	}
	
	function setEventName(str) {
		event_name = str;
		showList();
	}
	
	function setEventSponsor(str) {
		event_sponsor = str;
		showList();
	}
	
	function setEventDate(str) {
		event_date = str;
		showList();
	}	
	
	function showList()
	{
		var xmlhttp = new XMLHttpRequest({mozSystem: true});
		var url = "http://athena.ecs.csus.edu/~teamone/php/all_events_table.php?";
		var getUrl = "event_name=" + event_name + "&event_sponsor=" + event_sponsor + "&start_date=" + event_date;
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("listBody").innerHTML = xmlhttp.responseText;
			}
		};
		
		xmlhttp.open("GET", url + getUrl, true);
		xmlhttp.send();
	}
</script>
</head>

<body>
<div class="container">
<header>
<a href="">
<h4 class="logo">LIV</h4>
</a>
<nav>
	<ul>
        <li><a href="index.php">HOME</a></li>
        <li> <a href="about.php">ABOUT</a></li>
        <li> <a href="contact.php">CONTACT</a></li>
		<li> <a href="manage.php">MANAGE</a></li>
        <?php
          if (isset($_SESSION['facebook_access_token'])) {
             echo '<li> <a href="profile.php">PROFILE</a></li>';
             echo '<li><a href="php/logout.php">LOGOUT</a></li>';
          } else {
             echo '<li><a href="php/login.php">LOG IN</a></li>';
          }
        ?>
	</ul>
</nav>
</header>
  	<div class="manageHero">
    <div class="listhead">    	
	<nav2 id="nav2">
    <ul>
       	<li><label style="width:auto;" name="userName" id="userName" >Joey Lazoya</label></li>
		<form id="eventHeaderForm" name="eventHeaderForm">
			<li><label style="width:auto;" name="eventName" id="eventName">Event Name:</label></li>
			<li><input style="width:auto;" name="searchEventName" id="searchEventName" type="text" onkeyup="setEventName(this.value)"></input></li>
			<li><label style="width:auto;" name="date" id="date">Date:</label></li>
			<li><input style="width:auto;" name="searchEventDate" id="searchEventDate" type="text"></input></li>
			<li><label style="width:auto;" name="sponsor" id="sponsor">Sponsor:</label></li>
			<li><input style="width:auto;" name="searchEventSponsor" id ="searchEventSponsor" type="text" onkeyup="setEventSponsor(this.value)"></input></li>
			<li><button style="width:auto; padding-left:inherit; padding-right:inherit;height:90%;" 
				id="search" name="search" type="Search" onsubmit="setValues(searchEventName, searchEventSponsor)">Search</button></li>
			<li><button style="width:auto; padding-left:inherit; padding-right:inherit; height:90%;" id="removeSelected" type="button" name="removeSelected">Remove Selected</button></li>
        </form>
 	</ul>
	</nav2>
	</div><!-- end list head-->

  	</div><!-- end list body -->
	<div name="listBody" id="listBody" class="listBody">
	</div><!-- end list body -->
	<script> showList(); </script>
	</div><!-- end hero-->
</div><!--end container--></label>
</body>
</html>