<?php
session_start();
include 'db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
// Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM patients WHERE patient_email='$email' AND patient_password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['patient_id'] = $row['patient_id'];
        header("Location: ../Patients/HomePage-Patient.php");
    } 
    else{
        echo "<script>
        alert('Invalid Login Details.');
        window.location.href = 'ChooseLoginRole.php';
    </script>";
    }
}
?>
