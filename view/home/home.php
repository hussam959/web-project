<?php require_once("home_func.php"); ?>
<?php require_once("../details/details_func.php"); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <style>
        <?php include "../home/css/home_style.css"; ?>
    </style>
    <?php
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">'
    ?>

    <script>
        function logout() {
            <?php ?>
        }
    </script>


</head>

<body>
    <?php $books = getAllBooks(); ?>
    <?php if (isset($_POST['search-submit'])) : ?>
        <?php $text = $_POST['search']; ?>
        <?php $searched_books = searchBook($text); ?>
        <?php if (!empty($searched_books)) : ?>
            <?php $encodeSearchedBooks = json_encode($searched_books); ?>
            <?php header('Location: ../search/search.php?data=' . urlencode($encodeSearchedBooks)); ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (isset($_POST['add-to-cart'])) : ?>
        <?php $bookId = $_POST['book-id'] ?>
        <?php $userId = $_SESSION['user_id']; ?>
        <?php addToCart($bookId, $userId) ?>
        <?php header("Location: home.php"); ?>
    <?php endif; ?>

    <?php if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'logout') : ?>
        <?php session_unset(); ?>
        <?php session_destroy(); ?>
        <?php echo "<script>window.location.href='../../auth/auth.php';</script>"; ?>
    <?php endif; ?>


    <header>
        <div class="logo">
            <a href="">Ready to Read ?!</a>
        </div>
        <nav>
            <ul>
                <li><a href=" ../home/home.php">Home </a></il>
                <li><a href=" ../cart/cart.php">Books Cart</a></il>
                <li><a href="#" onclick="if(confirm('logout')){window.location.href='<?php echo '../../auth/auth.php?action=logout' ?>'}">Logout</a></li>
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
        <h1>Welcome Reader</h1>
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