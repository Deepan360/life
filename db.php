<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "anand";
$password = "AnandLife@123";
$dbname = "life";
$port = 3306; 


$conn = new mysqli($servername, $username, $password, $dbname, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
