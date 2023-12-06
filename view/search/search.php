<!DOCTYPE html>
<html>

<head>
    <style>
        <?php include "../home/css/home_style.css"; ?>
    </style>
</head>

<body>
    <?php $data = $_GET['data']; ?>
    <?php $books = json_decode($data, true); ?>
    <div id="container">
        <?php foreach ($books as $book) : ?>
            <div id="column">
                <a href="">
                    <img src="<?php echo $book['book_image'] ?>"></a>
                <h2><?php echo ucfirst(strtolower($book['book_name'])) ?></h2>
                <h4><?php echo round($book['book_price']) . "$" ?></h4>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>