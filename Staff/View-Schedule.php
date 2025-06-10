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

$staff_id = $_SESSION['staff_id'];

// Fetch staff details
$sql = "SELECT * FROM staff WHERE staff_id = '$staff_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $staff = mysqli_fetch_assoc($result);
} else {
    die("Error fetching staff details.");
}

// Fetch schedule data for the staff (available dates)
$schedule_sql = "SELECT * FROM schedule WHERE staff_id = '$staff_id'";
$schedule_result = mysqli_query($conn, $schedule_sql);

if (mysqli_num_rows($schedule_result) > 0) {
    $schedule = [];
    while ($row = mysqli_fetch_assoc($schedule_result)) {
        $schedule[] = $row;
    }
} else {
    $schedule = [];
}
?>

<?php include 'header3Staff.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Schedule</title>
    <link rel="stylesheet" href="CSSS/StyleSheet-StaffProfile.css">
    <style>
    .container {
        padding: 20px;
        width: 50%;
    }

    .staff-schedule {
        margin-bottom: 30px;
    }
    .staff-schedule table {
        width: 550px;
        border-collapse: collapse;
       padding: 30px;
       margin-left: 1cm;
    }

    .staff-schedule table th,
    .staff-schedule table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

   .staff-schedule table th {
        background-color: #f2f2f2;
    }
    .staff-schedule table td {
        background-color: #fafafa;
    }
</style>

</head>
<body style="background-image: url(../Images/PatientHistory4.jpg); background-size: cover; " >

<div class="container" style="margin-top: 3.5cm; margin-bottom: 1cm;">

    <div class="staff-schedule">
        <h3 style="text-align: center;">Schedule</h3>
        <?php if (count($schedule) > 0): ?>
            <table>
                <tr>
                    <th>Schedule ID</th>
                    <th>Available Date</th>
                </tr>
                <?php foreach ($schedule as $entry): ?>
                    <tr>
                        <td><?php echo $entry['schedule_id']; ?></td>
                        <td><?php echo $entry['available_date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No schedule available.</p>
        <?php endif; ?>
    </div>

</div>

</body>
</html>

<?php include 'footer1.php'; ?>
