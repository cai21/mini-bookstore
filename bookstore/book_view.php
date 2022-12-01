<?php

include "connection.php";
$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id='$id'";
$result = mysqli_query($db,$query);
$book = mysqli_fetch_assoc($result);

?>

<?php include 'layout/header.php' ?>

<h1>Details of Book</h1>

<div class="card">
    <img src="<?php echo $book['cover'] ?>" alt="" class="card-img-top" style="object-fit: contain; object-position:center" height="300">
    <div class="card-body">
        <h3 class="card-title"><?php echo $book['title'] ?></h3>
        <div>
            <label for="" class="text-muted">Author:</label>
            <p class="card-text"><?php echo $book['author'] ?></p>
        </div>
        <div>
            <label for="" class="text-muted">Published At:</label>
            <p class="card-text"><?php echo $book['published_at'] ?></p>
        </div>
        <div>
            <label for="" class="text-muted">About:</label>
            <p class="card-text"><?php echo $book['about'] ?></p>
        </div>
    </div>
    <div class="card-footer">
        <a href="index.php" class="btn btn-link">
            &lt;&lt; back to books
        </a>
    </div>
</div>


<?php include 'layout/footer.php' ?>
