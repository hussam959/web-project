
<?php require_once("details_func.php")?>
<!DOCTYPE html>
<html>

<body>
    <?php $bookId = $_GET['book_id']; ?>
    <?php $bookData = getBookBYId($bookId); ?>
    <img style="width: 400; height: 400;" src="">
    <?php echo $bookData['book_image']; ?>">
</body>

</html>