<?php require_once('../shared/config.php'); ?>
<?php

    $sql = "CREATE TABLE IF NOT EXISTS users (
        user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(40) NOT NULL,
        email VARCHAR(40) NOT NULL,
        password VARCHAR(8) NOT NULL
    )";
    if(!mysqli_query($con, $sql)){
        echo("Error description: " . mysqli_error($con));
    }
?>