


<?php 
require ("../../shared/config.php");

function getCart($userId){
    global $con;
    $sql = <<<SQL
    SELECT c.book_id, c.item_id, b.book_id, b.book_name, b.book_price, b.book_image
    FROM cart_items c
    INNER JOIN books b
    ON c.book_id=b.book_id
    INNER JOIN cart u
    ON c.cart_id=u.cart_id
    WHERE u.user_id="$userId"
    SQL;
    $result = mysqli_query($con, $sql);
    $cart = [];
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $cart[] = $row;
        }
    }
    return $cart;
}

function deleteFromCart($itemId){
    global $con;
    $sql = <<<SQL
    DELETE FROM cart_items
    WHERE item_id = '$itemId'
    SQL;
    mysqli_query($con, $sql);
}

?>