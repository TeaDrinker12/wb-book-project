<?php
  $HOST = "localhost";
  $USERNAME = "root";
  $PASSWORD = "root";
  $DATABASENAME = "bookapp";
  $db = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DATABASENAME);
  
  if(mysqli_errno($db)) {
      echo "Database Error: ";
      echo mysqli_error();
      exit();
  }

  $query = "SELECT * FROM user";
  $result = mysqli_query($db, $query);
  $firstUser = mysqli_fetch_assoc($result);

  $firstUsername = $firstUser['username'];
  $firstPassword = $firstUser['password'];

  echo "Database connection establised successfully!";
  echo "<br>";
  echo "Username: $firstUsername ";
  echo "<br>";
  echo "Password: $firstPassword ";
?>