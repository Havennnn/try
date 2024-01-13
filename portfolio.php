<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-porfolio.css">
    <title>Personal Website (Pure HTML & CSS)</title>
</head>
<body>
    <div class="grid">
        <div class="side-bar">
            <div class="img-holder">
                <img src="1by1.jpg" class="profile-pic">
            </div>
            <p class="name"> Marable, Latrell R. </p>
            <p class="desc"> Aspiring Full Stack Web-Developer </p>
            <nav class="navbar">
                <div class="collapse">
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About Me</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>   
                        <li><a href="#contact">Contanct</a></li>
                        <li><a href="settings.php">Setting</a></li>
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
                                <img class="hidden-profile" src="1by1.jpg" alt="cute">
                            </div>
                            <h1 class="hidden-name">Marable, Latrell R.</h1>
                            <p class="hidden-desc">Aspiring full-stack Web-Developer</p>
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#about">About Me</a></li>
                                <li><a href="#portfolio">Portfolio</a></li>   
                                <li><a href="#contact">Contanct</a></li>
                                <li><a href="settings.php">Setting</a></li>
                                <button onclick="logout()" class="logout-btn buttons">Logout</button>
                            </ul>
                        </div>
                    </label>
                </div>
            </section>
            
            <section class="home-section" id="home">
                
                
                <h1 class="intro">HII <span style="color:#00bfff;">My Name is </span><span class="coffee" style="color:#ff4c68;">Latrell Marable</span>,<br></h1>
                <p class="intro-desc">my dreams is to become a <br> Web Developer<br> in the future</p>
                <div class="btn-holder">
                    <button class="download-btn buttons"><a href="resume.pdf" download> download </a> </button>
                    <button class="portolio-btn buttons"><a href="resume.pdf" target="_blank"> view </a>
                </div>
            </section>
            
            <section class="about-section" id="about">
                <h1 class="about-main">Who am I?</h1>
                <p class="about-body">I am <span class="about-name">Marable, Latrell</span> aspiring Web-Developer, and 10 years from now I can see myself as a full-stack web developer that most company will need. </p>
                
                <h3 class="about-skill" style="color:black;">My Expertise</h3>
                <div class="about-skills-holder">
                    <img class="expertise" src="HTML.png" alt="html">
                    <img class="expertise" src="CSS.png" alt="css">
                    <img class="expertise" src="Javascript.png" alt="js">
                    <img class="expertise" src="Bt.png" alt="bootstrap">
                </div>
            </section>
            
            <section class="portfolio-section" id="portfolio">
                <div class="highlight-title">
                    <h1 class="portfolio-title">My <span class="portfolio-title-bold">Portfolio</span></h1>
                </div>
                <div class="portfolio-skills-holder">
                    <div class="portfolio-one portfolio-box">
                        <h1 class="portfolio-name">Tin<span style="color: #ff4c68">Dog</span></h1>
                        <img class="portfolio-border portfolio-tindog" src="TinDog.png" alt="html" height="200" width="350">
                        <p class="portfolio-desc">Get ready to embark on an unforgettable journey with TinDog and let the magic of love unfold before your eyes.</p>
                        <a class="button-tindog portfolio-btn" href="tindog.html"> Visit </a>
                    </div>
                    <div class="portfolio-two portfolio-box">
                        <h1 class="portfolio-name">Lit<span style="color: #00bfff">Cat</span></h1>
                        <img class="portfolio-border portfolio-litcat" src="LitCat.png" alt="html" height="200" width="350">
                        <p class="portfolio-desc">The purrfect dating app for your feline pets! Join the vibrant community of cat where you can swipe right on adorable profiles</p>
                        <a class="button-litcat portfolio-btn" href="litcat.html"> Visit </a>
                    </div>
                </div>
            </section>
            
            <footer class="footer-section" id="contact">
                <div class="footer-img-holder">
                    <img class="footer-icons" src="fb.png" alt="fb">
                    <img class="footer-icons" src="instagram.png" alt="ig">
                    <img class="footer-icons" src="twitter.png" alt="twt">
                </div>
                <Br>
                    <p class="footerinfo" style="font-weight: bold; text-align: center; color: black;"> Info | Services | Email Me!</p>
            </footer>
                
            </div>
            
        </div>

        <script>
            function logout() {
                window.location.href = 'index.php';
            }
        </script>
    </body>
    </html>

<?php
mysqli_close($conn);
?>