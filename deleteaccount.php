<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$logged_in_username = $_SESSION['username'];

$servername = "localhost";
$username = "root";
$dbname = "mysql";

$conn = mysqli_connect($servername, $username, "", $dbname);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$query = "DELETE FROM b WHERE Username = '$logged_in_username'";
if (mysqli_query($conn, $query)) {
    session_destroy();
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting account: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
