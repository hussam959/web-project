<?php require_once("home_func.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <style>
        <?php include_once "../home/css/home_style.css"; ?>
    </style>
</head>

<body>
    <?php $books = getAllBooks(); ?>
    <?php $author_books = getAuthorBooks("yiran park"); ?>
    <div id="container">
        <?php foreach ($books as $book) : ?>
            <div id="column">
                <a href="../details/details.php?book_id=<?php echo $book['book_id']; ?>">
                    <img src="<?php echo $book['book_image'] ?>"></a>

                <h2><?php echo ucfirst(strtolower($book['book_name'])) ?></h2>
                <h4><?php echo round($book['book_price']) . "$" ?></h4>
            </div>
        <?php endforeach; ?>
    </div>
    <?php foreach ($author_books as $author_book) : ?>
        <h2><?php echo $author_book['book_name']; ?></h2>
    <?php endforeach; ?>
</body>

</html>