<?php
$servername = "localhost";
$username = "root";
$password = ""; // enter your password here if you have one
$dbname = "register_college";
$port = 3307; // enter your MySQL port number here

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  // echo "Connected successfully";
?>
