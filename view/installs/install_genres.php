

<?php 
require_once ("../../shared/config.php");
$sql = "CREATE TABLE IF NOT EXISTS genres(
    genre_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    genre_name VARCHAR(255) NOT NULL UNIQUE
)";
if(!mysqli_query($con, $sql)){
    echo("Error description: " . mysqli_error($con));
}

?>