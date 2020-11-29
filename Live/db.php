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

//Set Language variable
if (isset($_GET['lang']) && !empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];

    if (isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']) {
        echo "<script type='text/javascript'>location.reload();</script>";
    }
}

//include language file
if (isset($_SESSION['lang'])) {
    include "lang_" . $_SESSION['lang'] . ".php";
} else {
    $_SESSION['lang'] = "en";
    include "lang_en.php";
}
?>