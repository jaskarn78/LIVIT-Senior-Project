<?php
  include_once ('php/check_login.php');
  include_once ('php/init_facebook_php_sdk.php');
  session_start();
?>
<!doctype php>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
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
  <header> <a href="">
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
  <!-- Hero Section -->
  <section class="hero" id="hero">
    <h2 class="hero_header"><span class="light">LIV IT</span></h2>
  </section>
  <!-- About Section -->
  <section class="about" id="about">
    <a href="main_event.php"><button>CREATE EVENT</button></a>
    <a href="headliner.php"><button>MANAGE EVENTS</button></a>
  </section>  
  <footer>
  
  </footer>
<!-- Main Container Ends -->
</body>
</html>
