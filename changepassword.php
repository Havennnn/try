<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $logged_in_username = $_SESSION['username'];

    $servername = "localhost";
    $username = "root";
    $dbname = "mysql";

    $conn = mysqli_connect($servername, $username, "", $dbname);
    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $query = "SELECT Password FROM b WHERE Username = '$logged_in_username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['Password'];

        if ($currentPassword == $storedPassword) {
            $updateQuery = "UPDATE b SET Password = '$newPassword' WHERE Username = '$logged_in_username'";
            if (mysqli_query($conn, $updateQuery)) {
                echo "<script>
                alert('Successfully Changed Password');
                window.history.back()
                </script>";
            } else {
                echo "<script>
                alert('Error updating password')
                window.history.back()
                </script>";
                
            }
        } else {
            echo "<script>
            alert('Incorrect Current Password');
            window.history.back()
            </script>";
        }
    } else {
        echo "<script>
            alert('Error updating password')
            window.history.back()
            </script>";
    }

    mysqli_close($conn);
} else {
    header("Location: settings.php");
    exit();
}
?>
