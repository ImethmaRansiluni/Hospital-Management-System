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

if (isset($_POST['submit'])) {
    $patient_name = $_POST['patient_name'];
    $contact_info = $_POST['contact_info'];
    $patient_email = $_POST['patient_email'];
    $nic = $_POST['nic'];
    $patient_birthday = $_POST['patient_birthday'] ?? NULL;
    $patient_age = $_POST['patient_age'] ?? NULL;
    $imgPath = NULL;

    // Required fields validation
    if (empty($patient_name) || empty($contact_info) || empty($patient_email) || empty($nic)) {
        echo "<script>alert('Name, Contact, Email, and NIC are required.'); window.location.href='NewPatient.php';</script>";
        exit();
    }

    // Insert into database
    $sql = "INSERT INTO patients (patient_name, contact_info, patient_email, nic, patient_birthday, patient_age, patientsimgPath) 
            VALUES ('$patient_name', '$contact_info', '$patient_email', '$nic', 
                    " . ($patient_birthday ? "'$patient_birthday'" : "NULL") . ", 
                    " . ($patient_age ? "'$patient_age'" : "NULL") . ", 
                    " . ($imgPath ? "'$imgPath'" : "NULL") . ")";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Patient added successfully!'); window.location.href='NewPatient.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='NewPatient.php';</script>";
    }
}
?>
