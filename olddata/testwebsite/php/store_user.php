
<?php
  $json = file_get_contents('php://input');
  $obj = json_decode($json);
  $user_id = $obj->{'user_id'};
  $user_name = $obj->{'user_name'};
  $user_email = $obj->{'user_email'};

  $connection = include_once("connection.php");
  if(mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_errno();
  }
  $sql="INSERT INTO users(user_id, user_name, user_email)
  VALUES ($user_id, $user_name, $user_email)";
  
   if (mysqli_query($dbCon,$sql)) {
      echo "Values have been inserted successfully";
   }
?>




