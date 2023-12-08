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
        <h1>Cart is empty</h1>
    <?php endif; ?>
    <?php foreach ($cart as $item) : ?>
        <div class="container">
            <img src="<?php echo $item['book_image']; ?>">
            <h3><?php echo $item['book_name']; ?></h3>
        </div>
    <?php endforeach; ?>
</body>

</html>