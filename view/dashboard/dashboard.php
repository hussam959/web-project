<?php require_once("dashboard_func.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <style>
        <?php include_once("css/dash_borad_style.css"); ?>
    </style>
    <?php
    echo "<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>";
    ?>
    <?php
    echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>";
    ?>
</head>

<body>

    <?php $numberOfBooks = getNumberofBooks(); ?>
    <?php $numberOfUsers = getNumberOfUsers(); ?>
    <?php $books = getAllBooks(); ?>
    <?php $users = getUsers(); ?>
    <?php if (isset($_POST['delete-book'])) : ?>
        <?php $bookId = $_POST['book_id']; ?>
        <?php deleteBook_Author($bookId); ?>
        <?php deleteCart_Item($bookId); ?>
        <?php deleteBook($bookId); ?>
        <?php header('Location: dashboard.php'); ?>
    <?php endif; ?>
    <?php if (isset($_POST['insert'])) : ?>
        <?php
        $filename = $_FILES["book_image"]["name"];
        $tempname = $_FILES["book_image"]["tmp_name"];
        $folder = "../../images/" . $filename;
        move_uploaded_file($tempname, $folder);
        ?>
        <?php $bookId = insertBook($_POST['book_name'], $_POST['book_author'], $_POST['book_genre'], $_POST['book_price'], $_POST['book_year'], $filename, $_POST['book_discription']); ?>
        <?php $authorId = get_or_create_Author($_POST['book_author'], $_POST['author_bio']); ?>
        <?php insertBook_Authors($bookId, $authorId); ?>
        <?php header('Location: dashboard.php'); ?>
    <?php endif; ?>

    <?php if (isset($_POST['delete-user'])) : ?>
        <?php $userId = $_POST['user-id']; ?>
        <?php deleteUser($userId); ?>
        <?php header('Location: dashboard.php'); ?>
    <?php endif; ?>

    <div class="sidebar">
        <header>Book Website</header>
        <ul>
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="../home/home.php"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="../cart/cart.php"><i class="fa fa-shopping-cart"></i>Cart</a></li>
        </ul>
    </div>
    <div class="content">
        <table>
            <tr>
                <thead>Statistics</thead>
            </tr>
            <tr>
                <th><?php echo $numberOfBooks ?></th>
                <th><?php echo $numberOfUsers ?></th>
            </tr>
            <tr>
                <td>books</td>
                <td>users</td>
            </tr>
        </table>

    </div>
    <div class="delete">
        <table>
            <tr>
                <th>Book Name</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Price</th>
            </tr>
            <?php foreach ($books as $book) : ?>
                <tr>
                    <td><?php echo $book['book_name'] ?></td>
                    <td><?php echo ucfirst($book['book_author']) ?></td>
                    <td><?php echo ucfirst($book['book_genre']) ?></td>
                    <td><?php echo round($book['book_price']) . "$" ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
                            <input type="submit" name="delete-book" value="X">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="insert">
        <form enctype="multipart/form-data" method="POST">
            <table>
                <tr>
                    <th><label for="book_name">Book Name</label></th>
                    <td><input type="text" autocomplete="off" id="book_name" name="book_name" required></td>
                </tr>
                <tr>
                    <th><label for="book_author">Book Author</label></th>
                    <td><input type="text" autocomplete="off" id="book_author" name="book_author" required></td>
                </tr>
                <tr>
                    <th><label for="book_genre">Book Genre</label></th>
                    <td><input type="text" autocomplete="off" id="book_genre" name="book_genre" required></td>
                </tr>
                <tr>
                    <th><label for="book_price">Book Price</label></th>
                    <td><input type="text" autocomplete="off" id="book_price" name="book_price" maxlength="4" required></td>
                </tr>
                <tr>
                    <th><label for="book_year">Book Year</label></th>
                    <td><input type="date" autocomplete="off" id="book_year" name="book_year" required></td>
                </tr>
                <tr>
                    <th><label for="book_image">Book Image</label></th>
                    <td><input type="file" autocomplete="off" id="book_image" name="book_image" required></td>
                </tr>
                <tr>
                    <th><label for="book_discription">Book Discription</label></th>
                    <td><textarea type="text" autocomplete="off" id="book_discription" name="book_discription" rows="2"></textarea></td>
                </tr>
                <tr>
                    <th><label for="author_bio">Author Biography</label></th>
                    <td><input type="text" autocomplete="off" id="author_bio" name="author_bio"></td>
                </tr>
            </table>
            <input type="submit" name="insert" value="Insert Book">
        </form>
    </div>
    <?php if (!empty($users)) : ?>
        <div class="delete">
            <table>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['user_id'] ?></td>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo password_hash($user['password'], PASSWORD_DEFAULT) ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="user-id" value="<?php echo $user['user_id'] ?>">
                                <input type="submit" name="delete-user" value="X">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
</body>

</html>