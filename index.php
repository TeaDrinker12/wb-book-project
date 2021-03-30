<?php
  $PAGETITLE = "Home";
  require("shared/header.php");
  include("shared/db_config.php");

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
