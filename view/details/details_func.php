

<?php

require_once ("../../shared/config.php");
function getBookBYId($bookId){
    global $con;
    $sql = <<<SQL
    SELECT * FROM books
    WHERE book_id = $bookId
    SQL;
    $result = mysqli_query($con, $sql);
    $bookData = mysqli_fetch_assoc($result);
    return $bookData;
}
?>