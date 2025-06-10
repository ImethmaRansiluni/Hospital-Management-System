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
?>

<?php include 'header4Admin.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <link rel="stylesheet" href="CSSA/NewUser.css">
</head>
<body style="background-image: url(../Images/PatientHistory4.jpg);">

<div class="container">
    <h2>Add Patient</h2>
    <form action="Add-Patient.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="patient_name">Full Name:</label>
            <input type="text" name="patient_name" required>
        </div>
        
        <div class="form-group">
            <label for="contact_info">Contact Information:</label>
            <input type="text" name="contact_info" required>
        </div>

        <div class="form-group">
            <label for="patient_email">Email:</label>
            <input type="email" name="patient_email" required>
        </div>

        <div class="form-group">
            <label for="nic">NIC:</label>
            <input type="text" name="nic" required>
        </div>

        <div class="form-group">
            <label for="patient_birthday">Birthday (Optional):</label>
            <input type="date" name="patient_birthday">
        </div>

        <div class="form-group">
            <label for="patient_age">Age (Optional):</label>
            <input type="number" name="patient_age" min="0">
        </div>

        <input type="submit" name="submit">
    </form>

    <button type="button"><a href="View-Admin-Patients.php" style="color: white; text-decoration: none;">Back</a></button>
</div>

</body>
</html>

<?php include 'footer1.php'; ?>
