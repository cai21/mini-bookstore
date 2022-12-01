<?php

include 'connection.php';
$result = mysqli_query($db, "SELECT * FROM books");

?>

<?php include "layout/header.php" ?>

        <h1>All Books</h1>
        <table class="table align-middle">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Book Title</td>
                    <td>Book Author</td>
                    <td>Published At</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $book) : ?>
                <tr>
                    <td><?php echo $book['id'] ?></td>
                    <td><?php echo $book['title'] ?></td>
                    <td><?php echo $book['author'] ?>Sam</td>
                    <td><?php echo $book['published_at'] ?>12/12/21</td>
                    <td class="text-center">
                        <a href="book_edit.php?id=<?php echo $book['id'] ?>" class="btn btn-link text-warning">
                            <i class="bi bi-pencil-fill me-1"></i>Edit
                        </a>
                        <a href="book_delete.php?id=<?php echo $book['id'] ?>" class="btn btn-link text-danger">
                            <i class="bi bi-trash3"></i>Delete
                        </a>
                        <a href="book_view.php?id=<?php echo $book['id'] ?>" class="btn btn-link text-success">
                            <i class="bi bi-info-circle me-1"></i>View
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

<? include "layout/footer.php" ?>