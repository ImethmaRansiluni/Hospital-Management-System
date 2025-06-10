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

// Handle confirmation update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm_appointment'])) {
    $appointment_id = $_POST['appointment_id'];
    $sql = "UPDATE appointment SET confirmed = 1 WHERE appointment_id = '$appointment_id'";
    if (!mysqli_query($conn, $sql)) {
        die("Error updating record: " . mysqli_error($conn));
    }
}

// Fetch appointments data
$sql = "SELECT * FROM appointment";
$result = mysqli_query($conn, $sql);
?>

<?php include 'header4Admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <style>
        /* General styling */
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px; 
            justify-content: center;
        }

        /* Centering content inside the container */
        .container {
            width: 90%;
            max-width: 1200px;
            background: aliceblue;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 1cm;
            margin-top: 3.5cm;
            overflow-y: auto;
            max-height: 650px;
        }

        /* Heading styles */
        h2 {
            text-align: center;
            margin-bottom: 0.5cm;
        }

        /* Table styling */
        table { 
            width: 100%;
            border-collapse: collapse; 
            align-items: center;
        }

        th, td { 
            padding: 12px; 
            border: 1px solid #ddd; 
            text-align: center; 
        }

        th { 
            background-color: #f4f4f4; 
        }

        /* Confirm button styling */
        .confirm-btn { 
    background-color: #007BFF; 
    color: white; 
    border: none; 
    padding: 8px 12px; 
    cursor: pointer; 
    border-radius: 5px;
}

.confirm-btn:hover { 
    background-color: #0056b3; 
}
    </style>
</head>
<body style="background-image: url(../Images/PatientHistory4.jpg);">
    <div class="container">
        <h2>Appointment Management</h2>
        <table>
            <tr>
                <th>Appointment ID</th>
                <th>Email</th>
                <th>NIC</th>
                <th>Department</th>
                <th>Branch</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Confirmed</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['appointment_id']; ?></td>
                <td><?php echo $row['patient_APemail']; ?></td>
                <td><?php echo $row['nic']; ?></td>
                <td><?php echo $row['staff_department']; ?></td>
                <td><?php echo $row['branch']; ?></td>
                <td><?php echo $row['appointment_date']; ?></td>
                <td><?php echo $row['appointment_time']; ?></td>
                <td><?php echo $row['confirmed'] ? 'Yes' : 'No'; ?></td>
                <td>
                    <?php if (!$row['confirmed']) { ?>
                    <form method="POST">
                        <input type="hidden" name="appointment_id" value="<?php echo $row['appointment_id']; ?>">
                        <button type="submit" name="confirm_appointment" class="confirm-btn">Confirm</button>
                    </form>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
<?php include 'footer1.php'; ?>
