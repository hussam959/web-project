



<?php

require_once("../../shared/config.php");
$sql = "CREATE TABLE book_genre (
  book_id INT(6) UNSIGNED NOT NULL,
  genre_id INT(6) UNSIGNED NOT NULL,
  PRIMARY KEY (book_id, genre_id),
  FOREIGN KEY (book_id) REFERENCES books(book_id),
  FOREIGN KEY (genre_id) REFERENCES genres(genre_id)
)";
if (!mysqli_query($con, $sql)) {
    echo ("Error description: " . mysqli_error($con));
}

?>