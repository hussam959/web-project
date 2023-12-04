

<?php

require_once("../../shared/config.php");
$sql = "CREATE TABLE IF NOT EXISTS cart_items (
    item_id INT(6) PRIMARY KEY AUTO_INCREMENT,
    cart_id INT(6) UNSIGNED NOT NULL,
    book_id INT(6) UNSIGNED NOT NULL,
    quantity INT UNSIGNED NOT NULL DEFAULT 1,
    FOREIGN KEY (cart_id) REFERENCES cart(cart_id),
    FOREIGN KEY (book_id) REFERENCES books(book_id)
  )";
if (!mysqli_query($con, $sql)) {
    echo ("Error description: " . mysqli_error($con));
}

?>