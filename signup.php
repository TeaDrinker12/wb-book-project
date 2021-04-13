<?php
  $PAGETITLE = "Singnup";
  require("shared/header.php");
  require("shared/db_config.php");
  
    
  if(isset($_POST['Sign-up']))
  {
        $user = $_POST['username'];
        $psd = $_POST['password'];
        $query = "INSERT INTO user (id, username, password) VALUES (NULL, '$user' , '$psd')";
        $res = mysqli_query($db,$query);
        header('Location: login.php');
  }

?>



      <content>
        <content>
          <div class="account-box">
            <form id="signup-form" action="signup.php" method="POST">
              <label class="field">
                User Name
                <input type="text" name="username">
              </label>
              <label class="field">
                Password
                <input type="password" name="password">
              </label>
              <label class="field">
                Re-Type Password
                <input type="password" name="password-confirm">
              </label>
              <input type="submit" value="Sign-up" name="Sign-up">
            </form>
          </div>
        </content>
      </content>

      <?php
     

  require("shared/footer.php");
      ?>