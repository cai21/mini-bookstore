<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "bookstore";

$db = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if(!$db) {
    echo mysqli_connect_error();
}