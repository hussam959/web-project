


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

function searchBook($text){
    global $con;
    $sql = <<<SQL
    SELECT * FROM books
    WHERE book_name LIKE "%$text%"
    SQL;
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0){
        $books = [];
        while ($row = mysqli_fetch_assoc($result)){
            $books[] = $row;
        }
        
        return $books;
    }else{
        return false;
    }
}

?>