<?php

include 'connection.php';

if(isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $error = [];

    empty($name) ? $error[] = "Name is required" : "";
    empty($email) ? $error[] = "Email is required" : "";
    empty($password) ? $error[] = "Password is required" : "";

    if(!$error) {
        
        $password = md5($password);
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($db, $query);
        if($result) {
            header("location:index.php");
        } else {
            echo mysqli_connect_error();
        }
    }
}

?>

<?php include "layout/header.php" ?>
<h1>Register</h1>
<form action="" method="post">

    <?php include "layout/error.php" ?>

    <div class="my-2">
        <label for="">Name:</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
    </div>
    <div class="my-2">
        <label for="">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
    </div>
    <div class="my-2">
        <label for="">Password:</label>
        <input type="password" name="password" id="" class="form-control" placeholder="Enter Your Pasword">
    </div>
    <div class="my-2">
        <input type="submit" name="register" value="Register" class="btn btn-primary">
    </div>
</form>
<?php include "layout/footer.php" ?>