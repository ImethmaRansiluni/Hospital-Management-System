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
$sql = "SELECT patient_email FROM patients WHERE patient_id = '$patient_id'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $patient_email = $row['patient_email'];
} else {
    die("Error fetching patient details.");
}

// Fetch payments based on patient email
$payment_sql = "SELECT * FROM payments WHERE email = '$patient_email'";
$payment_result = mysqli_query($conn, $payment_sql);
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
    <h2>Your Payments</h2>

    <?php if (mysqli_num_rows($payment_result) > 0) { ?>
    <table>
        <tr>
            <th>NIC</th>
            <th>Payment For</th>
            <th>Bill ID</th>
            <th>Card Number</th>
            <th>Amount</th>
            <th>Created At</th>
            <th>Confirmed</th>
        </tr>
        <?php while ($payment = mysqli_fetch_assoc($payment_result)) { ?>
        <tr>
            <td><?php echo $payment['nic']; ?></td>
            <td><?php echo $payment['payment_for']; ?></td>
            <td><?php echo $payment['bill_id']; ?></td>
            <td><?php echo $payment['card_number']; ?></td>
            <td><?php echo $payment['amount']; ?></td>
            <td><?php echo $payment['created_at']; ?></td>
            <td><?php echo ($payment['confirmed'] == 1) ? 'Yes' : 'Pending'; ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } else { ?>
        <p style="text-align: center; margin-top: 0.5cm; font-size: 18px; color: black;">No Paymeent recorded.</p>
    <?php } ?>
</div>
</body>
</html>

<?php include 'footer1.php'; ?>
