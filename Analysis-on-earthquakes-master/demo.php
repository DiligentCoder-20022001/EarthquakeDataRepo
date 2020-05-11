<?php
$servername = "localhost";
$username = "root";
$password = "Siddharth@123";
$database= "earthquakes";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
echo "Connected successfully";
?>