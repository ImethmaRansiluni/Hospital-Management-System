<?php
$servername = "localhost"; // server name
$username = "root";        // database username
$password = "";            // database password
$dbname = "carecompassdb";      // database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) { 
    die('Could not connect: ' . mysqli_connect_error());
}

?>
