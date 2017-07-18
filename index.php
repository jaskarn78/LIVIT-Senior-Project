<?php
  session_start();
?>

<!doctype php>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LIVIT Home</title>
<link rel="icon" href="http://athena.ecs.csus.edu/~teamone/images/favicon.png" type="image/png" />
<link rel="shortcut icon"  href="http://athena.ecs.csus.edu/~teamone/images/favicon.png" type="image/png"/>
<link href="http://athena.ecs.csus.edu/~teamone/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>

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
	
	
	

  <!--OLD GOOD HEADER

  <a href="">
  <h4 class="logo"><img id="imageFile" src="http://athena.ecs.csus.edu/~teamone/images/LivitLogo.jpg" style="float:left; height:44px; width:44px;" /></h4>
  </a>
    <nav >
      <ul style="vertical-align:middle; padding-top:1.5%;">
        <li><a href="http://athena.ecs.csus.edu/~teamone/">HOME</a></li>
        <li> <a href="http://athena.ecs.csus.edu/~teamone/About/about.php">ABOUT</a></li>
        <li> <a href="http://athena.ecs.csus.edu/~teamone/Contact/contact.php">CONTACT</a></li>
       
      </ul>
    </nav>
    -->
  </header>
  
  <section class="hero" id="hero" style="padding:0px; margin:0px;">
<!--    <h2 class="hero_header"><span class="light">LIV IT</span></h2>-->
<div id="carousel1" class="carousel slide" data-ride="carousel" style="margin-top: 0px; top:0px; padding-top:0px;">
     <ol class="carousel-indicators">
       <li data-target="#carousel1" data-slide-to="0" class="active"></li>
       <li data-target="#carousel1" data-slide-to="1"></li>
       <li data-target="#carousel1" data-slide-to="2"></li>
     </ol>
     <div class="carousel-inner" role="listbox" style="margin:0px padding-top: 0px; top:0px;  height: auto;">
       <div class="item active" style="margin: 0px; padding: 0px; height: auto;"><img src="http://athena.ecs.csus.edu/~teamone/images/liv2.jpg" alt="First slide image" class="center-block img-responsive" style="margin: 0; top: 0px; width:100%; height:auto;">
         <div class="carousel-caption" style="display: none;">
<!--           <h3>First slide Heading</h3>
           <p>First slide Caption</p>-->
         </div>
       </div>
       <div class="item"><img src="http://athena.ecs.csus.edu/~teamone/images/citylights.jpg" alt="Second slide image" class="center-block" style="margin:0px; padding:0px; width:100%; height:auto;">
         <div class="carousel-caption">
          <!--
           <h3>Second slide Heading</h3>
           <p>Second slide Caption</p>
         -->
         </div>
       </div>
       <div class="item" style="margin:0px; padding: 0px;"><img src="http://athena.ecs.csus.edu/~teamone/images/raidas.jpg" alt="Third slide image" class="center-block" style="margin: 0px; top:-8px; padding:0px; width:100%; height:auto;">
         <div class="carousel-caption">
          <!--
           <h3>Third slide Heading</h3>
           <p>Third slide Caption</p>
         -->
         </div>
       </div>
     </div>
    
     <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev" style="height: auto; margin-bottom:10px; padding: :0px;">
	 <!--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="height: auto; margin:0px; padding: :0px;"></span>-->
	 <span class="sr-only" style="height: auto; margin:0px; padding: :0px;">Previous</span></a>
     
     <a class="right carousel-control" href="#carousel1" role="button" data-slide="next" style="height: auto; margin-bottom:10px; padding: :0px;">
	 <!--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="height: auto; margin:0px; padding: :0px;"></span>-->
	 <span class="sr-only" style="height: auto; margin:0px; padding: :0px;">Next</span></a>
 
     </div>

  </section>
  
  <footer>
  
  </footer>
  <script src="http://athena.ecs.csus.edu/~teamone/js/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="http://athena.ecs.csus.edu/~teamone/js/bootstrap.js" type="text/javascript"></script>
<!-- Main Container Ends -->
</body>
</html>
