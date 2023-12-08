

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
function getAuthorBooks($author){
    global $con;
    $sql = <<<SQL
    SELECT b.book_name, b.book_image, b.book_id
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

function addToCart($bookId, $userId){
    global $con;
    // check if user already have cart
    $sql = <<<SQL
    SELECT * FROM cart 
    WHERE user_id='$userId'
    SQL;
    $result = mysqli_query($con, $sql);
    if($existingCart = mysqli_fetch_assoc($result)){
        $cartId = $existingCart['cart_id'];
    }else{
        // create cart if not exists
        $sql = <<<SQL
        INSERT INTO cart(user_id) VALUES('$userId')
        SQL;
        mysqli_query($con, $sql);
        $cartId = mysqli_insert_id($con);   
    }
    // check if item already in cart
    $sql = <<<SQL
    SELECT item_id FROM cart_items 
    WHERE cart_id='$cartId' AND book_id='$bookId'
    SQL;
    $result = mysqli_query($con, $sql);
    if($existingItem = mysqli_fetch_assoc($result)){
        $itemId = $existingItem['item_id'];
    } else {
        // add new item
        $sql = <<<SQL
        INSERT INTO cart_items(cart_id, book_id)
        VALUES('$cartId', '$bookId')
        SQL;
        mysqli_query($con, $sql);
        header("Location: ../../view/cart/cart.php");
        echo "Inserted Successfully";
    }
    return true;
}
?>