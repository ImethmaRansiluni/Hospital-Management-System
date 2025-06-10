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

// Fetch patient email from patients table
$sql = "SELECT patient_email  FROM patients WHERE patient_id = '$patient_id'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $patient_email = $row['patient_email'];
} else {
    die("Error fetching patient details.");
}

// Fetch appointments based on patient email
$appointment_sql = "SELECT * FROM appointment WHERE patient_APemail = '$patient_email'";
$appointment_result = mysqli_query($conn, $appointment_sql);
?>

<?php include 'header2Patient.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSSP/StyleSheet-ViewAppointment.css">
</head>
<body style="background-image: url(../Images/PatientHistoryGen.jpg);">
<div class="container">
    <h2>Your Appointments</h2>

    <?php if (mysqli_num_rows($appointment_result) > 0) { ?>
    <table>
        <tr>
            <th>Appointment ID</th>
            <th>Staff ID</th>
            <th>Department</th>
            <th>Branch</th>
            <th>Date</th>
            <th>Time</th>
            <th>Confirmed</th>
        </tr>
        <?php while ($appointment = mysqli_fetch_assoc($appointment_result)) { ?>
        <tr>
            <td><?php echo $appointment['appointment_id']; ?></td>
            <td><?php echo $appointment['staff_id']; ?></td>
            <td><?php echo $appointment['staff_department']; ?></td>
            <td><?php echo $appointment['branch']; ?></td>
            <td><?php echo $appointment['appointment_date']; ?></td>
            <td><?php echo $appointment['appointment_time']; ?></td>
            <td><?php echo ($appointment['confirmed'] == 1) ? 'Yes' : 'No'; ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } else { ?>
        <p style="text-align: center; margin-top: 0.5cm; font-size: 18px; color: black;">No Appointment recorded.</p>
    <?php } ?>
</div>
</body>
</html>

<?php include 'footer1.php'; ?>
