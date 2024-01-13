<?php
session_start();
echo "<center>";
echo "<h1> REGISTERED ACCOUNT </h1>";

$servername = "localhost";
$username = "root";
$dbname = "mysql";

$conn = mysqli_connect($servername, $username, "", $dbname);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$table = "CREATE TABLE IF NOT EXISTS b (
    Username VARCHAR(20) NOT NULL,
    Password VARCHAR(20) NOT NULL,
    FirstName VARCHAR(20),  -- Add this line
    LastName VARCHAR(20) NOT NULL,
    MiddleInitial VARCHAR(1),
    Age int(3) NOT NULL,
    ContactNo int(11) NOT NULL,
    Email VARCHAR(25) NOT NULL)";

if (mysqli_query($conn, $table)) {
    echo "Table successfully created";
} else {
    echo "ERROR";
}

echo "<br><br><button onclick='logout()' class='logout-btn buttons'>BACK</button><br><Br>";

$sql = "SELECT Username, Password, FirstName, LastName, MiddleInitial, Age, ContactNo, Email FROM b";
$result = mysqli_query($conn, $sql);
echo "<link rel='stylesheet' href='styles.css'>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<br>===== ACCOUNT =====";
    echo "<br>Username: " . $row['Username'] . "<br>Password: " . $row['Password'] . "<br>First name: " . $row['FirstName'] . "<br>Last Name: " . $row['LastName'] . "<br>Middle Initial: " . $row['MiddleInitial'] . "<br>Age: " . $row['Age'] . "<br>Contact No.: " . $row['ContactNo'] . "<br>Email: " . $row['Email'];
    echo "<br>===================<br>";
}

echo "<script> function logout() {
    window.location.href = 'index.php';
    }
    </script>";
echo "<center>";
?>