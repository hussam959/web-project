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

// ----- to delete a book -----
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

// ----- to insert a book -----
// 1- insert book to books table
// 2- insert author to authors table if the author is new
// 3- insert book and author to book_authors table

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

function getUsers(){
    $sql = "SELECT * FROM users WHERE name <> 'admin'";
    $result = mysqli_query($GLOBALS['con'], $sql);
    $users = [];
    while($row = mysqli_fetch_assoc($result)){
        $users[] =$row; 
    }
    return $users;
}

// ----- to delete user -----
// 1- delete user items from cart
// 2- delete user cart
// 3- delete user himself
function deleteUser($userId){
    // delete from cart items table
    $sql = <<<SQL
    DELETE FROM cart_items
    WHERE cart_id IN (
        SELECT cart_id FROM cart WHERE user_id = '$userId'
        )
    SQL;
    $result = mysqli_query($GLOBALS['con'], $sql);
    if (!$result) {
        die("Error deleting cart items: " . mysqli_error($GLOBALS['con']));
    }
    // delete from cart table
    $sql = "DELETE FROM cart WHERE user_id = '$userId'";
    $result = mysqli_query($GLOBALS['con'], $sql);
    if (!$result) {
      die("Error deleting cart: " . mysqli_error($GLOBALS['con']));
    }
    // delete from users table
    $sql = "DELETE FROM users WHERE user_id = '$userId'";
    $result = mysqli_query($GLOBALS['con'], $sql);
    if (!$result) {
      die("Error deleting user: " . mysqli_error($GLOBALS['con']));
    }
    return true;
}
?>