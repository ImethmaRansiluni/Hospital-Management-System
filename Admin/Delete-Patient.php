<?php
session_start();

if (!isset($_SESSION['staff_id'])) { 
    echo "<script>
    alert('Unauthorized access! Please log in.');
    window.location.href = '../MainViewPages/ChooseLoginRole.php';
    </script>";
    exit();
}

include 'db_connect.php';

// Check if patient_id or staff_id is set
if (isset($_GET['patient_id'])) {
    $id = $_GET['patient_id'];
    $sql = "DELETE FROM patients WHERE patient_id = '$id'";
    $redirect = "View-Admin-Patients.php";
} elseif (isset($_GET['staff_id'])) {
    $id = $_GET['staff_id'];
    $sql = "DELETE FROM staff WHERE staff_id = '$id'";
    $redirect = "View-Admin-Staff.php";
} else {
    die("No valid ID provided.");
}

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: $redirect");
    exit();
} else {
    echo "Deletion failed for ID: " . $id . ". Please try again!";
}
