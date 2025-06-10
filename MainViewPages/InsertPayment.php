<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $payment_for = $_POST['payment_for'];
    $bill_id = $_POST['bill_id'];
    $card_number = $_POST['card_number'];
    $amount = $_POST['amount'];

    // Insert into database
    $sql = "INSERT INTO payments (email, nic, payment_for, bill_id, card_number, amount, confirmed) 
            VALUES ('$email', '$nic', '$payment_for', '$bill_id', '$card_number', '$amount', '0')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Payment submitted successfully!'); window.location='HomePage.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location='HomePage.php';</script>";
    }
}
?>
