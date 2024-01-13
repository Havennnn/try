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


$query = "SELECT * FROM b WHERE Username = '$logged_in_username'";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    $username = $row['Username'];
    $fname = $row['FirstName'];
    $lname = $row['LastName'];
    $mi = $row['MiddleInitial'];
    $a = $row['Age'];
    $contact = $row['ContactNo'];
    $email = $row['Email'];

} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-porfolio.css">
    <title>Personal Website (Pure HTML & CSS)</title>

    <style>

        body {
            text-align: center;
        }

        .heading-reg {
            color: #00bfff;
            font-size: 7vh;
        }

        .redf {
            color: #ff4c68;
        }

        .reg-inp {
            text-align: center;
            font-size: 14px;
            border-radius: 6px;
            line-height: 1.5;
            padding: 5px 10px;
            transition: box-shadow 100ms ease-in, border 100ms ease-in, background-color 100ms ease-in;
            border: 2px solid #dee1e2;
            color: rgb(14, 14, 16);
            background: #dee1e2;
            display: block;
            margin-top: 10px;
            height: 20px;
            width: 40vh;
            :hover {
                border-color: #ccc;
            }
            :focus{
                border-color: #9147ff;
                background: #fff;
            }
        }

        .register-btn {
            margin-top: 20px;
            color: #ff4c68;
            border: 1px solid #ff4c68;
            width: 200px;
        }

        .register-btn:hover {
            border-color: #ff4c68;
            background-color: white;
            color: #ff4c68;
        }

        .acc-details {
            font-weight: bold;
            margin-top: 10px;
            font-size: 20px;
        }

    </style>
</head>
<body>
    

<div class="grid">
        <div class="side-bar">
            <div class="img-holder">
                <img src="./pics/1by1.jpg" class="profile-pic">
            </div>
            <p class="name"> Marable, Latrell R. </p>
            <p class="desc"> Aspiring Full Stack Web-Developer </p>
            <nav class="navbar">
                <div class="collapse">
                    <ul>
                        <li><a href="portfolio.php#home">Home</a></li>
                        <li><a href="portfolio.php##about">About Me</a></li>
                        <li><a href="portfolio.php##portfolio">Portfolio</a></li>   
                        <li><a href="portfolio.php##contact">Contanct</a></li>
                        <li><a href="#">Setting</a></li>
                        <li><button onclick="logout()" class="logout-btn buttons">Logout</button></li>
                    </ul>
                </div>
            </nav>
        </div>
        
        <div class="section-side">
            
            <section class="hidden-navbar">
                <div class="menu-icon">
                    <label for="menu"><span class="icon">MENU</span></i>
                        <input type="checkbox" id="menu">
                        <div id="nav">
                            <div class="hidden-profile-holder">
                                <img class="hidden-profile" src="./pics/1by1.jpg" alt="cute">
                            </div>
                            <h1 class="hidden-name">Marable, Latrell R.</h1>
                            <p class="hidden-desc">Aspiring full-stack Web-Developer</p>
                            <ul>
                                <li><a href="portfolio.php#home" class="active">Home</a></li>
                                <li><a href="portfolio.php##about">About Me</a></li>
                                <li><a href="portfolio.php##portfolio">Portfolio</a></li>   
                                <li><a href="portfolio.php##contact">Contanct</a></li>
                                <li><a href="#">Setting</a></li>
                                <button onclick="logout()" class="logout-btn buttons">Logout</button>
                            </ul>
                        </div>
                    </label>
                </div>
            </section>
            
            <center>
                <<h1 class='heading-reg'> Account <span class='redf'>Details</span></h1>

            <p class="acc-details"> Username: <?php echo $username; ?></p>
            <p class="acc-details"> First Name: <?php echo $fname; ?></p>
            <p class="acc-details"> Last Name: <?php echo $lname; ?></p>
            <p class="acc-details"> Middle Initial: <?php echo $mi; ?></p>
            <p class="acc-details"> Age: <?php echo $a; ?></p>
            <p class="acc-details"> Contact No.: <?php echo $contact; ?></p>
            <p class="acc-details"> Email: <?php echo $email; ?></p>

                <br>

                <form method="post" action="changepassword.php">
                <h1 class='heading-reg'> Change <span class='redf'>Password</span></h1>
                    <input class='reg-inp' type="password" name="current_password" required PLACEHOLDER="Current Password">
                    <input class='reg-inp' type="password" name="new_password" required PLACEHOLDER="New Password">
                    <input class='buttons register-btn' type="submit" value="Change Password" class="buttons">
                </form>

                <br>

                <form method="post" action="deleteaccount.php">
                <input class='buttons delete-btn' type="submit" value="Delete Account" class="buttons">
                </form> 
            </center>

        <script>
            function logout() {
                window.location.href = 'index.php';
            }
        </script>
    </body>
    </html>