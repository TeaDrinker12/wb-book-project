<?php
  $PAGETITLE = "Home";
  require("shared/header.php");
  include("shared/db_config.php");

?>
      <content>
      </content>
      <br>
      <button id="more-link" onclick="loadContent();">More...</button>


      <script>
        let currentPage = 1;
        let category = 'game';
        let categories = {
          "game": "Game Development",
          "web": "Web Development",
        };
        let content = document.body.getElementsByTagName('content')[0];
        loadContent();

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
          console.log(result);
          
          for (book of result) {
            content.innerHTML += `
            <div class="book-info">
            <img class="book-info-image" src="${book.image}" alt="Book Cover">
            <div class="book-info-text">
            <p class="book-title">${book.title}</p>
            <p class="author">Author</p>
            <p class="publishing-date">Publishing Date</p>
            <p class="category">${categories[category]}</p>
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
