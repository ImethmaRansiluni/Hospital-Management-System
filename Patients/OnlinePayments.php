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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Payment</title>
    <link rel="stylesheet" href="CSSP/StyleSheet-OnlinePayments.css">
</head>

    
<?php include 'header2Patient.php'; ?>

<body class="Background1" style="background-image: url(../Images/doctor3.jpg);">
    <div id="header"></div>
    <div class="payment-container">
        <h2>Online Payment</h2>
        <form action="InsertPayment.php" method="POST">
            <div class="form-row">
                <div class="form-column" style="line-height: 30px;">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>NIC:</label>
                        <input type="text" name="nic" required>
                    </div>
                    <div class="form-group">
                        <label>Payment For:</label>
                        <select name="payment_for" required>
                            <option value="Appointment">Appointment</option>
                            <option value="Lab Reports">Lab Reports</option>
                            <option value="Doctor Fees">Doctor Fees</option>
                        </select>
                    </div>
                </div>
                <div class="form-column">
                    <div class="form-group">
                        <label>BILL No:</label>
                        <input type="text" name="bill_id" required>
                    </div>
                    <div class="form-group">
                        <label>Card Number:</label>
                        <input type="text" name="card_number" maxlength="16" required>
                    </div>
                    <div class="form-group">
                        <label>PIN:</label>
                        <input type="password" name="pin" maxlength="4" required>
                    </div>
                    <div class="form-group">
                        <label>Amount:</label>
                        <input type="number" name="amount" step="0.01" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="button">Confirm Payment</button>
        </form>
    </div>

 
<?php include 'footer1.php'; ?>

</body>
</html>
