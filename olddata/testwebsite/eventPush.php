<?php
  $eventName = strip_tags($_POST['eventName']);

  # Only accept one preference for now
 
  $sql = # create query that would add the event

  $query = mysqli_query($dbCon, $sql);

  if ($query) {
    # bring up event preview page
  } else {
    # Error posting event
  }
?>
