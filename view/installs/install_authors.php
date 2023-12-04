

<?php
require_once "../../shared/config.php";
$sql = "CREATE TABLE IF NOT EXISTS authors(
    author_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    author_name TEXT NOT NULL,
    author_bio TEXT NOT NULL
    )";
if(!mysqli_query($con, $sql)){
    echo("Error description: " . mysqli_error($con));
}

echo "authors database created successfully";
?>