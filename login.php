<?php
  $PAGETITLE = "Login";
  require("shared/header.php");
?>
      <content>
        <div class="account-box">
          <form id="login-form" action="" method="POST">
            <label>
              User Name
              <input type="text" name="username">
            </label>
            <label>
              Password
              <input type="password" name="password">
            </label>
            <input type="submit" value="Login">
          </form>
        </div>
      </content>
<?php
  require("shared/footer.php");
?>