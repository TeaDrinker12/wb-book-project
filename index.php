<?php
  $PAGETITLE = "Home";
  require("shared/header.php");

  $HOST = "localhost";
  $USERNAME = "root";
  $PASSWORD = "root";
  $DATABASENAME = "bookapp";
  $db = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DATABASENAME);

  $query = "SELECT * FROM user";
  $result = mysqli_query($db, $query);
  $firstUser = mysqli_fetch_assoc($result);
  echo var_dump($firstUser);

?>
      <content>
        <div class="book-info">
          <img class="book-info-image" src="" alt="Book Cover">
          <div class="book-info-text">
            <p>Title</p>
            <p>Author</p>
            <p>Publishing Date</p>
            <p>Category</p>
          </div>
        </div>
      </content>
<?php
  require("shared/footer.php");
?>
