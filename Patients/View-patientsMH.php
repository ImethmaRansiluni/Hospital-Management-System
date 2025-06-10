<?php
session_start();

if (!isset($_SESSION['patient_id'])) { 
    echo "<script>
    alert('Unauthorized access! Please log in.');
    window.location.href = '../MainViewPages/ChooseLoginRole.php';
</script>";
exit();

}else if (isset($_SESSION['patient_id'])) {

    include 'db_connect.php';

    $patient_id = $_SESSION['patient_id'];

    $sql = "SELECT * FROM medical_history WHERE patient_id = $patient_id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error fetching patient details: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $medical_histories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $medical_histories = [];
    }
} else {
    die("Invalid patient ID.");
}
?>


<?php include 'header2Patient.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Medical History</title>
    <link rel="StyleSheet" href="CSSP/StyleSheet-1Patient.css">
</head>
<body style="background-image: url(../Images/PatientHistoryGen.jpg);">

<div class="container" style="width: auto; margin-top: 3.5cm; margin-bottom: 1cm;">
    <h2>Patient Medical History</h2>

    <?php if (!empty($medical_histories)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Record ID</th>
                    <th>Diagnosis</th>
                    <th>Medications</th>
                    <th>Treatment</th>
                    <th>Doctor Notes</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medical_histories as $medical_history): ?>
                    <tr>
                        <td><?php echo $medical_history['record_id']; ?></td>
                        <td><?php echo $medical_history['diagnosis']; ?></td>
                        <td><?php echo $medical_history['medications']; ?></td>
                        <td><?php echo $medical_history['treatment']; ?></td>
                        <td><?php echo $medical_history['doctor_notes']; ?></td>
                        <td><?php echo $medical_history['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No medical history found for this patient.</p>
    <?php endif; ?>
</div>

<?php include 'footer1.php'; ?>
</body>
</html>
