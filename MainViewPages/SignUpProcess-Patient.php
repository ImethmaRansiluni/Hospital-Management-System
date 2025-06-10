<?php
session_start();

if (isset($_POST['submit'])) {
    include("db_connect.php");

    $patient_name = $_POST['fullname'];
    $patient_email = $_POST['email'];
    $nic = $_POST['nic'];
    $contact_info = $_POST['contact'];
    $patient_password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if ($patient_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.location.href='SignUp-Patient.php';</script>";
        exit();
    }

    // Check if email or NIC already exists
    $check_query = "SELECT * FROM patients WHERE patient_email = '$patient_email' OR nic = '$nic'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0)
     {
        // Email or NIC found, check if the password is set
        $existing_patient = mysqli_fetch_assoc($check_result);

        if ($existing_patient['patient_password'] != '')
        
        {
            // Password is already set
            echo "<script>alert('An account already exists with this email or NIC. Please log in.');
             window.location.href='Login-Patient.php';</script>";
        } 
        else{
            
            // Password is not set, complete signup
            $update_sql = "UPDATE patients SET patient_password = '$patient_password' WHERE 
            patient_email = '$patient_email' OR nic = '$nic'";

            if (mysqli_query($conn, $update_sql)) {
                // Get the last inserted patient ID
                $patient_id = $existing_patient['patient_id'];

                // Store session variables
                $_SESSION['patient_id'] = $patient_id;
                $_SESSION['patient_email'] = $patient_email;
                $_SESSION['patient_name'] = $patient_name;

                // Redirect to homepage
                header("Location: ../Patients/HomePage-Patient.php");
                exit();
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='SignUp-Patient.php';</script>";
                exit();
            }
        }
        exit();
    }

    // Insert new user
    $sql = "INSERT INTO patients (patient_name, patient_email, nic, contact_info, patient_password) 
            VALUES ('$patient_name', '$patient_email', '$nic', '$contact_info', '$patient_password')";

    if (mysqli_query($conn, $sql)) {
    // Get the last inserted patient ID
    $patient_id = mysqli_insert_id($conn);

    // Store session variables
    $_SESSION['patient_id'] = $patient_id;
    $_SESSION['patient_email'] = $patient_email;
    $_SESSION['patient_name'] = $patient_name;

    // Redirect to homepage
    header("Location: ../Patients/HomePage-Patient.php");
    exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='SignUp-Patient.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Your form is not submitted yet, please fill the form and visit again.'); 
    window.location.href='SignUp-Patient.php';</script>";
    exit();
}
?>
