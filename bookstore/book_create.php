<?php

include "connection.php";
if(isset($_POST['create_book'])) {
    // print_r($_POST);
    $title = trim($_POST['title']);
    $published_at = trim($_POST['published_at']);
    $author = trim($_POST['author']);
    $about = trim(addslashes($_POST['about']));
    $cover = $_FILES['cover'];
    $error = [];

    // if($title == "") {
        // $error[] = "Title is required";
    // }
    // if(empty($title)) {
        // $error[] = "Title is required";
    // }

    empty($title) ? $error[] = "Title is required" : "";
    empty($published_at) ? $error[] = "Date is required" : "";
    empty($author) ? $error[] = "Author is required" : "";
    empty($about) ? $error[] = "About is required" : "";
    !is_uploaded_file($cover['tmp_name']) ? $error [] = "Photo need to upload" : "";

    if(!$error) {
        $cover_path = "img/".$cover['name'];

        $query = "INSERT INTO books (title, published_at, author, about, cover) VALUES ('$title', '$published_at', '$author', '$about', '$cover_path')";

        move_uploaded_file($cover['tmp_name'],$cover_path);

        $result = mysqli_query($db, $query);

        if($result) {
            header("location:index.php");
        } else {
            echo mysqli_connect_error();
        }
    }
}

?>

<?php include 'layout/header.php' ?>

<h1>Book Create</h1>
<form action="" method="post" enctype="multipart/form-data">

    <!-- error  -->
    <?php include "layout/error.php" ?>

    <div class="my-2">
        <label for="">Book Title:</label>
        <input type="text" placeholder="Book title" class="form-control" name="title">
    </div>
    <div class="my-2">
        <label for="">Published At</label>
        <input type="date" name="published_at" class="form-control">
    </div>
    <div class="my-2">
        <label for="">Author</label>
        <input type="text" name="author" class="form-control">
    </div>
    <div class="my-2">
        <label for="">About</label>
        <textarea name="about" cols="30" rows="10" class="form-control" placeholder="About the book ..."></textarea>
    </div>
    <div class="my-2">
        <label for="">Photo</label>
        <input type="file" class="form-control" name="cover">
    </div>
    <div class="my-2">
        <button type="submit" name="create_book" class="btn btn-primary">Add</button>
    </div>
</form>

<?php include 'layout/footer.php' ?>