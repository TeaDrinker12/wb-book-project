<?php
  $HOST = "localhost";
  $USERNAME = "root";
  $PASSWORD = "root";
  $DATABASENAME = "bookapp";
  
  $db = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DATABASENAME);
  
  if(mysqli_errno($db)) {
      echo "Database Error: ";
    
      exit();
  }

?>