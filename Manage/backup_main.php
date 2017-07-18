<?php
	session_start();
	include_once ('../php/check_login.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="http://athena.ecs.csus.edu/~teamone/js/jquery.js"></script>
<script type="text/javascript" src="http://athena.ecs.csus.edu/~teamone/js/jquery-ui.js"></script> 

<link href="http://athena.ecs.csus.edu/~teamone/css/realStyle.css" rel="stylesheet" type="text/css">
<link href="http://athena.ecs.csus.edu/~teamone/css/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="http://athena.ecs.csus.edu/~teamone/css/coolStyle.css" rel="stylesheet" type="text/css">
<link href="http://athena.ecs.csus.edu/~teamone/css/listStyle.css" rel="stylesheet" type="text/css">
<title>Event Creation</title>

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
	function fillForms(name, desc, loc, date, shour, smin, pic) {
		name = name.replace(/%s/g, "\'");
		name = name.replace(/%q/g, "\"");
		desc = desc.replace(/%s/g, "\'");
		desc = desc.replace(/%q/g, "\"");
		loc = loc.replace(/%s/g, "\'");
		loc = loc.replace(/%q/g, "\"");
		
		document.getElementById("eventNameForm").value = name;
		document.getElementById("eventDescForm").innerHTML = desc;
		document.getElementById("pac-input").value = loc;
		document.getElementById("datepicker").value = date;
		
		var morning = shour/12;
		var hour    = shour%12;
		var min     = smin/15;
		
		if (hour != -1) {
			switch(hour) {
				case 0:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '12:00 AM';
						if (min == 1)
							document.getElementById("startTime").value = '12:15 AM';
						if (min == 2)
							document.getElementById("startTime").value = '12:30 AM';
						if (min == 3)
							document.getElementById("startTime").value = '12:45 AM';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '12:00 PM';
						if (min == 1)
							document.getElementById("startTime").value = '12:15 PM';
						if (min == 2)
							document.getElementById("startTime").value = '12:30 PM';
						if (min == 3)
							document.getElementById("startTime").value = '12:45 PM';
					}
					break;
				case 1:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '1:00 AM';
						if (min == 1)
							document.getElementById("startTime").value = '1:15 AM';
						if (min == 2)
							document.getElementById("startTime").value = '1:30 AM';
						if (min == 3)
							document.getElementById("startTime").value = '1:45 AM';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '1:00 PM';
						if (min == 1)
							document.getElementById("startTime").value = '1:15 PM';
						if (min == 2)
							document.getElementById("startTime").value = '1:30 PM';
						if (min == 3)
							document.getElementById("startTime").value = '1:45 PM';
					}
					break;
				case 2:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '2:00 AM';
						if (min == 1)
							document.getElementById("startTime").value = '2:15 AM';
						if (min == 2)
							document.getElementById("startTime").value = '2:30 AM';
						if (min == 3)
							document.getElementById("startTime").value = '2:45 AM';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '2:00 PM';
						if (min == 1)
							document.getElementById("startTime").value = '2:15 PM';
						if (min == 2)
							document.getElementById("startTime").value = '2:30 PM';
						if (min == 3)
							document.getElementById("startTime").value = '2:45 PM';
					}
					break;
				case 3:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '3:00 AM';
						if (min == 1)
							document.getElementById("startTime").value = '3:15 AM';
						if (min == 2)
							document.getElementById("startTime").value = '3:30 AM';
						if (min == 3)
							document.getElementById("startTime").value = '3:45 AM';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '3:00 PM';
						if (min == 1)
							document.getElementById("startTime").value = '3:15 PM';
						if (min == 2)
							document.getElementById("startTime").value = '3:30 PM';
						if (min == 3)
							document.getElementById("startTime").value = '3:45 PM';
					}
					break;
				case 4:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '4:00 AM';
						if (min == 1)
							document.getElementById("startTime").value = '4:15 AM';
						if (min == 2)
							document.getElementById("startTime").value = '4:30 AM';
						if (min == 3)
							document.getElementById("startTime").value = '4:45 AM';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '4:00 PM';
						if (min == 1)
							document.getElementById("startTime").value = '4:15 PM';
						if (min == 2)
							document.getElementById("startTime").value = '4:30 PM';
						if (min == 3)
							document.getElementById("startTime").value = '4:45 PM';
					}
					break;
				case 5:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '5:00 AM';
						if (min == 1)
							document.getElementById("startTime").value = '5:15 AM';
						if (min == 2)
							document.getElementById("startTime").value = '5:30 AM';
						if (min == 3)
							document.getElementById("startTime").value = '5:45 AM';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '5:00 PM';
						if (min == 1)
							document.getElementById("startTime").value = '5:15 PM';
						if (min == 2)
							document.getElementById("startTime").value = '5:30 PM';
						if (min == 3)
							document.getElementById("startTime").value = '5:45 PM';
					}
					break;
				case 6:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '6:00 AM';
						if (min == 1)
							document.getElementById("startTime").value = '6:15 AM';
						if (min == 2)
							document.getElementById("startTime").value = '6:30 AM';
						if (min == 3)
							document.getElementById("startTime").value = '6:45 AM';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '6:00 PM';
						if (min == 1)
							document.getElementById("startTime").value = '6:15 PM';
						if (min == 2)
							document.getElementById("startTime").value = '6:30 PM';
						if (min == 3)
							document.getElementById("startTime").value = '6:45 PM';
					}
					break;
				case 7:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '7:00 AM';
						if (min == 1)
							document.getElementById("startTime").value = '7:15 AM';
						if (min == 2)
							document.getElementById("startTime").value = '7:30 AM';
						if (min == 3)
							document.getElementById("startTime").value = '7:45 AM';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '7:00 PM';
						if (min == 1)
							document.getElementById("startTime").value = '7:15 PM';
						if (min == 2)
							document.getElementById("startTime").value = '7:30 PM';
						if (min == 3)
							document.getElementById("startTime").value = '7:45 PM';
					}
					break;
				case 8:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '8:00 AM';
						if (min == 1)
							document.getElementById("startTime").value = '8:15 AM';
						if (min == 2)
							document.getElementById("startTime").value = '8:30 AM';
						if (min == 3)
							document.getElementById("startTime").value = '8:45 AM';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '8:00 PM';
						if (min == 1)
							document.getElementById("startTime").value = '8:15 PM';
						if (min == 2)
							document.getElementById("startTime").value = '8:30 PM';
						if (min == 3)
							document.getElementById("startTime").value = '8:45 PM';
					}
					break;
				case 9:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '9:00 AM';
						if (min == 1)
							document.getElementById("startTime").value = '9:15 AM';
						if (min == 2)
							document.getElementById("startTime").value = '9:30 AM';
						if (min == 3)
							document.getElementById("startTime").value = '9:45 AM';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '9:00 PM';
						if (min == 1)
							document.getElementById("startTime").value = '9:15 PM';
						if (min == 2)
							document.getElementById("startTime").value = '9:30 PM';
						if (min == 3)
							document.getElementById("startTime").value = '9:45 PM';
					}
					break;
				case 10:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '10:00 AM';
						if (min == 1)
							document.getElementById("startTime").value = '10:15 AM';
						if (min == 2)
							document.getElementById("startTime").value = '10:30 AM';
						if (min == 3)
							document.getElementById("startTime").value = '10:45 AM';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '10:00 PM';
						if (min == 1)
							document.getElementById("startTime").value = '10:15 PM';
						if (min == 2)
							document.getElementById("startTime").value = '10:30 PM';
						if (min == 3)
							document.getElementById("startTime").value = '10:45 PM';
					}
					break;
				case 11:
					if (morning == 0) {
						if (min == 0)
							document.getElementById("startTime").value = '11:00 AM';
						if (min == 1)
							document.getElementById("startTime").value = '11:15 AM';
						if (min == 2)
							document.getElementById("startTime").value = '11:30 AM';
						if (min == 3)
							document.getElementById("startTime").value = '11:45 AM';
					} else {
						if (min == 0)
							document.getElementById("startTime").value = '11:00 PM';
						if (min == 1)
							document.getElementById("startTime").value = '11:15 PM';
						if (min == 2)
							document.getElementById("startTime").value = '11:30 PM';
						if (min == 3)
							document.getElementById("startTime").value = '11:45 PM';
					}
					break;
			}
		}
	}
</script>

<script>
	$(function(){
		var fileInput = $('.upload-file');
		var maxSize = fileInput.data('max-size');
		$('.upload-form').submit(function(e){
			if(fileInput.get(0).files.length){
				var fileSize = fileInput.get(0).files[0].size; // in bytes
				if(fileSize>maxSize){
					alert('file size is more then' + maxSize + ' bytes');
					return false;
				}else{
					alert('file size is correct- ' + fileSize + ' bytes');
				}
			}else{
				alert('choose file, please');
				return false;
			}
		});
	});
</script>

<script>
	function pickOption(sel) {
		if (sel.options[sel.selectedIndex].value == "facebook") {
			showFacebookList();
		} else if (sel.options[sel.selectedIndex].value == "google") {
			showGoogleList();
		} else {
			showFacebookList();
		}
	}
	
	function showLists() {
		showGoogleList();
		showFacebookList();
	}

	function showGoogleList() {
		document.getElementById("thirdPartyPullListDiv").innerHTML = "";
	}
	
	function showFacebookList()
	{
		var xmlhttp = new XMLHttpRequest({mozSystem: true});
		var url = "http://athena.ecs.csus.edu/~teamone/Manage/php/event_main_facebook_list.php";
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("thirdPartyPullListDiv").innerHTML = xmlhttp.responseText;
			}
		};
		
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
	
	function insertEvent()
	{
		var xmlhttp = new XMLHttpRequest({mozSystem: true});
		var url = "http://athena.ecs.csus.edu/~teamone/Manage/php/event_push.php";
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("thirdPartyPullListDiv").innerHTML = xmlhttp.responseText;
			}
		};
		
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
</script>


<style>
 #map {
		z-index:8;
        height: 100%;
		width: 100%;
		margin:0px;
      }
	  
	  #holder { border: 2px dashed #e8e8e8; width: 98%; height:auto; min-height: 100px; max-height: 200px; overflow-y:auto; margin-bottom: 4px; text-align: center; line-height:350%;}
	  #holder.hover { border: 2px dashed #000000; }
	  #holder img { display: block; margin: 10px auto; height:inherit; }
	  #holder p { margin: 2px; font-size: 10px; }
	  .progress { width: 100%; }
	  .progress:after { content: '%'; }
	  .fail { background: #c00; padding: 2px; color: #fff; }
	  .hidden { display: none !important;}

</style>

<script>
$(document).ready(function() {
// Datepicker Popups calender to Choose date.
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
	$(function() {
		$("#datepicker").datepicker();
		// Pass the user selected date format.
		$("#format").change(function() {
			$("#datepicker").datepicker("option", "dateFormat", $(this).val());
		});
	});
});
</script>
 
 
<script>
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
</script>	
	
<script>
	$("input").change(function(e) {
		for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
			
			var file = e.originalEvent.srcElement.files[i];
			
			var img = document.createElement("img");
			var reader = new FileReader();
			reader.onloadend = function() {
				 img.src = reader.result;
			}
			reader.readAsDataURL(file);
			$("input").after(img);
		}
	});
</script>
</head>

<body onload="showLists();"><!-- main container-->

<div class = "container"> <!--main containter class-->
<header><!--Header start -->
<a href="">
<h4 class="logo">LIV</h4>
</a>
<nav>
	<ul>
		<li><a href="http://athena.ecs.csus.edu/~teamone/">HOME</a></li>
		<li> <a href="http://athena.ecs.csus.edu/~teamone/About/about.php">ABOUT</a></li>
		<li> <a href="http://athena.ecs.csus.edu/~teamone/Contact/contact.php">CONTACT</a></li>
	   <?php
		  if (isset($_SESSION['facebook_access_token'])) {
			 echo '<li> <a href="http://athena.ecs.csus.edu/~teamone/Manage/manage.php">MANAGE</a></li>';
			 echo '<li> <a href="http://athena.ecs.csus.edu/~teamone/Profile/profile.php">PROFILE</a></li>';
			 echo '<li><a href="http://athena.ecs.csus.edu/~teamone/php/login/logout.php">LOGOUT</a></li>';
		  } else {
			 echo '<li><a href="http://athena.ecs.csus.edu/~teamone/login_page.php">LOG IN</a></li>';
		  }
		?>
	</ul>
</nav> 
</header> <!-- Header end-->
<form action="http://athena.ecs.csus.edu/~teamone/Manage/event_review.php" method="POST" enctype="multipart/form-data"><!--Push Form-->
<div class= "herro" id="herro" style="width: 100%; height: 150%; position: absolute;"><!--Hero Class -->
    <!--floating Search Box-->
	<div><input name="eventlocation"; class="searchbox"; id="pac-input"; type="text" placeholder="Search" style="margin-top: 10px; border: 1px solid trasparent; height:30px; box-shadow: rgba(0,0,0,.289039) 0px 2px 6px; padding:0px 11px 0px 13px; width:313px; font-size:13px; font-weight: 300; z-index:10; position:absolute; left:121px; top:0px;"></input></div>
    <!--floating Search Box end-->
    
    <!--Right Floating Event Info Div-->
	<div style ="font-size: 12px; position: absolute; height:auto; border: 1px solid trasparent; color:rgba(255,255,255,1.00); top: 10px; margin-bottom:inherit; right: 10px; width: auto; z-index: 10; padding: 7px; border-radius: 2px; background: rgba(255,153,255,1.00 );">
		
	<div style="margin-bottom: 4px; font-size: 10px;"><input type ="text" placeholder="Event Name" name="eventname" id="eventNameForm" style="padding:7px; width:92%"></input>
	</div>
		
	<div style="margin-bottom:4px; font-size: 10px; "><input type = "text" placeholder = "Event Sponsor" id="eventSponsorForm" name="eventsponsor" style = "padding:7px;  width: 92%;"></input>
	</div>
	
	<div style="margin-bottom:4px; font-size: 10px; "><input type = "text" placeholder = "Event Website" id="eventWebsite" name="eventWebsite" style = "padding:7px;  width: 92%;"></input>
	</div>
	
	<div style="font-size:12px;"><input type="text" id="datepicker" placeholder="Start Date" name="datepicker" style="padding: 4px; margin-bottom: 4px; width:95%;"></input></div>
        
    <div style="font-size:12px;"><input type="text" id="datepicker2" placeholder=" End Date" name="datepicker2" style="padding: 4px; margin-bottom: 4px; width:95%;"></input></div>
 	
<select name="startTime" id="startTime" class="startTime" style="width:100%; margin-bottom:4px; padding:4px" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;">
<option style="text-align: right;" selected disabled>Start Time</option>
<option value="12:00 AM">12:00 AM</option>
<option value="12:15 AM">12:15 AM</option>
<option value="12:30 AM">12:30 AM</option>
<option value="12:45 AM">12:45 AM</option>

<option value="1:00 AM">1:00 AM</option>
<option value="1:15 AM">1:15 AM</option>
<option value="1:30 AM">1:30 AM</option>
<option value="1:45 AM">1:45 AM</option>

<option value="2:00 AM">2:00 AM</option>
<option value="2:15 AM">2:15 AM</option>
<option value="2:30 AM">2:30 AM</option>
<option value="2:45 AM">2:45 AM</option>

<option value="3:00 AM">3:00 AM</option>
<option value="3:15 AM">3:15 AM</option>
<option value="3:30 AM">3:30 AM</option>
<option value="3:45 AM">3:45 AM</option>

<option value="4:00 AM">4:00 AM</option>
<option value="4:15 AM">4:15 AM</option>
<option value="4:30 AM">4:30 AM</option>
<option value="4:45 AM">4:45 AM</option>

<option value="5:00 AM">5:00 AM</option>
<option value="5:15 AM">5:15 AM</option>
<option value="5:30 AM">5:30 AM</option>
<option value="5:45 AM">5:45 AM</option>
 
<option value="6:00 AM">6:00 AM</option>
<option value="6:15 AM">6:15 AM</option>
<option value="6:30 AM">6:30 AM</option>
<option value="6:45 AM">6:45 AM</option>
 
<option value="7:00 AM">7:00 AM</option>
<option value="7:15 AM">7:15 AM</option>
<option value="7:30 AM">7:30 AM</option>
<option value="7:45 AM">7:45 AM</option>
 
<option value="8:00 AM">8:00 AM</option>
<option value="8:15 AM">8:15 AM</option>
<option value="8:30 AM">8:30 AM</option>
<option value="8:45 AM">8:45 AM</option>
 
<option value="9:00 AM">9:00 AM</option>
<option value="9:15 AM">9:15 AM</option>
<option value="9:30 AM">9:30 AM</option>
<option value="9:45 AM">9:45 AM</option>
 
<option value="10:00 AM">10:00 AM</option>
<option value="10:15 AM">10:15 AM</option>
<option value="10:30 AM">10:30 AM</option>
<option value="10:45 AM">10:45 AM</option>
 
<option value="11:00 AM">11:00 AM</option>
<option value="11:15 AM">11:15 AM</option>
<option value="11:30 AM">11:30 AM</option>
<option value="11:45 AM">11:45 AM</option>
 
<option value="12:00 PM">12:00 PM</option>
<option value="12:15 PM">12:15 PM</option>
<option value="12:30 PM">12:30 PM</option>
<option value="12:45 PM">12:45 PM</option>
 
<option value="1:00 PM">1:00 PM</option>
<option value="1:15 PM">1:15 PM</option>
<option value="1:30 PM">1:30 PM</option>
<option value="1:45 PM">1:45 PM</option>
 
<option value="2:00 PM">2:00 PM</option>
<option value="2:15 PM">2:15 PM</option>
<option value="2:30 PM">2:30 PM</option>
<option value="2:45 PM">2:45 PM</option>
 
<option value="3:00 PM">3:00 PM</option>
<option value="3:15 PM">3:15 PM</option>
<option value="3:30 PM">3:30 PM</option>
<option value="3:45 PM">3:45 PM</option>
 
<option value="4:00 PM">4:00 PM</option>
<option value="4:15 PM">4:15 PM</option>
<option value="4:30 PM">4:30 PM</option>
<option value="4:45 PM">4:45 PM</option>
 
<option value="5:00 PM">5:00 PM</option>
<option value="5:15 PM">5:15 PM</option>
<option value="5:30 PM">5:30 PM</option>
<option value="5:45 PM">5:45 PM</option>
 
<option value="6:00 PM">6:00 PM</option>
<option value="6:15 PM">6:15 PM</option>
<option value="6:30 PM">6:30 PM</option>
<option value="6:45 PM">6:45 PM</option>
 
<option value="7:00 PM">7:00 PM</option>
<option value="7:15 PM">7:15 PM</option>
<option value="7:30 PM">7:30 PM</option>
<option value="7:45 PM">7:45 PM</option>
 
<option value="8:00 PM">8:00 PM</option>
<option value="8:15 PM">8:15 PM</option>
<option value="8:30 PM">8:30 PM</option>
<option value="8:45 PM">8:45 PM</option>
 
<option value="9:00 PM">9:00 PM</option>
<option value="9:15 PM">9:15 PM</option>
<option value="9:30 PM">9:30 PM</option>
<option value="9:45 PM">9:45 PM</option>
 
<option value="10:00 PM">10:00 PM</option>
<option value="10:15 PM">10:15 PM</option>
<option value="10:30 PM">10:30 PM</option>
<option value="10:45 PM">10:45 PM</option>
 
<option value="11:00 PM">11:00 PM</option>
<option value="11:15 PM">11:15 PM</option>
<option value="11:30 PM">11:30 PM</option>
<option value="11:45 PM">11:45 PM</option>
</select>
	
<select name="endTime" id="endTime" class="endTime" style="width:100%; margin-bottom:4px; padding:4px;" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;">
<option style="text-align: right;" selected disabled>End Time</option>
<option value="12:00 AM">12:00 AM</option>
<option value="12:15 AM">12:15 AM</option>
<option value="12:30 AM">12:30 AM</option>
<option value="12:45 AM">12:45 AM</option>

<option value="1:00 AM">1:00 AM</option>
<option value="1:15 AM">1:15 AM</option>
<option value="1:30 AM">1:30 AM</option>
<option value="1:45 AM">1:45 AM</option>

<option value="2:00 AM">2:00 AM</option>
<option value="2:15 AM">2:15 AM</option>
<option value="2:30 AM">2:30 AM</option>
<option value="2:45 AM">2:45 AM</option>

<option value="3:00 AM">3:00 AM</option>
<option value="3:15 AM">3:15 AM</option>
<option value="3:30 AM">3:30 AM</option>
<option value="3:45 AM">3:45 AM</option>

<option value="4:00 AM">4:00 AM</option>
<option value="4:15 AM">4:15 AM</option>
<option value="4:30 AM">4:30 AM</option>
<option value="4:45 AM">4:45 AM</option>

<option value="5:00 AM">5:00 AM</option>
<option value="5:15 AM">5:15 AM</option>
<option value="5:30 AM">5:30 AM</option>
<option value="5:45 AM">5:45 AM</option>
 
<option value="6:00 AM">6:00 AM</option>
<option value="6:15 AM">6:15 AM</option>
<option value="6:30 AM">6:30 AM</option>
<option value="6:45 AM">6:45 AM</option>
 
<option value="7:00 AM">7:00 AM</option>
<option value="7:15 AM">7:15 AM</option>
<option value="7:30 AM">7:30 AM</option>
<option value="7:45 AM">7:45 AM</option>
 
<option value="8:00 AM">8:00 AM</option>
<option value="8:15 AM">8:15 AM</option>
<option value="8:30 AM">8:30 AM</option>
<option value="8:45 AM">8:45 AM</option>
 
<option value="9:00 AM">9:00 AM</option>
<option value="9:15 AM">9:15 AM</option>
<option value="9:30 AM">9:30 AM</option>
<option value="9:45 AM">9:45 AM</option>
 
<option value="10:00 AM">10:00 AM</option>
<option value="10:15 AM">10:15 AM</option>
<option value="10:30 AM">10:30 AM</option>
<option value="10:45 AM">10:45 AM</option>
 
<option value="11:00 AM">11:00 AM</option>
<option value="11:15 AM">11:15 AM</option>
<option value="11:30 AM">11:30 AM</option>
<option value="11:45 AM">11:45 AM</option>
 
<option value="12:00 PM">12:00 PM</option>
<option value="12:15 PM">12:15 PM</option>
<option value="12:30 PM">12:30 PM</option>
<option value="12:45 PM">12:45 PM</option>
 
<option value="1:00 PM">1:00 PM</option>
<option value="1:15 PM">1:15 PM</option>
<option value="1:30 PM">1:30 PM</option>
<option value="1:45 PM">1:45 PM</option>
 
<option value="2:00 PM">2:00 PM</option>
<option value="2:15 PM">2:15 PM</option>
<option value="2:30 PM">2:30 PM</option>
<option value="2:45 PM">2:45 PM</option>
 
<option value="3:00 PM">3:00 PM</option>
<option value="3:15 PM">3:15 PM</option>
<option value="3:30 PM">3:30 PM</option>
<option value="3:45 PM">3:45 PM</option>
 
<option value="4:00 PM">4:00 PM</option>
<option value="4:15 PM">4:15 PM</option>
<option value="4:30 PM">4:30 PM</option>
<option value="4:45 PM">4:45 PM</option>
 
<option value="5:00 PM">5:00 PM</option>
<option value="5:15 PM">5:15 PM</option>
<option value="5:30 PM">5:30 PM</option>
<option value="5:45 PM">5:45 PM</option>
 
<option value="6:00 PM">6:00 PM</option>
<option value="6:15 PM">6:15 PM</option>
<option value="6:30 PM">6:30 PM</option>
<option value="6:45 PM">6:45 PM</option>
 
<option value="7:00 PM">7:00 PM</option>
<option value="7:15 PM">7:15 PM</option>
<option value="7:30 PM">7:30 PM</option>
<option value="7:45 PM">7:45 PM</option>
 
<option value="8:00 PM">8:00 PM</option>
<option value="8:15 PM">8:15 PM</option>
<option value="8:30 PM">8:30 PM</option>
<option value="8:45 PM">8:45 PM</option>
 
<option value="9:00 PM">9:00 PM</option>
<option value="9:15 PM">9:15 PM</option>
<option value="9:30 PM">9:30 PM</option>
<option value="9:45 PM">9:45 PM</option>
 
<option value="10:00 PM">10:00 PM</option>
<option value="10:15 PM">10:15 PM</option>
<option value="10:30 PM">10:30 PM</option>
<option value="10:45 PM">10:45 PM</option>
 
<option value="11:00 PM">11:00 PM</option>
<option value="11:15 PM">11:15 PM</option>
<option value="11:30 PM">11:30 PM</option>
<option value="11:45 PM">11:45 PM</option>
</select>

		
	
	<div style="margin-bottom: 4px; font-size: 10px; color: rgba(243,144,146,1.00)"><textarea maxlength="250" placeholder = "Event Description" name="eventdescription" id="eventDescForm" style="padding:4px; width: 95%; resize:none; rows:7;"></textarea></div>

	<select name="age" id="age" class="age" style="padding:4px; margin-bottom: 4px; width:100%">
		<option style="text-align: right;" selected disabled>Select Age</option>
		<option value="all">All</option>
		<option value="18">18+</option>
		<option value="21">21+</option>
	</select>

  <div style="margin-bottom:4px; font-size: 10px; "><input type = "text" placeholder = "Cost" id="eventCost" name="eventCost" style = "padding:7px;  width: 92%;"></input>
	</div>

	
	<!-- Image Upload -->
<!--
	<input type="file" name="fileToUpload" id="fileToUpload"><br><br>

	<div id="fupload">
  <div id="holder">
	</div>
  <p id="upload" class="hidden">
  <label>Drag & drop not supported, but you can still upload via this input field:<br>
	<input type="file"></label></p>
  <p id="filereader"  name="fileToUpload" id="fileToUpload">File API & FileReader API not supported</p>
  <p id="formdata">XHR2's FormData is not supported</p>
  <p id="progress">XHR2's upload progress isn't supported</p>
  <p>Upload progress: <progress id="uploadprogress" min="0" max="100" value="0">0</progress></p>
  
  <script>
var holder = document.getElementById('holder'),
    tests = {
      filereader: typeof FileReader != 'undefined',
      dnd: 'draggable' in document.createElement('span'),
      formdata: !!window.FormData,
      progress: "upload" in new XMLHttpRequest
    }, 
    support = {
      filereader: document.getElementById('filereader'),
      formdata: document.getElementById('formdata'),
      progress: document.getElementById('progress')
    },
    acceptedTypes = {
      'image/png': true,
      'image/jpeg': true
    },
    progress = document.getElementById('uploadprogress'),
    fileupload = document.getElementById('upload');

"filereader formdata progress".split(' ').forEach(function (api) {
  if (tests[api] === false) {
    support[api].className = 'fail';
  } else {
    // FFS. I could have done el.hidden = true, but IE doesn't support
    // hidden, so I tried to create a polyfill that would extend the
    // Element.prototype, but then IE10 doesn't even give me access
    // to the Element object. Brilliant.
    support[api].className = 'hidden';
  }
});

function previewfile(file) {
  if (tests.filereader === true && acceptedTypes[file.type] === true) {
    var reader = new FileReader();
    reader.onload = function (event) {
      var image = new Image();
      image.src = event.target.result;
      image.width = 250; // a fake resize
      holder.appendChild(image);
    };

    reader.readAsDataURL(file);
  }  else {
    holder.innerHTML += '<p>Uploaded ' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K' : '');
    console.log(file);
  }
}

function readfiles(files) {
    debugger;
    var formData = tests.formdata ? new FormData() : null;
    for (var i = 0; i < files.length; i++) {
      if (tests.formdata) formData.append('file', files[i]);
      previewfile(files[i]);
    }
	
	console.log(formData.get('file'));
    // now post a new XHR request
    if (tests.formdata) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'devnull.php');
      xhr.onload = function() {
        progress.value = progress.innerHTML = 100;
      };

      if (tests.progress) {
        xhr.upload.onprogress = function (event) {
          if (event.lengthComputable) {
            var complete = (event.loaded / event.total * 100 | 0);
            progress.value = progress.innerHTML = complete;
          }
        }
      }

      xhr.send(formData);
    }
}

if (tests.dnd) { 
  holder.ondragover = function () { this.className = 'hover'; return false; };
  holder.ondragend = function () { this.className = ''; return false; };
  holder.ondrop = function (e) {
    this.className = '';
    e.preventDefault();
    readfiles(e.dataTransfer.files);
  }
} else {
  fileupload.className = 'hidden';
  fileupload.querySelector('input').onchange = function () {
    readfiles(this.files);
  };
}

</script>  
</div>
	-->
	
	
	<!--
	<div class="uploader" style="text-align: center; line-height: 50px;" onclick="$('#filePhoto').click()">
    Click or drag to add photo<br>
	
    <input type="file" name="userprofile_picture" data-max-size="2048"  id="filePhoto" />
	</div>
	-->
	<!--Preference List-->
       
		<div style="text-align: center;">Set Prefrences</div>
        <div id="prefDiv" style="margin-bottom:4px; font-size: 10px;  color: rgba(255,255,255,1.00);">
			
        
		<input class="checkbox" id="action" type="checkbox" value="1" name="eventPreferences[]"> Music
		</input></br>
		<input class="checkbox" type="checkbox" value="2" name="eventPreferences[]"> Food & Drinks
		</input></br>
		<input class="checkbox"  type="checkbox" value="3" name="eventPreferences[]"> Sporting Events
		</input></br>
		<input class="checkbox" id="action" type="checkbox" value="4" name="eventPreferences[]"> Outdoor
		</input></br>
		<input class="checkbox" id="action" type="checkbox" value="5" name="eventPreferences[]"> Health & Fitness
        </input></br>
		<input class="checkbox" id="action" type="checkbox" value="6" name="eventPreferences[]"> Family Friendly
        </input></br>
		<input class="checkbox" id="action" type="checkbox" value="7" name="eventPreferences[]"> Retail
        </input></br>
		<input class="checkbox" id="action" type="checkbox" value="8" name="eventPreferences[]"> Performing Arts
        </input></br>
		<input class="checkbox" id="action" type="checkbox" value="9" name="eventPreferences[]"> Entertainment
        </input></br>
        <input class="checkbox" id="action" type="checkbox" value="10" name="eventPreferences[]"> Charity/Philanthropy
        </input></br>
		</div>
		<!--Old spot for lat long-->
		<!-- Terms & Conditions, may need, may not? disbling for now
		<div style="text-align:center;"><form action=""><input type="checkbox">I agree to the Terms & Conditions
		</input>
		</form></div>
		<br><br>
		-->
	    
	    <button type="submit"; style= "padding-top: 1px; paddig-botton:1px; width:100%; color: rgba(255,255, 255,1.00 ); background: rgba(255,153,255,1.00 );">Create Event</button>   
		    
	</div><!--Right Float div end -->
	
<!--Left Float Div Start-->
<div style ="font-size: 12px; position: absolute; bottom:22px;  border: 1px solid transparent; color:rgba(255,255,255,1.00); top: 50px; left: 10px; width: auto; margin-bottom:inherit; z-index: 10; padding: 7px; border-radius: 2px; background: rgba(255,153,255,1.00 ); overflow:hidden; overflow-y:scroll;">

<div id="thirdPartyPullType" name="thirdPartyPullType" class="thirdPartyPullType">
<select style="width:100%;" name="eventOptionType" id="eventOptionType" onchange="pickOption(this);">
	<option value="all">All</option>
    <option value="facebook">Facebook</option>
    <option value="google">Google</option>
</select>
</div>
<div id="thirdPartyPullListDiv" name="eventPullListBody" class="eventPullListBody">

</div>
</div> <!--Left FLoat Div End-->
    
    <!--Long/Lat Div-->
    <div style="display:none;">
		<input type="text" name="long" value="long">
		<input type="text" name="lat" value="lat">
	</div>
    <!--End lat/long-->
    
    <!--map div-->
  	<div id="map"></div>
    
	<script>
     // People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 38.5816, lng: -121.4944},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
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
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>	
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkAik0mFJzy4vTrOP4IyfIGcO6vdX1odY&libraries=places&callback=initAutocomplete"async defer></script>
	</div><!--End Hero Div-->
	</form><!-- End Form-->
</div><!--End Container -->
</body>
</html>