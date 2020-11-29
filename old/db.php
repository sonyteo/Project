<?php
session_start();

$servername = "localhost:3307";
$user = "root";
$pass = "";
$dbname = "letsgo";

$conn = new mysqli($servername, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>