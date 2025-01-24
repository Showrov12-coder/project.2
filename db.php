<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "registration";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Display a success message (useful during debugging)
// echo "Connected successfully!";
?>
