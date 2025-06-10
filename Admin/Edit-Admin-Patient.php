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
$patient_id = $_GET['patient_id'];

$sql = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $patient = mysqli_fetch_assoc($result);
} else {
    die("Error fetching patient details.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['patient_name'];
    $contact = $_POST['contact_info'];
    $birthday = $_POST['patient_birthday'];
    $age = $_POST['patient_age'];
    $email = $_POST['patient_email'];
    $nic = $_POST['nic'];

    // Handle image upload
    $patient_img_path = $patient['patientsimgPath'];  // Keep the old image path by default
    if (isset($_FILES['patient_image']) && $_FILES['patient_image']['error'] == 0) {
        $target_dir = "../PatientImages/";
        $target_file = $target_dir . basename($_FILES["patient_image"]["name"]);
        if (move_uploaded_file($_FILES["patient_image"]["tmp_name"], $target_file)) {
            $patient_img_path = basename($_FILES["patient_image"]["name"]); // Update with the new image path
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
        }
    }

    // Update database with new information
    $update_sql = "UPDATE patients SET 
                    patient_name = '$name', 
                    contact_info = '$contact', 
                    patient_birthday = '$birthday', 
                    patient_age = '$age',
                    nic = '$nic',
                    patient_email = '$email',
                    patientsimgPath = '$patient_img_path'
                    WHERE patient_id = '$patient_id'";

    if (mysqli_query($conn, $update_sql)) {
        header("Location: View-Admin-1Profile.php?patient_id=$patient_id");  // Redirect to the profile page after update
        exit();
    } else {
        $error_message = "Error updating profile: " . mysqli_error($conn);
    }
}
?>

<?php include 'header4Admin.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="CSSA/StyleSheet-StaffProfile.css">
    <style>

        /* Staff Information Section (Left) */
        .staff-info {
            flex: 1;
            margin-right: 20px;
        }

        /* Staff Image Section (Right) */
        .staff-image {
            flex: 0.5;
            text-align: center;
        }

        /* Ensure input fields are properly styled */
        input[type="text"], input[type="date"], input[type="file"] {
            width: 100%;
            padding: 5px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Edit Profile Button Styles */
        .edit-profile button {
            margin-top: 10px;
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
    </style>
</head>
<body style="background-image: url(../Images/b1.webp); background-size: cover;">

<div class="container">
    <!-- Staff Information Section (Left) -->
    <div class="staff-info">
        <h3>Edit Profile</h3>
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="patient_id" value="<?php echo $patient['patient_id']; ?>">
            <p><label>Patient ID:</label> <?php echo $patient['patient_id']; ?></p>
            <p><label>Name:</label> <input type="text" name="patient_name" value="<?php echo $patient['patient_name'] ?>" required></p>
            <p><label>NIC:</label> <input type="text" name="nic" value="<?php echo $patient['nic']; ?>"required></p>
            <p><label>Email:</label> <input type="text" name="patient_email" value="<?php echo $patient['patient_email']; ?>"required></p>
            <p><label>Contact:</label> <input type="text" name="contact_info" value="<?php echo $patient['contact_info']; ?>" required></p>
            <p><label>Birthday:</label> <input type="date" name="patient_birthday" value="<?php echo $patient['patient_birthday']; ?>" required></p>
            <p><label>Age:</label> <input type="text" name="patient_age" value="<?php echo $patient['patient_age']; ?>" required></p>
    </div>

    <div class="staff-image">
        <?php 
            if ($patient['patientsimgPath']) {
                echo '<img src="../PatientImages/' . $patient['patientsimgPath'] . '" style="width: 150px; height: 150px;">';
            } else {
                echo '<p>No image uploaded</p>';
            }
        ?>
        <p><label>Upload New Profile Picture:</label>
        <input type="file" name="patient_image"></p>

        <div class="edit-profile">
            <button type="submit">Save Changes</button>
        </div>
        <div class="edit-profile">
        <button type="button"><a href="View-Admin-Patients.php" style="text-decoration: none; color: white;">Back</a></button>
        </div>
    </div>
</div>

</form>
</body>
</html>

<?php include 'footer1.php'; ?>
