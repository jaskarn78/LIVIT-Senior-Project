<?php
	session_start();
	include_once ('../php/check_login.php');
	if ($_SESSION['privelege_id'] != 0)
		header('Location: https://athena.ecs.csus.edu/~teamone/Manage');
	else
		$name = $_SESSION['user_name'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Events</title>
<link rel="icon" href="http://athena.ecs.csus.edu/~teamone/images/favicon.png" type="image/png" />
<link rel="shortcut icon"  href="http://athena.ecs.csus.edu/~teamone/images/favicon.png" type="image/png"/>
<link rel="stylesheet" type="text/css" href="http://athena.ecs.csus.edu/~teamone/css/singlePageTemplate.css"/>
<!--<link rel="stylesheet" type="text/css" href="http://athena.ecs.csus.edu/~teamone/css/realStyle.css"/>-->
<link rel="stylesheet" type="text/css" href="http://athena.ecs.csus.edu/~teamone/css/listStyle.css"/>
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
		var url = "http://athena.ecs.csus.edu/~teamone/Manage/php/all_events_table.php?";
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

<script>
var removeArray = [];

function addChecked(removeId, eventId, imgPath) {
	if (document.getElementById(removeId).checked) {
		console.log (eventId, imgPath);
		console.log (removeArray.push([eventId, imgPath]));
	} else {
		var ind = removeArray.indexOf(eventId);
		if (ind != -1) {
			removeArray.splice(ind, 1);
		}
	}
}

function removeChecked() {
		var xmlhttp = new XMLHttpRequest({mozSystem: true});
		var url = "http://athena.ecs.csus.edu/~teamone/Manage/php/remove_checked_events.php";
		var arr = JSON.stringify(removeArray);
		var data = "jsondata=" + arr;
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				console.log(xmlhttp.responseText);
				location.reload();
			}
		};
		
		xmlhttp.open("POST", url, true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.send(data);
}

</script>

<script>
function deleteConfirm() {
    var x;
    if (confirm("Are you sure you wan't to remove these events?") == true) {
		removeChecked();
    } else {
        x = "";
    }
    //document.getElementById("demo").innerHTML = x;
}
</script>

</head>

<body>
<div class="container" style="width:100%; margin:0px; padding:0px;">
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


<!-- Good Old Header
<a href="">
<h4 class="logo">LIV</h4>
</a>
<nav>
	<ul>
        <li><a href="http://athena.ecs.csus.edu/~teamone/">HOME</a></li>
        <li> <a href="http://athena.ecs.csus.edu/~teamone/About/about.php">ABOUT</a></li>
        <li> <a href="http://athena.ecs.csus.edu/~teamone/Contact/contact.php">CONTACT</a></li>
    
	</ul>
</nav>
End Old Good Header-->

</header>
  	<div class="manageHero">
    <div class="listhead">    	
	<nav2 id="nav2" class="nav2">
    <ul style="margin:auto;">
		<form id="eventHeaderForm" name="eventHeaderForm">
			<li><label name="userName" id="userName" style="color: #fab9ff;" ><?php echo $name; ?></label></li>
			<li><label style="width:auto; color: #fab9ff; " name="eventName" id="eventName">Event Name:</label></li>
			<li><input style="width:auto; background-color: #fab9ff; border-color: #fab9ff;" name="searchEventName" id="searchEventName" type="text" onkeyup="setEventName(this.value)"></input></li>
			<li><label style="width:auto; color: #fab9ff;" name="date" id="date">Date:</label></li>
			<li><input style="width:auto; background-color: #fab9ff; border-color: #fab9ff;" name="searchEventDate" id="searchEventDate" type="text" onkeyup="setEventDate(this.value)"></input></li>
			<li><label style="width:auto; color: #fab9ff;" name="sponsor" id="sponsor">Sponsor:</label></li>
			<li><input style="width:auto; background-color: #fab9ff; border-color: #fab9ff;" name="searchEventSponsor" id ="searchEventSponsor" type="text" onkeyup="setEventSponsor(this.value)"></input></li>
			<li><button style="width:auto; padding-left:inherit; padding-right:inherit; height:90%; color: #fab9ff; background-color: #222222; border-color:#fab9ff;" onclick="deleteConfirm()" id="removeSelected" type="button" name="removeSelected">Remove Selected</button></li>
        </form>
 	</ul>
	</nav2>
	</div><!-- end list head-->

  	</div><!-- end list body -->
	<div name="listBody" id="listBody" class="listBody">
	</div><!-- end list body -->
	<script> showList(); </script>
	</div><!-- end hero-->
	
	<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
</div><!--end container</label>-->
</body>
</html>