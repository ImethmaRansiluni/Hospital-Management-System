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

if (isset($_GET['patient_id'])) {

    $_SESSION['patient_id'] = $_GET['patient_id'];
    $patient_id = $_GET['patient_id'];

} elseif (isset($_SESSION['patient_id'])) {

    $patient_id = $_SESSION['patient_id'];

} else {
    echo "No patient selected.";
    exit();
}


$sql = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $patient = mysqli_fetch_assoc($result);
} else {
    die("Error fetching patient details.");
}
?>

<?php include 'header3Staff.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
    <link rel="StyleSheet" href="CSSS/StyleSheet-1Patient.css">
    <style>
        .staff-image {
            flex: 1;
            text-align: center;
            margin-top: -1cm;
        }
    </style>
</head>
<body style="background-image: url(../Images/PatientHistoryGen.jpg);">

<div class="container" style="margin-top: 3.5cm; margin-bottom: 1cm;">
    <h2>Patient Profile</h2>

    <div class="button-container" style="margin-top: -0.3cm;">
        <form method="GET" action="View-MedicalHistory.php" style="display: inline;">
            <input type="hidden" name="patient_id" value="<?php echo $patient['patient_id']; ?>">
            <button type="submit" class="btn btn-primary">Medical History</button>
        </form>
        <form method="GET" action="View-LabReports.php" style="display: inline;">
            <input type="hidden" name="patient_id" value="<?php echo $patient['patient_id']; ?>">
            <button type="submit" class="btn btn-secondary">Lab Reports</button>
        </form>
        <form method="GET" action="View-Patients.php" style="display: inline;">
            <button type="submit" class="btn btn-primary">Back</button>
        </form>
    </div>
    <br><br>

    <div class="staff-image">
        <?php 
            if ($patient['patientsimgPath']) {
                echo '<img src="../PatientImages/' . $patient['patientsimgPath'] . '"  style="width: 150px; height: 150px;">';
            } else {
                 echo '<p>No image uploaded</p>';
            }
        ?>
    </div>
    <ul class="patient-details">
        <li><strong>ID:</strong> <?php echo $patient['patient_id']; ?></li>
        <li><strong>Name:</strong> <?php echo $patient['patient_name']; ?></li>
        <li><strong>Email:</strong> <?php echo $patient['patient_email']; ?></li>
        <li><strong>Contact Info:</strong> <?php echo $patient['contact_info']; ?></li>
        <li><strong>NIC:</strong> <?php echo $patient['nic']; ?></li>
        <li><strong>Age:</strong> <?php echo $patient['patient_age']; ?></li>
    </ul>
</div>

<?php include 'footer1.php'; ?>
</body>
</html>
