<?php
require_once 'db.php';
require_once 'functions.php';
// Extract the fields from the form


$username = $_POST["username"];
$password = $_POST["password"];

if (emptyInputlogin($username, $password) == True) {
    header("location: ../pages/login.html?error=emptyinput");
    exit();
}else {
    $user = loginUser($conn, $username, $password);
    

    if($user) {
        echo "welcom";
    } else {
        echo "Invalid username and password.";
    }
}

