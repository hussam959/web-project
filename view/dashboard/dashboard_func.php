<?php 

require_once "../../shared/config.php";
function getNumberofBooks(){
    $sql = "SELECT COUNT(*) FROM books";
    $result = mysqli_query($GLOBALS['con'], $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['COUNT(*)'];
}
function getNumberOfUsers(){
    $sql = "SELECT COUNT(*) FROM users";
    $result = mysqli_query($GLOBALS['con'], $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['COUNT(*)'];
}

function getAllBooks(){
    $sql = "SELECT * FROM books";
    $result = mysqli_query($GLOBALS['con'], $sql);
    $books = [];
    while($row = mysqli_fetch_assoc($result)){
        $books[] =$row; 
    }
    return $books;
}

// to delete a book
// 1- delete him from book_authors table.
// 2- delete him from cart_items table.
// 3- delete him from books table.
function deleteBook_Author($id){
    $sql = <<<SQL
    DELETE ba FROM book_authors ba
    INNER JOIN books b
    ON ba.book_id = b.book_id
    WHERE b.book_id = '$id'
    SQL;
    $x = mysqli_query($GLOBALS['con'], $sql);
}
function deleteCart_Item($id){
    $sql = <<<SQL
    DELETE ci FROM cart_items ci
    INNER JOIN books b
    ON ci.book_id = b.book_id
    WHERE b.book_id = '$id'
    SQL;
    $x = mysqli_query($GLOBALS['con'], $sql);
}
function deleteBook($bookId){
    $sql = <<<SQL
    DELETE FROM books
    WHERE book_id = '$bookId'
    SQL;
    mysqli_query($GLOBALS['con'], $sql);
}

// to insert a book
// 1- insert book to books table
// 2- insert author to authors table if the author is new
// 3- insert book and author to book_authors table
// book_name book_author book_genre book_year book_price book_image book_description author_bio

function insertBook($name, $author, $genre, $price, $year, $image, $desc){
    $sql = <<<SQL
    INSERT INTO books(book_name, book_author, book_genre, book_price, book_year, book_image, book_description) 
    VALUES('$name', '$author','$genre', '$price','$year', '$image','$desc')
    SQL;
    mysqli_query($GLOBALS['con'], $sql);
    return mysqli_insert_id($GLOBALS['con']);
}

function get_or_create_Author($author, $bio){
    $author = mysqli_real_escape_string($GLOBALS['con'], $author);
    $sql = "SELECT * FROM authors WHERE author_name = '$author'";
    $result = mysqli_query($GLOBALS['con'], $sql);
    if(mysqli_num_rows($result) > 0){
        // author exists
        $row = mysqli_fetch_assoc($result);
        $author_id = $row['author_id'];
    }else{
        // insert new author
        $sql = "INSERT INTO authors(author_name, author_bio) VALUES ('$author', '$bio')";
        mysqli_query($GLOBALS['con'], $sql);
        $author_id = mysqli_insert_id($GLOBALS['con']);
    }
    return $author_id;
}

function insertBook_Authors($bookId, $authorId){
    $sql = "INSERT INTO book_authors(book_id, author_id) VALUES('$bookId', '$authorId')";
    mysqli_query($GLOBALS['con'], $sql);
}


?>