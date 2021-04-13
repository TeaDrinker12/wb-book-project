<?php
  $PAGETITLE = "Home";
  require("shared/header.php");
  include("shared/db_config.php");

?>
      <content>
      <select id="search-category" onchange="updateCategory();">
      <option value="web" selected>Web Development</option>
      <option value="mobile">Mobile Development</option>
      <option value="game">Game Development</option>
      <option value="machine learning">Machine Learning</option>
      </select>
      <div id="book-container">
      </div>
      <button id="more-link" onclick="loadContent();">More...</button>
      </content>


      <script>
        let content = document.getElementById('book-container');
        let select = document.getElementById('search-category');

        let currentPage = 1;
        let category = select.value;
        let categories = {
          "game": "Game Development",
          "web": "Web Development",
          "mobile": "Mobile Development",
          "machine learning": "Machine Learning",
        };
        loadContent();

        function addToFavorites(isbn13) {
          let xhttp = new XMLHttpRequest();
          let url = `favorite.php`
          xhttp.open('POST', url, true);
          xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhttp.send(`add="${isbn13}"`);
        }

        function updateCategory() {
          category = select.value;
          currentPage = 1;
          content.innerHTML = "";
          loadContent();
        }

        function loadContent() {
        let xhttp = new XMLHttpRequest();
        xhttp.open('GET', `https://api.itbook.store/1.0/search/${category}/${currentPage}`, true);
        xhttp.send();
        xhttp.onreadystatechange = function () {
          if (!(this.readyState == 4 && this.status == 200)) {
            return;
          }

          console.log(this.responseText);
          let result = JSON.parse(xhttp.responseText).books;
          
          for (book of result) {
            content.innerHTML += `
            <div class="book-info">
            <img class="book-info-image" src="${book.image}" alt="Book Cover">
            <div class="book-info-text">
            <p class="book-title">${book.title}</p>
            <p class="description">${book.subtitle}</p>
            <p class="category">Category: ${categories[category]}</p>
            <p class="isbn">ISBN: ${book.isbn13}</p>
            <?php if (isset($_SESSION["userid"])) { ?>
            <button onclick="addToFavorites('${book.isbn13}');" class="button">Add Book</button>
            <?php } ?>
          </div>
        </div>
            `;
          }
        }
        currentPage += 1;
        }
      </script>
<?php
  require("shared/footer.php");
?>
