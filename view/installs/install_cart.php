
<?php

require_once("../../shared/config.php");
$sql = "CREATE  TABLE IF NOT EXISTS cart(
    cart_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
)";
if (!mysqli_query($con, $sql)) {
    echo ("Error description: " . mysqli_error($con));
}

?>