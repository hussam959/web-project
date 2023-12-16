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
    <?php session_start(); ?>
    <?php $userId = $_SESSION['user_id'];  ?>
    <?php $bookData = getBookBYId($bookId); ?>
    <?php $authorBooks = getAuthorBooks($bookData['book_author']); ?>
    <?php if (isset($_POST['submit'])) : ?>
        <?php addToCart($bookId, $userId) ?>
    <?php endif; ?>
    <div class="details">
        <div class="image">
            <img src="../../images/<?php echo $bookData['book_image']; ?>">
        </div>
        <div class="column">
            <h2 style="font-weight: bold;"><?php echo $bookData['book_name']; ?></h2>
            <p class="disc"><?php echo $bookData['book_description']; ?></p>
            <table class="book_details">
                <tr>
                    <th>Author</th>
                    <td>
                        <label>
                            <?php echo ucfirst($bookData['book_author']); ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>Genre</th>
                    <td><?php echo ucfirst($bookData['book_genre']); ?></td>
                </tr>
                <tr>
                    <th>First Publish</th>
                    <td><?php echo $bookData['book_year']; ?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><?php echo round($bookData['book_price']) . "$"; ?></td>
                </tr>
            </table>
            <form method="post">
                <input class="button" type="submit" name="submit" value="Add To Cart">
            </form>
        </div>

    </div>
    <?php if (!empty($authorBooks)) : ?>
        <div class="authorcontainer">
            <h2 class="h2">Other Author Books</h2>
            <?php foreach ($authorBooks as $book) : ?>
                <?php if ($bookId != $book['book_id']) : ?>
                    <div class="authorcolumn">
                        <img src="../../images/<?php echo $book['book_image'] ?>">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>



</body>

</html>