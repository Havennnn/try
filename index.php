<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    
    $servername = "localhost";
    $username = "root";
    $dbname = "mysql";
    
    $conn = mysqli_connect($servername, $username, "", $dbname);
    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    echo "<div class='side-bar'>";
        echo "<h2 class='heading'>LOGIN FORM</h2>";
        echo "<br>";
            echo "<form method='post' action='server.php'>";
                echo "<p class='text'>USERNAME</p><input class='login-inp user' type='text' name='login_username'>";
                echo "<br>";
                echo "<br>";
                echo "<p class='text'>PASSWORD</p><input class='login-inp pass' type='password' name='login_password'>";
                echo "<br>";
                echo "<br>";
                echo "<input class='login-btn buttons' type='submit' name='login_user' value='LOGIN'>";
            echo "</form>";
    echo "</div>";

    echo "<div class='section-side'>
        <h2 class='heading-reg'>REGISTRATION <span class='redf'>FORM</span></h2>
        <form method='post' action='server.php'>
            <input class='reg-inp' type='text' name='reg_username' placeholder='USERNAME'>
            <input class='reg-inp' type='password' name='reg_password' placeholder='PASSWORD'>
            <input class='reg-inp' type='text' name='fname' placeholder='FIRST NAME'>
            <input class='reg-inp' type='text' name='lname' placeholder='LAST NAME'>
            <input class='reg-inp' type='text' name='mi' placeholder='MIDDLE INITIAL'>
            <input class='reg-inp' type='number' name='age' placeholder='AGE'>
            <input class='reg-inp' type='number' name='contact' placeholder='CONTACT NO.'>
            <input class='reg-inp' type='text' name='email' placeholder='EMAIL'>
            <input class='buttons register-btn' type='submit' name='reg_user' value='Register'>;
        </form>
    </div>";
    ?>
</body>
</html>