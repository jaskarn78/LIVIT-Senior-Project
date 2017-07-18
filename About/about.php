<?php
  include_once ('php/init_facebook_php_sdk.php');
  session_start();
?>
<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About</title>
<link rel="icon" href="http://athena.ecs.csus.edu/~teamone/images/favicon.png" type="image/png" />
<link rel="shortcut icon"  href="http://athena.ecs.csus.edu/~teamone/images/favicon.png" type="image/png"/>
<link href="../css/singlePageTemplate.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Navigation -->
  <header> 
   
   <nav class="navbar navbar-inverse" style="border-color:transparent; border-width: 0px;">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myInverseNavbar2" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#"><img src="http://athena.ecs.csus.edu/~teamone/images/LivitLogo.jpg" style="float:left; height:42px; width:42px;" /></a> </div>
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
   
   <!-- OLD GOOD HEADER
    <h4 class="logo"><img id="imageFile" src="http://athena.ecs.csus.edu/~teamone/images/LivitLogo.jpg" style="float:left; height:44px; width:44px;" /></h4>
  </a>
    <nav>
      <ul>
        <li><a href="http://athena.ecs.csus.edu/~teamone/">HOME</a></li>
        <li> <a href="http://athena.ecs.csus.edu/~teamone/About/about.php">ABOUT</a></li>
        <li> <a href="http://athena.ecs.csus.edu/~teamone/Contact/contact.php">CONTACT</a></li>
       
      </ul>
    </nav>
    
    END OLD GOOD HEADER-->
  </header>
  <!-- Hero Section -->
  <!-- About Section -->
  <section class="about" id="about">
    <h2>ABOUT</h2>
    <p class="text_column">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
    <p class="text_column">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
    <p class="text_column">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
  </section>

  <!-- More Info Section -->
  <footer>
  
  </footer>
  
 <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<!-- Main Container Ends -->
</body>
</html>
