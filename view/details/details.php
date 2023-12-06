<?php require_once("details_func.php") ?>
<!DOCTYPE html>
<html>

<head>
    <style>
        <?php include "css/details_style.css"; ?>
    </style>
</head>

<body>
    <?php $bookId = $_GET['book_id']; ?>
    <?php $bookData = getBookBYId($bookId); ?>
    <div class="details">
        <div class="image">
            <img src="<?php echo $bookData['book_image']; ?>">
        </div>
        <div id="column">
            <h1><?php echo $bookData['book_description']; ?></h1>
        </div>
    </div>

</body>

</html>