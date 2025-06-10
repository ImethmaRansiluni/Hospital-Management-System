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

if (!isset($_GET['patient_id']) || empty($_GET['patient_id'])) {
    die("Error: Patient ID is missing.");
}

$patient_id = $_GET['patient_id'];

$sql = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $patient = mysqli_fetch_assoc($result);
} else {
    die("Error fetching patient details.");
}
?>


<?php include 'header4Admin.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <link rel="stylesheet" href="CSSA/StyleSheet-StaffProfile.css">
    <style>
        /* Edit Profile Button Styles */
        .edit-profile button {
            background-color: #007bff; /* Blue */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Hover Effect for Edit Profile Button */
        .edit-profile button:hover {
            background-color: #0056b3; /* Darker blue */
        }

        /* Centering the Button in the Container */
        .edit-profile {
            display: flex;
            justify-content: left;
            margin-top: 20px;
        }

        /* Container Styling */
        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .staff-info {
            flex: 1;
        }

        .staff-image {
            flex: 1;
            text-align: center;
        }
    </style>
</head>
<body style="background-image: url(../Images/b1.webp); background-size: cover;">

<div class="container" style="margin-top: 4cm; margin-bottom: 1cm;">
    <!-- Doctor Details Section -->
    <div class="staff-info">
    <h3>Patient Details</h3>
        <p><label>Patient ID:</label> <?php echo $patient['patient_id']; ?></p>
        <p><label>Name:</label> <?php echo $patient['patient_name']; ?></p>
        <p><label>Contact Info:</label> <?php echo $patient['contact_info']; ?></p>
        <p><label>Email:</label> <?php echo $patient['patient_email']; ?></p>
        <p><label>NIC:</label> <?php echo $patient['nic']; ?></p>
        <p><label>Birthday:</label> <?php echo $patient['patient_birthday']; ?></p>
        <p><label>Age:</label> <?php echo $patient['patient_age']; ?></p>

        <div class="edit-profile">
        <button type="button"><a href="View-Admin-Patients.php" style="text-decoration: none; color: white;">Back</a></button>
        </div>
    </div>

    <div class="staff-image">
        <?php 
            // Check if staff image exists
            if ($patient['patientsimgPath']) {
                echo '<img src="../PatientImages/' . $patient['patientsimgPath'] . '"  style="width: 300px; height: 300px;">';
            } else {
                 echo '<p>No image uploaded</p>';
            }
        ?>
    </div>

</div>
</body>
</html>

<?php include 'footer1.php'; ?>
