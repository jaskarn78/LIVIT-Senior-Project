<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/realStyle.css" rel="stylesheet" type="text/css">
 
 <link href="C:\Users\Gilly\Documents\jquery-ui-1.11.4.custom-1\jquery-ui-1.11.4.custom\jquery-ui.css" rel="stylesheet" type="text/css">
 
 <!--calendar brett-->
 <link href="css/coolStyle.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">


<title>Event Creation</title>
<style>
 #map {
        height: 100%;
		width: 100%;
      }
</style>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="js/script.js"></script>
  <script>
$(document).ready(function() {
// Datepicker Popups calender to Choose date.
$(function() {
$("#datepicker").datepicker();
// Pass the user selected date format.
$("#format").change(function() {
$("#datepicker").datepicker("option", "dateFormat", $(this).val());
});
});
});
</script>
 
</head>

<body><!-- main container-->
<div class = "container"> 
<header>
<a href="">
<h4 class="logo">LIV</h4>
</a>
<nav>
<ul>
  <li><a href="http://athena.ecs.csus.edu/~teamone/index.html">HOME</a></li>
  <li><a href="http://athena.ecs.csus.edu/~teamone/about.php">ABOUT</a></li>
  <li><a href"<MANAGE PAGE">MANAGE</a></li>
  <li><a href="http://athena.ecs.csus.edu/~teamone/login.php">LOG OUT</a></li>
  <li><a href="http://athena.ecs.csus.edu/~teamone/contact.php">CONTACT</a></li>
  </ul>
</nav> 
  </header>
<div class= "herro" id="herro" style="width: 100%; height: 100%; position: absolute;";>
	
    
    <!--BRETTT-->
    <div style="font-size:12px; position:fixed; height: width:199px; left:10px; bottom: 23px; backgroud: rgba(2,153,255,1.00); color:rgba(255,255,255,1.00); z-index:1; background: rgba(255,153,255,1.00 );"> Set Prefrences
    	<div><form action=""><input type="checkbox"> Music
        </input>
	</form>
    <form action=""><input type="checkbox"> Food & Drinks
        </input>
	</form>
    <form action=""><input type="checkbox"> Sporting Events
        </input>

	</form>
    <form action=""><input type="checkbox"> Outdoor
        </input>
	</form>
    <form action=""><input type="checkbox"> Health & Fitness
        </input>
	</form>
    <form action=""><input type="checkbox"> Family Friendly
        </input>
	</form>
    <form action=""><input type="checkbox"> Retail
        </input>
	</form>
    <form action=""><input type="checkbox"> Performing Arts
        </input>
	</form>
    <form action=""><input type="checkbox"> Entertainment
        </input>
	</form>
    
    </div>	
    
    </div>
    
    <input class="searchbox" id="pac-input"; type="text" placeholder="Surch" style="margin-top: 10px; border: 1px solid trasparent; height:30px; box-shadow: rgba(0,0,0,.289039) 0px 2px 6px; padding:0px 11px 0px 13px; width:313px; font-size:13px; font-weight: 300; z-index:1; position:absolute; left:121px; top:0px;"></input>
    
    
    <div style ="font-size: 12px; position: absolute; height:80%;  border: 1px solid trasparent; color:rgba(255,255,255,1.00); top: 10px; right: 10px; bottom: 30px; width: auto; z-index: 1; padding: 7px; border-radius: 2px; background: rgba(255,153,255,1.00 );">
  <div style="margin-bottom: 7px; font-size: 10px;"><input type ="text" placeholder="Event Name" style="padding:7px; height:23px; width:92%";></input>
  </div>
  <div style="margin-bottom:7px; font-size: 12px;"><input type = "text" placeholder = "Event Type" style = "padding:7px; height:23px; width: 92%"></input>
  </div>
  <div style="margin-bottom:7px; font-size: 10px; "><input type = "text" placeholder = "Event Sponsor" style = "padding:7px; height:23px;  width: 92%;"></input>
  </div>
  <!-- OLD DATE <div style="margin-bottom:7px; font-size: 10px;"><input type = "text" placeholder = "Date" style = "padding:7px;  width: 92%;"></input></div> -->
  <div style="margin-botton:7px; font-size:10px;"><input type="text" id="datepicker" placeholder="Date" style="padding: 7px; height:23px; width:92%;"></input></div>
  <br>
  <div><button type="Set prefrences"; style= "margin-top: 3px; paddig-botton:1px; width:100%; border:hidden; color: rgba(255,255, 255,1.00 ); background: rgba(255,153,255,1.00 );"> &#8656    Set Prefrences</button>
</div>   
  
  <div style=" width: 92%; text-align:center; margin-botton:7px; padding:7px;"> Start Time  <select>
  		<option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
  </select>

 <select>
  		<option value="00">00</option>
  		<option value="15">15</option>
        <option value="30">30</option>
        <option value="45">45</option>
</select>

<select>
  		<option value="am">am</option>
  		<option value="pm">pm</option>
</select></div>


<div style="margin-botton:7px;  text-align:center; width: 92%; padding: 7px; ">End Time  
<select>
  		<option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
  </select>
  
  <select>
  		<option value="00">00</option>
  		<option value="15">15</option>
        <option value="30">30</option>
        <option value="45">45</option>
  </select>  
  
  <select>
  		<option value="am">am</option>
  		<option value="pm">pm</option>
</select>  
  </div>

  <div style="margin-bottom:7px; font-size: 10px; color: rgba(243,144,146,1.00)"><textarea placeholder = "Event Description" style = "padding:7px; width: 92%; resize:none; rows:7;"></textarea></div>

  <div style="margin-bottom:7px; font-size: 10px;  color: rgba(255,255,255,1.00);"><input type = "text" placeholder = "Upload " style = "padding:7px;  width: 46%;"></input>
  <button type="button"; style="padding-top: 1px; paddig-botton:1px; width:42%; border:hiddene; border-width:1px; color: rgba(255,255, 255,1.00 ); background: rgba(255,153,255,1.00 ); ">Browse..</button>
</div>
<div style="text-align:center;"><form action=""><input type="checkbox">I agree to the Terms & Conditions
</input>
</form></div>
<br><br>
<div><button type="Create Event"; style= "padding-top: 1px; paddig-botton:1px; width:100%; border:hidden; color: rgba(255,255, 255,1.00 ); background: rgba(255,153,255,1.00 );">Create Event</button>   
</div>    
    <!--END BRETT-->
    </div>
  	<div id="map"></div>
    <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

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
</div>
</div>
</body>
</html>