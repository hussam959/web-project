
<?php require("cart_func.php") ?>
<?php session_start(); ?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <style>
        <?php require("css/cart_styles.css");
        ?>
    </style>
    <?php
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">'
    ?>
    <?php
    echo '	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">';
    ?>
</head>

<body>
   
    <header>
        <div class="logo">
            <a href="">Ready to Read ?!</a>
        </div>
        <nav>
            <ul>
                <li><a href="../home/home.php">Home </a></il>
                <li><a href=" ../cart/cart.php">Books Cart</a></il>
                <li><a href="">About Us </a></il>
                <li><a href="">Contact</a></il>
            </ul>
        </nav>
        <div class="search-box">
            <form class="search-form" method="post">
                <input type="text" name="search" autocomplete="off" placeholder="search for a book">
                <button type="submit" name="search-submit">
                    <i class="fa fa-search" style="font-size: 15px;"></i>
                </button>
            </form>
        </div>
    </header>

    <?php $userId = $_SESSION['user_id']; ?>
    <?php $cart = getCart($userId); ?>
    <?php if (isset($_POST['delete-from-cart'])) : ?>
        <?php $item_id = $_POST['item-id']; ?>
        <?php deleteFromCart($item_id) ?>
        <?php header("Location: cart.php"); ?>
    <?php endif; ?>

    <!-- not empty cart -->
    <?php if (!empty($cart)) : ?>
        <div class="container">
            <h1>Shopping Cart</h1>
            <div class="cart">
                <div class="products">
                    <?php foreach ($cart as $item) : ?>
                        <div class="product">
                            <img src="../../images/<?php echo $item['book_image']; ?>" name="book_id" value="<?php echo $item['book_id']; ?>">
                            <div class="product-info">
                                <h3 class="product-name"><?php echo $item['book_name']; ?></h3>
                                <h4 class="product-price"><?php echo round($item['book_price']) . "$"; ?></h4>
                                <p class="product-quantity">Qnt: <input value="1" name="quantity" readonly>
                                <form method="POST" class="product-remove">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    <input type="hidden" name="item-id" value="<?php echo $item['item_id']; ?>">
                                    <input type="submit" name="delete-from-cart" value="Remove">
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- empty cart -->
    <?php if (empty($cart)) : ?>
        <div class="empty-cart">
            <img src="../../images/empty_cart.jpg" />
            <h1>Your Cart is empty</h1>
            <h3>Looks like you haven't made your choise yet.</h3>
        </div>
    <?php endif; ?>


</body>

</html>
