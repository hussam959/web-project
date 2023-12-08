<?php require("cart_func.php") ?>
<!DOCTYPE html>
<html>

<head></head>

<body>
    <?php session_start(); ?>
    <?php $userId = $_SESSION['user_id']; ?>
    <?php $cart = getCart($userId); ?>
    <?php if (true) : ?>
    <?php endif; ?>
    <?php foreach ($cart as $item) : ?>
        <h1><?php echo $item['book_name']; ?></h1>
    <?php endforeach; ?>
</body>

</html>