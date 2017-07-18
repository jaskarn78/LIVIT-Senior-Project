<?php
  ini_set('display_errors', 1);
  include_once ('php/init_facebook_php_sdk.php');
  session_start();
  
	if (isset($_SESSION['facebook_access_token'])) {
		try {
			$accessToken = $_SESSION['facebook_access_token'];
			$userId = $_SESSION['user_id'];
			$response = $fb->get('/me?fields=id,name,email', $accessToken);
			
			$user = $response->getGraphUser();
			$user_email = $user['email'];
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
			echo $ex->getMessage();
		}
	}
?>
<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LIV IT Profile</title>
<link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/listStyle.css">
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
	function showList()
	{
		var xmlhttp = new XMLHttpRequest({mozSystem: true});
		var url = "http://athena.ecs.csus.edu/~teamone/php/all_facebook_events.php";;
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("listBody").innerHTML = xmlhttp.responseText;
			}
		};
		
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
</script>
</head>
<body onload="showList();">
<!-- Main Container -->
<div class="container"> 
  <!-- Navigation -->
  <header> <a href="">
    <h4 class="logo">LIV</h4>
  </a>
    <nav>
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li> <a href="about.php">ABOUT</a></li>
        <li> <a href="contact.php">CONTACT</a></li>
		<li> <a href="manage.php">MANAGE</a></li>
		<li> <a href="profile.php">PROFILE</a></li>
        <?php
          if (isset($accessToken)) {
            echo '<li><a href="php/logout.php">LOGOUT</a></li>';
          } else {
            echo '<li><a href="php/login.php">LOG IN</a></li>';
          }
        ?>
      </ul>
    </nav>
  </header>
  <!-- About Section -->
    <h2>YOUR PROFILE</h2>
  <!-- More Info Section -->
  	<?php 
		if (isset($accessToken)) {
			echo '<h1 style="text-align:center;">' . $user['name'] . '</h1>';
			echo '<p style="text-align:center;">';
			echo '<img src="//graph.facebook.com/' . $user['id'] .'/picture?type=large">';
			echo '</p>';
			echo '<br></br>';
		}
	?>
	<div name="listBody" id="listBody" class="listBody">
	</div><!-- end list body -->
<footer>
</footer>
<!-- Main Container Ends -->
</body>
</html>
