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

$sql = "SELECT * FROM staff WHERE staff_id = '$staff_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $staff = mysqli_fetch_assoc($result);
} else {
    die("Error fetching staff details.");
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

<div class="container">
    <!-- Doctor Details Section -->
    <div class="staff-info">
        <h3>Details</h3>
        <p><label>ID:</label> <?php echo $staff['staff_id']; ?></p>
        <p><label>License ID:</label> <?php echo $staff['license_id'] ? $staff['license_id'] : 'N/A'; ?></p>
        <p><label>Name:</label> <?php echo $staff['staff_name']; ?></p>
        <p><label>NIC:</label> <?php echo $staff['staff_nic']; ?></p>
        <p><label>Email:</label> <?php echo $staff['staff_email']; ?></p>
        <p><label>Password:</label> <?php echo $staff['staff_password']; ?></p>
        <p><label>Contact:</label> <?php echo $staff['staff_contact']; ?></p>
        <p><label>Birthday:</label> <?php echo $staff['staff_birthday']; ?></p>
        <p><label>Role:</label> <?php echo $staff['staff_role']; ?></p>
        <p><label>Department:</label> <?php echo $staff['staff_department']; ?></p>
        <p><label>Qualification:</label> <?php echo $staff['staff_qualification']; ?></p>

        <div class="edit-profile">
            <a href="EditProfile-Admin.php">
                <button>Edit Profile</button>
            </a>
        </div>
    </div>

    <div class="staff-image">
        <?php 
            // Check if staff image exists
            if ($staff['staffimgPath']) {
                echo '<img src="../StaffImages/' . $staff['staffimgPath'] . '"  style="width: 300px; height: 300px;">';
            } else {
                 echo '<p>No image uploaded</p>';
            }
        ?>
    </div>

</div>
</body>
</html>

<?php include 'footer1.php'; ?>
