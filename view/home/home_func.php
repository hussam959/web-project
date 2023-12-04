


<?php

require_once ("../../shared/config.php");
function getAllBooks(){
    global $con;
    $sql = "SELECT * FROM books";
    $result = mysqli_query($con, $sql);
    $books = [];
    while ($row = mysqli_fetch_assoc($result)){
        $books[] = $row;
    }
    return $books;
}

function getAuthorBooks($author){
    global $con;
    $sql = <<<SQL
    SELECT b.book_name
    FROM book_authors ba JOIN books b 
    ON ba.book_id=b.book_id
    WHERE b.book_author="$author"
    SQL;
    $result = mysqli_query($con, $sql);
    $books = [];
    while ($row = mysqli_fetch_assoc($result)){
        $books[] = $row;
    }
    return $books;
}


?>