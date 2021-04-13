<?php
  $PAGETITLE = "My Books";
  require("shared/db_config.php");
  require("shared/header.php");

  if (isset($_POST["add"])) {
    $bookid = str_replace('"', "", $_POST["add"]);
    $userid = $_SESSION["userid"];
    $query = "INSERT INTO userbook (userid, bookid) values ('$userid', '$bookid')";
    $res = mysqli_query($db,$query);
    echo "bookid: $bookid";
    exit();
  }
?>
      <content>
      <div id="book-container">
      </div>
      </content>
      <script>
      let favoriteBooks = [
      <?php
        $userid = $_SESSION["userid"];
        $query = "SELECT bookid FROM userbook where userid = '$userid'";
        $res = mysqli_query($db,$query);
        while ($row = mysqli_fetch_assoc($res))
        {
          $bookid = $row['bookid'];
          echo "'$bookid', ";
        }
      ?>
      ];
        let currentPage = 1;
        let category = 'game';
        let categories = {
          "game": "Game Development",
          "web": "Web Development",
          "mobile": "Mobile Development",
          "machine learning": "Machine Learning",
        };
        let content = document.getElementById('book-container');
        if (favoriteBooks.length > 0) {
          for (let isbn13 of favoriteBooks) {
          loadBook(isbn13);
        }
        } else {
          content.innerHTML = "<p>There are no added books.</p>"
        }

        function categoryOf(text) {
          for (categoryKey of Object.keys(categories)) {
            let regex = new RegExp(categoryKey, 'i');
            if (regex.test(text)) {
              return categoryKey;
            }
          }
        }

        function loadBook(isbn13) {
        let xhttp = new XMLHttpRequest();
        xhttp.open('GET', `https://api.itbook.store/1.0/books/${isbn13}`, true);
        xhttp.send();
        xhttp.onreadystatechange = function () {
          if (!(this.readyState == 4 && this.status == 200)) {
            return;
          }

          console.log(this.responseText);
          let book = JSON.parse(xhttp.responseText);
          let bookCategory = categoryOf(book.title + ' ' + book.subtitle);
          
          content.innerHTML += `
            <div class="book-info">
            <img class="book-info-image" src="${book.image}" alt="Book Cover">
            <div class="book-info-text">
            <p class="book-title">${book.title}</p>
            <p class="description">${book.subtitle}</p>
            <p class="category">Category: ${categories[bookCategory]}</p>
            <p class="isbn">ISBN: ${book.isbn13}</p>
          </div>
        </div>
            `;
        }
        currentPage += 1;
        }
      </script>
<?php
  require("shared/footer.php");
?>
