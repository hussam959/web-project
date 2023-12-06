<?php require_once("home_func.php"); ?>
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
</head>

<body>
    <?php $books = getAllBooks(); ?>
    <?php $author_books = getAuthorBooks("yiran park"); ?>

    <?php if (isset($_POST['search-submit'])) : ?>
        <?php $text = $_POST['search']; ?>
        <?php $searched_books = searchBook($text); ?>
        <?php if (!empty($searched_books)) : ?>
            <?php $encodeSearchedBooks = json_encode($searched_books); ?>
            <?php header('Location: ../search/search.php?data=' . urlencode($encodeSearchedBooks)); ?>
        <?php endif; ?>
    <?php endif; ?>

    <div id="search-box">

        <form class="search-form" method="post">
            <input type="text" name="search" autocomplete="off" placeholder="search for a book">
            <button type="submit" name="search-submit">
                <i class="material-icons">search</i>
            </button>
        </form>
    </div>

    <div id="container">
        <?php foreach ($books as $book) : ?>
            <div id="column">
                <a href="../details/details.php?book_id=<?php echo $book['book_id'] ?>">
                    <img src="<?php echo $book['book_image'] ?>"></a>

                <h2><?php echo ucfirst(strtolower($book['book_name'])) ?></h2>
                <h4><?php echo round($book['book_price']) . "$" ?></h4>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>