<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// $servername = "sg2plzcpnl458811";
// $username = "anand";
// $password = "AnandLife@123";
// $dbname = "life";

$servername = "localhost";
$username = "root";
$password = "pass@123";
$dbname = "life";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
