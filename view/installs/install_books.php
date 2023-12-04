

<?php



require_once('../../shared/config.php');
$sql = "CREATE TABLE IF NOT EXISTS books (
        book_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        book_name TEXT NOT NULL,
        book_author TEXT NOT NULL,
        book_genre TEXT NOT NULL,
        book_year INT(4) NOT NULL,
        book_price DECIMAL(10,2) NOT NULL,
        book_image TEXT NOT NULL,
        book_description TEXT
    )";

if(!mysqli_query($con, $sql)){
    echo("Error description: " . mysqli_error($con));
}





/* INSERT INTO `books` (
    `book_id`,
    `book_name`,
    `book_author`,
    `book_publisher`,
    `book_genre`,
    `book_year`,
    `book_price`,
    `book_image`,
    `book_description`
    ) VALUES (
        2',
        'DUCK HUNTING WITH DAD',
        'Josh Ishmael',
        'Brian Azhar',
        'adventure',
        '2004',
        '20.00',
        https://www.isbn-us.com/wp-content/uploads/cover/9798350723731.png?0.6751658373852021',
        'A family trip.');
*/


?>