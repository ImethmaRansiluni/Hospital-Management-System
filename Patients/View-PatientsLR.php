<?php
session_start();

if (!isset($_SESSION['patient_id'])) { 
    echo "<script>
    alert('Unauthorized access! Please log in.');
    window.location.href = '../MainViewPages/ChooseLoginRole.php';
</script>";
exit();
}
    include 'db_connect.php';

    $patient_id = $_SESSION['patient_id'];

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

?>

<?php include 'header2Patient.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Lab Reports</title>
    <link rel="StyleSheet" href="CSSP/StyleSheet-1Patient.css">
</head>
<body style="background-image: url(../Images/PatientHistoryGen.jpg);">

<div class="container" style="margin-top: 3.5cm; margin-bottom: 1cm;">
    <h2>Patient Lab Reports</h2>

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
