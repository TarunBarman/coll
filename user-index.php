
<?php
include("database.php");
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acharya Prafulla Chandra Roy Government College Student Portal</title>
    <link rel="icon/image" href="assets/img/Logo.png" class="icon/images">
    <link rel="stylesheet" href="admin-style.css">
    <script src="https://kit.fontawesome.com/f6a240a355.js" crossorigin="anonymous"></script>
</head>

<body>


    <header>
        <nav>
            <div class="nav-container">
                <!-- <div class="nav-logo"> -->

                <img src="assets/img/logo.png" alt="logo">
                <!-- </div> -->
                <div class="nav-list">
                    <div class="nav-list1">
                        <ul class="nav-list">
                            <a href="#hero">
                                <li>Home</li>
                            </a>
                            <li>
                            <div class="dropdown">
                                  <a href=""> <button class="dropbtn">Registration
                                        <i class="fa fa-caret-down"></i>
                                    </button> </a>
                                    <div class="dropdown-content">
                                        <a href="tea-page.php">Teacher</a>
                                        <a href="std-page.php">Student</a>

                                    </div>

                            </li>
            
                            <a href="cont-index.php">
                                <li>Contact Us
                                </li>
                            </a>

                            <a href="team-page.php">
                                <li>About Us
                                </li>
                            </a>

                        </ul>
                    </div>
                </div>
                <ul class="nav-bar">
                    <a href="logout.php" class="nav-btn">
                        Sign out
                        <img src="assets/img/Vector.png" alt="">
                    </a>
                    <a href="#"><i class="fa-solid fa-bars" id="menu-icon"></i></a>
                    <!-- <div class="mob-bar">
                        <i class="fa-solid fa-bars"></i>
                    </div> -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- main -->
    <section class="first-section">

        <div class="text-container">
            <h2> Welcome to</h2>
            <h1 class="lg_text">Acharya Prafulla Chandra Roy Government College Student Portal</h1>
             <div class="explore-hero">
                <a href="team-page.php"><button class="btn-hero"> 
                 Explore Now
            
                    </button></a>
                <a href="https://youtu.be/mX0wgQVTNLw?si=0meYLCKSeyNVEWbu">
                    <span class="watch-view"><i class="fa-regular fa-circle-play"
                            style="color: #f4712a;"></i></span>
                    Watch View</a>
            </div>

        </div>
    </section>

    <!-- <footer>
    <div class="end">
        <h5>Project by APCRGC Team</h5>
    </div>
    </footer> -->
    <footer>
        <div class="footer-container container">
            <div class="footer-logo">

                <a href="#"> <img src="assets/img/Logo.png" alt=""> </a>
                <p>
                    Acharya Prafulla Chandra Roy Government College Student Portal</p>
                <div class="social-link">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"> <i class="fa-brands fa-instagram"></i></a>
                    <a href="#"> <i class="fa-brands fa-twitter"></i></a>

                </div>

            </div>
            <div class="footer-content">
                <div class="footer-list">

                    <ul>
                        <!-- apcrgc.admission@gmail -->
                        <a href="mailto:underrated.cs@gmail.com">
                            <li> underrated.cs@gmail.com
                            </li>
                        </a>
                        <a href="tel:+91-353-2571340">
                            <li>
                                +91-353-2571340
                            </li>
                        </a>

                    </ul>
                </div>


            </div>
        </div>

    </footer>
    <section class="last-container container">
      <!-- <div class="copyright"> -->
            @copyrighted by APCRGC Student(cs) batch 2021-2024
        <!-- </div> -->
    </section>
<!-- script -->

</body>

</html>