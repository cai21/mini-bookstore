<?php

include "connection.php";
$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id = '$id'";
$result = mysqli_query($db,$query);
$book = mysqli_fetch_assoc($result);

if(isset($_POST['edit_book'])) {
    $title = trim($_POST['title']);
    $published_at = trim($_POST['published_at']);
    $author = trim($_POST['author']);
    $about = trim(addslashes($_POST['about']));
    $cover = $_FILES['cover'];
    $error = [];

    empty($title) ? $error[] = "Title is required" : "";
    empty($published_at) ? $error[] = "Date is required" : "";
    empty($author) ? $error[] = "Author is required" : "";
    empty($about) ? $error[] = "About is required" : "";


    if(!$error) {
        if(is_uploaded_file($cover['tmp_name'])) {
            $cover_path = "img/".$cover['name'];
            move_uploaded_file($cover['tmp_name'],$cover_path);
            $query = "UPDATE books SET title = '$title', published_at='$published_at', author='$author', about='$about', cover='$cover_path' WHERE id='$id'";
        } else {
            $query = "UPDATE books SET title = '$title', published_at='$published_at', author='$author', about='$about', cover='$cover_path' WHERE id='$id'";
        }
        $result = mysqli_query($db, $query);
        if($result) {
            header("location: index.php");
        } else {
            echo mysqli_connect_error();
        }
    }
}

?>

<?php include 'layout/header.php' ?>

<h1>Book Edit</h1>
<form action="" method="post" enctype="multipart/form-data">
    <?php include "layout/error.php" ?>

    <div class="my-2">
        <label for="">Book Title:</label>
        <input type="text" placeholder="Book title" name="title" class="form-control" value="<?php echo $book['title'] ?>">
    </div>
    <div class="my-2">
        <label for="">Published At:</label>
        <input type="date" name="published_at" class="form-control" value="<?= $book['published_at'] ?>">
    </div>
    <div class="my-2">
        <label for="">Author</label>
        <input type="text" name="author" class="form-control" value="<?= $book['author'] ?>">
    </div>
    <div class="my-2">
        <label for="">About</label>
        <textarea name="about" cols="30" rows="10" class="form-control" placeholder="About the book ...">value="<?= $book['about'] ?>"</textarea>
    </div>
    <div class="my-2">
        <label for="">Photo</label>
        <input type="file" class="form-control" name="cover">
        <img src="<?= $book['cover'] ?>"" alt="" width="150">
    </div>
    <div class="my-2">
        <button type="submit" name="edit_book" class="btn btn-warning">Update</button>
    </div>
</form>

<?php include 'layout/footer.php' ?>