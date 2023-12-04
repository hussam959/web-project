



<?php





require_once("../../shared/config.php");
// sql to create table for books and authors
$sql = "CREATE TABLE IF NOT EXISTS book_authors (
    book_id INT(6) UNSIGNED NOT NULL,
    author_id INT(6) UNSIGNED NOT NULL,
    PRIMARY KEY (book_id, author_id),
    FOREIGN KEY (book_id) REFERENCES books(book_id),
    FOREIGN KEY (author_id) REFERENCES authors(author_id)
    )";
if (!mysqli_query($con, $sql)) {
    echo ("Error description: " . mysqli_error($con));
}















/*
SELECT b.book_name
FROM book_authors JOIN books b
ON book_authors.book_id=b.book_id; 

SELECT authors.author_name
FROM book_authors JOIN authors
ON book_authors.book_id=authors.author_id;

SELECT books.book_name
FROM book_authors JOIN books
ON book_authors.book_id=books.book_id
WHERE books.book_author="yiran park";
*/
?>