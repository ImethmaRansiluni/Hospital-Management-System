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

    $sql = "SELECT * FROM medical_history WHERE patient_id = $patient_id";
    $result = mysqli_query($conn, $sql);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $diagnosis = $_POST['diagnosis'];
        $medications = $_POST['medications'];
        $treatment = $_POST['treatment'];
        $doctor_notes = $_POST['doctor_notes'];

        $sql = "INSERT INTO medical_history". "(patient_id, diagnosis,medications,treatment,doctor_notes)" . 
        "VALUES('$patient_id','$diagnosis', '$medications', '$treatment', '$doctor_notes')";

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
    <title>Add Medical History</title>
    <link rel="stylesheet" href="CSSS/StyleSheet-UpdateMedicalRecords.css">
</head>
<body style="background-image: url(../Images/PatientHistoryGen.jpg);">

<div class="container" style="margin-top: 3.5cm; margin-bottom: 1cm;">
    <h2>Add Medical History</h2>

   <div class="patient-info">
        Patient ID: <?php echo $patient_id; ?>
    </div>

    <?php if (!empty($message)): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <div>
            <label for="diagnosis">Diagnosis:</label>
            <input type="text" name="diagnosis" id="diagnosis" required>
        </div>
        <div>
            <label for="medications">Medications:</label>
            <input type="text" name="medications" id="medications" required>
        </div>
        <div>
            <label for="treatment">Treatment:</label>
            <input type="text" name="treatment" id="treatment" required>
        </div>
        <div>
            <label for="doctor_notes">Doctor Notes:</label>
            <textarea name="doctor_notes" id="doctor_notes" required></textarea>
        </div>
        <div>
            <button type="submit" class="btn-primary">Add Record</button>
            <a href="view-medicalhistory.php?patient_id=<?php echo $patient_id; ?>" class="btn-secondary" style="text-decoration: none;">Back</a>
        </div>
    </form>
</div>

<?php include 'footer1.php'; ?>

</body>
</html>

