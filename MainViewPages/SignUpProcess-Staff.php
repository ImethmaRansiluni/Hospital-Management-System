<?php
session_start();
include 'db_connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $type = $_POST['select-type'];

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match. Please try again.'); window.location.href='SignUp-Staff.php';</script>";
        exit();
    }

    $sql_check = "SELECT * FROM staff WHERE staff_email='$email' AND staff_type='$type'";
    $result = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        
        $row = mysqli_fetch_assoc($result);
        
        if (empty($row['staff_password']) && !empty($password)) {
            
            $sql_update = "UPDATE staff SET staff_password='$password' WHERE staff_email='$email' AND staff_type='$type'";
            if (mysqli_query($conn, $sql_update)) {
                echo "<script>alert('Password set successfully. Please log in.'); window.location.href='Login-Staff.php';</script>";
            } else {
                echo "<script>alert('Error updating password. Please try again.'); window.location.href='SignUp-Staff.php';</script>";
            }
        } else {
            echo "<script>alert('Email already registered. Please log in with your credentials.');
             window.location.href='Login-Staff.php';</script>";
        }
    } else {
        echo "<script>alert('Email not registered. Please log in using your credentials.'); 
        window.location.href='Login-Staff.php';</script>";
    }
} else {
    echo "<script>alert('Invalid form submission.'); window.location.href='SignUp-Staff.php';</script>";
}
?>
