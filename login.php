<?php
  $PAGETITLE = "Login";
  require("shared/header.php");
  require("shared/db_config.php");

  if( isset($_POST["Login"]))
  {
        $user = $_POST["user"];
        $psd = $_POST["pass"]; 
      
    }

?>

      <content>
        <div class="account-box">
          <form id="login-form" action="login.php" method="POST">
            <label>
              User Name
              <input type="text" name="user" >
            </label>
            <label>
              Password
              <input type="password" name="pass" >
            </label>
            <input type="submit" value="Login" name="Login" onclick=" ">
          </form>
        </div>
      </content>


      <?php
      session_start();
     
      if(isset($_POST['Login']))
      {
          $query = "SELECT * FROM user WHERE username LIKE '$user' AND password LIKE '$psd'";
          $res = mysqli_query($db,$query);
          $row  = mysqli_fetch_array($res);
          if(is_array($row))
          {
              $_SESSION["username"] = $row['username'];
              $_SESSION["password"]=$row['password'];
              header("Location: index.php"); 
          }
          else
          {
              echo "Invalid Email ID/Password";
          }
      }
      ?>


<?php
  require("shared/footer.php");
?>