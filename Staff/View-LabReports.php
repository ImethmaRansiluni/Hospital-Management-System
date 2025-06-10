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

    if (!$result) {
        die("Error fetching patient details: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $lab_reports = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $lab_reports = [];
    }
} else {
    die("Invalid patient ID.");
}
?>

<?php include 'header3Staff.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Lab Reports</title>
    <link rel="StyleSheet" href="CSSS/StyleSheet-1Patient.css">
</head>
<body style="background-image: url(../Images/PatientHistoryGen.jpg);">

<div class="container" style="margin-top: 3.5cm; margin-bottom: 1cm;">
    <h2>Patient Lab Reports</h2>

    <div style="text-align: right; margin-bottom: 20px;">
    <a href="Update-LabReports.php?patient_id=<?php echo $patient_id; ?>" class="btn btn-success">New Record</a>
        <a href="View-1Patient.php" class="btn btn-secondary" style="margin-left: 10px;">Back</a>
    </div>

    <?php if (!empty($lab_reports)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Report ID</th>
                    <th>Test Type</th>
                    <th>Test Result</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lab_reports as $lab_report): ?>
                    <tr>
                        <td><?php echo $lab_report['labrec_id']; ?></td>
                        <td><?php echo $lab_report['report_type']; ?></td>
                        <td><?php echo $lab_report['details']; ?></td>
                        <td><?php echo $lab_report['date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No lab reports found for this patient.</p>
    <?php endif; ?>
</div>

<?php include 'footer1.php'; ?>
</body>
</html>
