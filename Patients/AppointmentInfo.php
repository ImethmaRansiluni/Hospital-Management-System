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

// Check if appointment_id is set in GET
if (!isset($_SESSION['appointment_id'])) {
    echo "No appointment found.";
    exit();
}

$appointment_id = $_SESSION['appointment_id'];

// Fetch appointment details from the database
$sql = "SELECT * FROM appointment WHERE appointment_id = '$appointment_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $appointment = mysqli_fetch_assoc($result);

    // Store the staff ID from the appointment into session
    $_SESSION['staff_id'] = $appointment['staff_id']; 

    // Fetch staff details
    $staff_id = $appointment['staff_id'];
    $staff_sql = "SELECT * FROM staff WHERE staff_id = '$staff_id'";
    $staff_result = mysqli_query($conn, $staff_sql);

    if (mysqli_num_rows($staff_result) == 1) {
        $staff = mysqli_fetch_assoc($staff_result);
        $_SESSION['staff_name'] = $staff['staff_name'];  
    } else {
        echo "Staff not found.";
        exit();
    }
} else {
    echo "Appointment not found.";
    exit();
}
?>

<?php include 'header2Patient.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Details</title>
    <link rel="StyleSheet" href="CSSP/StyleSheet-AppointmentInfo.css">
</head>
<body style="background-image: url(../Images/image.png);">
    <div class="appointment-container">
        <h2>Appointment Confirmation</h2>
        <p><strong>Appointment ID:</strong> <?php echo $appointment['appointment_id']; ?></p>
        <p><strong>Doctor:</strong> <?php echo $_SESSION['staff_name']; ?></p> 
        <p><strong>Date:</strong> <?php echo $appointment['appointment_date']; ?></p>
        <p><strong>Time:</strong> <?php echo $appointment['appointment_time']; ?></p>

        <h3>Payment Required: 1000/=</h3>
        <p>Please make a payment to confirm your appointment.</p>

        <a href="OnlinePayments.php" class="button" style="text-decoration: none;">Make Payment Now</a>
    </div>
</body>
</html>

<?php include 'footer1.php'; ?>
