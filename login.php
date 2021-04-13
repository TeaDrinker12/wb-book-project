<?php
  $PAGETITLE = "Login";
  require("shared/header.php");
  require("shared/db_config.php");

  $password_invalid = false;

  if(isset($_GET["logout"]))
  {
        session_destroy();
        header("Location: index.php");
        exit();
  }

  if( isset($_POST["Login"]))
  {
        $user = $_POST["user"];
        $psd = $_POST["pass"]; 
      
  }


     
    if(isset($_POST['Login']))
      {
          $query = "SELECT * FROM user WHERE username LIKE '$user' AND password LIKE '$psd'";
          $res = mysqli_query($db,$query);
          $row  = mysqli_fetch_array($res);
          if(is_array($row))
          {
              $_SESSION["userid"] = $row['id'];
              $_SESSION["username"] = $row['username'];
              $_SESSION["password"]=$row['password'];
              header("Location: index.php"); 
              exit();
          }
          else
          {
              $password_invalid = true;
          }
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
            <?php
            if ($password_invalid) {
              echo '<p>Invalid Username/Password</p>';
            }
            ?>
          </form>
        </div>
      </content>


<?php
  require("shared/footer.php");
?>