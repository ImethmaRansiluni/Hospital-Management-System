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
    $patient_id = $_GET['patient_id'];

    $sql = "SELECT * FROM lab_reports WHERE patient_id = $patient_id";
    $result = mysqli_query($conn, $sql);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $report_type = $_POST['report_type'];
        $details = $_POST['details'];

        $sql = "INSERT INTO lab_reports". "(patient_id, report_type,details)" . 
        "VALUES('$patient_id','$report_type', '$details')";

        $result = mysqli_query($conn,$sql);

        if (!$result) {
            $message = "Error: Unable to add record.";
        } else {
            $message = "New medical history record added successfully!";
        }
    }
} else {
    die("Patient ID not provided.");
}
?>

<?php include 'header3Staff.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lab Report</title>
    <link rel="stylesheet" href="CSSS/StyleSheet-UpdateMedicalRecords.css">
</head>
<body style="background-image: url(../Images/PatientHistoryGen.jpg);">

<div class="container" style="margin-top: 3.5cm; margin-bottom: 1cm;">
    <h2>Add Lab Report</h2>

    <div class="patient-info">
        Patient ID: <?php echo $patient_id; ?>
    </div>

    <?php if (!empty($message)): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <div>
            <label for="report_type">Test Type:</label>
            <input type="text" name="report_type" id="report_type" required>
        </div>
        <div>
            <label for="details">Test Result:</label>
            <textarea name="details" id="details" required></textarea>
        </div>
        <div>
            <button type="submit" class="btn-primary">Add Report</button>
            <a href="view-LabReports.php?patient_id=<?php echo $patient_id; ?>" class="btn-secondary"
             style="text-decoration: none;">Back</a>
        </div>
    </form>
</div>

<?php include 'footer1.php'; ?>

</body>
</html>
