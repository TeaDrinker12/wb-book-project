<?php
  $PAGETITLE = "Home";
  require("shared/header.php");
  include("shared/db_config.php");

?>
      <content>
        <div class="book-info">
          <img class="book-info-image" src="" alt="Book Cover">
          <div class="book-info-text">
            <p class="book-title">Title</p>
            <p class="author">Author</p>
            <p class="publishing-date">Publishing Date</p>
            <p class="category">Category</p>
          </div>
        </div>
      </content>
<?php
  require("shared/footer.php");
?>
