<?php
include("database.php");
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acharya Prafulla Chandra Roy Government College Student Portal/admin</title>
    <link rel="icon/image" href="assets/img/Logo.png" class="icon/images">
    <link rel="stylesheet" href="admin2-style.css">
    <script src="https://kit.fontawesome.com/f6a240a355.js" crossorigin="anonymous"></script>
</head>

<body>

    <header style=" box-shadow: 0px 3px 9px #0000006b">
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
                            <a href="display-std.php">
                                <li>Student List</li>
                            </a>
                            <a href="display-tea.php">
                                <li>Teacher List
                                </li>
                            </a>
                        
                            <li>
             <div class="dropdown">
                                  <a href=""> <span class="dropbtn">Add
                                        <i class="fa fa-caret-down"></i>
                                    </span> </a>
                                    <div class="dropdown-content">
                                        <a href="tea-page.php">Add Teacher</a>
                                        <a href="std-page.php">Add Student</a>
                                        <a href="bt-page.php">Add batch</a>
                                        <a href="ac-page.php">Add Course</a>

                                    </div>

                            </li>
                            <li>
                                <div class="dropdown">
                                   <a href=""> <span class="dropbtn">Delete
                                        <i class="fa fa-caret-down"></i>
                                    </span> </a>
                                    <div class="dropdown-content">
                                        <a href="tea-dlt2.php">DeleteTeacher</a>
                                        <a href="std-dlt2.php">DeleteStudent</a>
                                        <a href="display-bt.php">Delete batch</a>
                                        <a href="display-ac.php">Delete Course</a>

                                    </div>

                            </li>



                        </ul>
                    </div>

                </div>
                <ul class="nav-bar">
                <a href="logout.php" class="nav-btn" >
                <button class="nav-t">   Sign out 
                <img src="assets/img/Vector.png" alt="">
                 <span class="first"></span>
                 <span class="second"></span>
                 <span class="third"></span>
                 <span class="fourth"></span>
                    </button></a>
                    <!-- <a href="logout.php" class="nav-btn">
                       Sign out
                        <img src="assets/img/Vector.png" alt="">
                    </a> -->
                    <a href="#"><i class="fa-solid fa-bars" id="menu-icon"></i></a>
                </ul>
            </div>
        </nav>
    </header>
    <!-- main -->
    <section class="first-section">

        <div class="text-container">
            <h2> Welcome to</h2>
            <h1 class="lg_text">Acharya Prafulla Chandra Roy Government College Admin Page</h1>


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
                        <a href="mailto:underrated.cs@gmail.com">
                            <li> underrated.cs@gmail.com
                            </li>
                        </a>
                        <a href="tel:+91-8597976177">
                            <li>
                                +91-8597976177
                            </li>
                        </a>

                    </ul>
                </div>


            </div>
        </div>

    </footer>
    <section class="last-container container">
        <!-- <div class="copyright"> -->
        @copyrighted by APCRGC Students(CS) batch 2021-2024
        <!-- </div> -->
    </section>

</body>

</html>