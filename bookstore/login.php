<?php

session_start();

include 'connection.php';

if(isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $error = [];

    empty($email) ? $error[] = "Email is required" : "";
    empty($password) ? $error[] = "Password is required" : "";

    if(!$error) {

        $password = md5($password);

        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";

        $result = mysqli_query($db, $query);

        if($result) {
            $user = mysqli_fetch_assoc($result);
            if($user) {
                $_SESSION['auth'] = true;
                $_SESSION['name'] = $user['name'];
                header("location: index.php");
            } else {
                $error[] = "Email or Password is wrong. Please Try Again...";
            }
        } else {
            echo mysqli_connect_error();
        }
    }
}

?>

<?php include "layout/header.php" ?>
<h1>Login</h1>
<form action="" method="post">
    <?php include "layout/error.php" ?>
    <div class="my-2">
        <label for="">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
    </div>
    <div class="my-2">
        <label for="">Password:</label>
        <input type="password" name="password" id="" class="form-control" placeholder="Enter Your Pasword">
    </div>
    <div class="my-2">
        <input type="submit" name="login" value="Login" class="btn btn-success">
    </div>
</form>
<?php include "layout/footer.php" ?>