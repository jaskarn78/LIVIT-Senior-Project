<?php
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Confirmation Page</title>
<link href="css/realStyle.css" rel="stylesheet" type="text/css">
</head>
 	
<body>
<div class="container"><!--body div-->
<header>
<a href="">
<h4 class="logo">LIV</h4>
</a>
<nav>
<ul>
	<li><a href="index.php">HOME</a></li>
	<li><a href="about.php">ABOUT</a></li>
	<li><a href="contact.php">CONTACT</a></li>
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
  
  <div id="hero_review" name="hero_review"> 
  <div id="top" name="top" style="width:100%; font-size:36px; text-align:center; padding:5px;"><label><b>Confirm Event</b></label></div>
  
  <!--info Container-->
    <div id="info" name="info" style="width:100%; height:100%;">
    
    <div id="center" align="left" style="height: 100%; width: 32%; float:left; margin-left:25px; padding 15px; margin-top:30px;">
		<b><label>Event:</label></b>
  <input id="eventName" name="eventName" value="Luke Bryan's Crash My Playa" readonly></input><br><br>
		<b><label>Location:</label></b>
  <label id="eventLocation" name="eventLocation">White Sands Beach Panama</label><br><br>
		<b><label style="">Start Date: </label></b>	
  <label id="startDate" name="startDate" style="">July 4, 2012</label>
		<b><label>End Date:</label></b>
  <label id="endDate" name="endDate"> July 4, 2012</label><br><br>
		<b><label>Start Time:</label></b>
  <label id="startTime" name="startTime">Midday</label><br><br>
		<b><label>End Time:</label></b>
  <label id="endTime" name="startTime">Sunrise</label><br><br>
	  
		<b><label>Cost:</label></b>
  <label id="cost" id="cost">$100</label><br><br>
		<b><label>Age:</label></b>
  <label id="age" name"age">All</label><br><br>
  
		<b><label>Prefrences:</label><br><br></b>
  <label value="1" name="eventPreferences[]">Music</label><br>
  <label value="2" name="eventPreferences[]">Food & Drinks</label><br>
  <label value="3" name="eventPreferences[]">Sporting Events</label><br>
  <label value="4" name="eventPreferences[]">Outdoor</label><br>
  <label value="5" name="eventPreferences[]">Health & Fitness</label><br>
  <label value="6" name="eventPreferences[]">Family Friendly</label><br>
  <label value="7" name="eventPreferences[]">Retail</label><br>
  <label value="8" name="eventPreferences[]">Performing Arts</label><br>
  <label value="9" name="eventPreferences[]">Entertainment</label><br>
  <label value="10" name="eventPreferences[]">Charity/Philanthropy</label><br>
  </div><!--end center-->
  
    
    
   <!--start left -->
   <div align="left"id="left" name="left" style="width:32%; height:100%; float:left;">
	   <b>Event Description</b><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consequuntur delectus quae culpa recusandae tenetur sit facere odio sunt, non. Adipisci quia, eveniet libero nostrum beatae vitae reiciendis quos ipsum dicta explicabo ipsa fuga, autem labore doloribus qui expedita maxime, ad sequi repellat, incidunt. Officia repellendus alias, voluptate architecto voluptatum animi fuga ullam possimus ea dolorem omnis ex molestiae dignissimos facilis corporis reiciendis magni, voluptates minus tempora eaque totam quibusdam fugiat cum? Nihil ea a explicabo, sapiente nobis facere reprehenderit in vitae officiis recusandae, pariatur voluptatem repellat, ut, dolor! Inventore, non possimus repudiandae, eveniet error incidunt reiciendis eum, quisquam, repellat in culpa temporibus minus quas commodi animi fugit ex esse quasi! Velit, reiciendis, maiores. Temporibus soluta necessitatibus qui doloremque, veniam, vitae, nulla iusto assumenda voluptatem voluptate deleniti similique consequuntur! Suscipit magni obcaecati maiores laboriosam quo, veniam quia praesentium accusantium maxime tenetur. Alias dolore ducimus delectus sed iste, quae voluptate qui, amet cum expedita eos esse accusantium dignissimos ab facilis maiores ipsa, reiciendis blanditiis aspernatur recusandae. Et iusto eligendi nulla, laudantium praesentium, consequuntur voluptas ducimus ipsam iste autem dolorum quae a quidem perferendis repudiandae tempore, ullam doloremque. Numquam magni maxime, porro officia dolore esse recusandae obcaecati temporibus odio dolorum natus deserunt mollitia nihil deleniti voluptate totam, perferendis quod, officiis illum, corporis dolor possimus. Eligendi vero facilis deleniti culpa! Nesciunt dicta odio soluta qui iste eaque nam libero laboriosam consectetur ab hic ducimus maxime, dolore animi, enim maiores sunt in assumenda perferendis voluptatum. Enim quo expedita, ipsum dolores ullam voluptate nemo eligendi.</p>
	  	  
	  </div><!-- end button div-->  
  
  </div><!--endLeft-->
  
  
  <!--start right-->
  <div id="right" name="right" align="middle" style=" float:left; width:32%; height: 100%; margin-top:30px; margin-bottom:5px; ">

 <img style="margin-top:30px; height: 300px; width:300px; margin-left: 25px" src="img/lukebryanplaya.JPG"></img><br><br><br><br><br><br>
  <div align="middle" id="buttonDivGo" name="buttonDivGo"  class="buttonDivGo" style="position:static; margin-top:  width:100%; bottom:2px; right:2px; position:inherit;">
  <a href="#" style="float:left; margin-left: 35px; width:30%;"><div name="publishButton" id="publishButton" class="publishButton">ok</div></a> 
  <a href="#" style="float:left; width:30%; "><div name="editButton" id="editButton" class="editButton">edit</div></a> 
<a href="#" style="float:left; width:30%; "><div name="delete" id="delete" class="delete">delete</div></a>	  
  </div><!--end right div-->
   <br style="clear: left;" />
		</div><!--end info div-->  
    </div><!-- end hero div-->
</div><!--end body div-->
</body>
</html>