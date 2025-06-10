<?php
$servername = "localhost"; // your server name
$username = "root";        // your database username
$password = "";            // your database password
$dbname = "carecompassdb";      // your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) { 
    die('Could not connect: ' . mysqli_connect_error());
}

?>
