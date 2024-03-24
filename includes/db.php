<?php
$dbhost = 'localhost';
$dbUsername = 'root';
$dbPasssword = '12345';
$dbName = 'nexinch';

// create a connection

$conn = new mysqli($dbhost, $dbUsername, "", $dbName);

if(!$conn) {
    die("Connection failed: " .  mysqli_connect_error());
}

