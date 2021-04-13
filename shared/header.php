<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= $PAGETITLE ?></title>
    <link rel="stylesheet" href="shared/style.css">
  </head>
  <body>
    <div id="wrapper">
      <header>
        
      <a href="/" style="text-decoration: none;"><h1 style="display :inline;">📚</h1></a>
      <h1 style="display: inline;"><?= $PAGETITLE ?></h1>

        <div id="account-links">
          <?php
          if(!isset($_SESSION["username"]))
          {
          ?>
          <a class="account-link" href="login.php">Login</a>
          <a class="account-link" href="signup.php">Signup</a>
          <?php
          } else {
          ?>
          <a class="account-link" href="favorite.php">My Books</a>
          <a class="account-link" href="login.php?logout">Logout</a>
          <?php
          }
          ?>
        </div>
      </header>