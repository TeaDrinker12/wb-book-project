<?php
  require("header.php");
?>
      <content>
        <content>
          <div class="account-box">
            <form id="signup-form" action="" method="POST">
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
              <input type="submit" value="Sign-up">
            </form>
          </div>
        </content>
      </content>
<?php
  require("footer.php");
?>