<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['select-type'];

    // Query to fetch the user details
    $sql = "SELECT * FROM staff WHERE staff_email='$email' AND staff_password='$password' AND staff_type='$type'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['staff_id'] = $row['staff_id'];

        if ($row['staff_type'] == 'admin') {
            header("Location: ../Admin/HomePage-Admin.php");
            exit();
        } elseif ($row['staff_type'] == 'staff') {
            header("Location: ../Staff/HomePage-Staff.php");
            exit();
        }
    }  else {
        echo "<script>alert('Invalid credentials or user type!'); window.location.href='Login-Staff.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Your form is not submitted yet, please fill the form and visit again.'); 
    window.location.href='Login-Staff.php';</script>";
    exit();
}
?>
