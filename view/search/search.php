<?php require_once("../home/home_func.php"); ?>
<?php require_once("../details/details_func.php"); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <style>
        <?php include "css/search_style.css"; ?>
    </style>
    <?php
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">'
    ?>
</head>

<body>
    <?php $data = $_GET['data']; ?>
    <?php $books = json_decode($data, true); ?>

    <?php if (isset($_POST['add-to-cart'])) : ?>
        <?php $bookId = $_POST['book-id'] ?>
        <?php $userId = $_SESSION['user_id']; ?>
        <?php addToCart($bookId, $userId) ?>
        <?php header("Location: ../home/home.php"); ?>
    <?php endif; ?>

    <header>
        <div class="logo">
            <a href="">Ready to Read ?!</a>
        </div>
        <nav>
            <ul>
                <li><a href=" ../home/home.php">Home </a></il>
                <li><a href=" ../cart/cart.php">Books Cart</a></il>
                <li><a href="">About Us </a></il>
                <li><a href="">Contant </a></il>
            </ul>
        </nav>
        <div class="search-box">
            <form class="search-form" method="post">
                <input type="text" name="search" autocomplete="off" placeholder="search for a book">
                <button type="submit" name="search-submit">
                    <i class="material-icons">search</i>
                </button>
            </form>
        </div>
    </header>


    <div class="container">
        <h1>Related To Your Search</h1>
        <?php foreach ($books as $book) : ?>
            <div class="back">
                <div class="column">
                    <a href=" ../details/details.php?book_id=<?php echo $book['book_id'] ?>">
                        <img src="../../images/<?php echo $book['book_image'] ?>"></a>
                    <h2><?php echo ucfirst(strtolower($book['book_name'])) ?></h2>
                    <h4><?php echo round($book['book_price']) . "$" ?></h4>
                    <div class="btn">
                        <form method="POST">
                            <input class="button" type="submit" name="add-to-cart" value="Add To Cart">
                            <input type="hidden" name="book-id" value="<?php echo $book['book_id'] ?>">
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>