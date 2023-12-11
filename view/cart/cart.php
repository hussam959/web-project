<?php require("cart_func.php") ?>
<!DOCTYPE html>
<html>

<head>
    <style>
        <?php require("css/cart_styles.css"); ?>
    </style>
</head>

<body>
    <?php session_start(); ?>
    <?php $userId = $_SESSION['user_id']; ?>
    <?php $cart = getCart($userId); ?>
    <?php if (empty($cart)) : ?>
        <div class="empty-cart">
            <img src="../../images/empty_cart.jpg"/>
            <h1>Your Cart is empty</h1>
            <h3>Looks like you haven't made your choise yet.</h3>
        </div>
    <?php endif; ?>
    <?php if (!empty($cart)) : ?>
        <?php foreach ($cart as $item) : ?>
            <div class="container">
                <img src="../../images/<?php echo $item['book_image']; ?>">
                <h3><?php echo $item['book_name']; ?></h3>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>

</html>