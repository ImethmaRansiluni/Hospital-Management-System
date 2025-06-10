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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_name = $_POST['staff_name'];
    $staff_contact = $_POST['staff_contact'];
    $staff_birthday = $_POST['staff_birthday'];
    $staff_role = $_POST['staff_role'];
    $staff_department = $_POST['staff_department'];
    $staff_qualification = $_POST['staff_qualification'];

    // Handle image upload
    $staff_img_path = $staff['staffimgPath'];  
    // Keep the old image path by default
    if (isset($_FILES['staff_image']) && $_FILES['staff_image']['error'] == 0) {
        $target_dir = "StaffImages/";
        $target_file = $target_dir . basename($_FILES["staff_image"]["name"]);
        if (move_uploaded_file($_FILES["staff_image"]["tmp_name"], $target_file)) {
            $staff_img_path = basename($_FILES["staff_image"]["name"]); 
            // Update with the new image path
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
        }
    }

    // Update database with new information
    $update_sql = "UPDATE staff SET 
                    staff_name = '$staff_name', 
                    staff_contact = '$staff_contact', 
                    staff_birthday = '$staff_birthday', 
                    staff_role = '$staff_role', 
                    staff_department = '$staff_department', 
                    staff_qualification = '$staff_qualification', 
                    staffimgPath = '$staff_img_path' 
                    WHERE staff_id = '$staff_id'";

    if (mysqli_query($conn, $update_sql)) {
        header("Location: Profile-Staff.php");
        exit();
    } else {
        $error_message = "Error updating profile: " . mysqli_error($conn);
    }
}
?>

<?php include 'header3Staff.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="CSSS/StyleSheet-StaffProfile.css">
    <style>
        .staff-info {
            flex: 1;
            margin-right: 20px;
        }

        .staff-image {
            flex: 0.5;
            text-align: center;
        }

        input[type="text"], input[type="date"], input[type="file"] {
            width: 100%;
            padding: 5px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .edit-profile button {
            margin-top: 10px;
            background-color: #007bff; 
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-profile button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body style="background-image: url(../Images/b1.webp); background-size: cover;">

<div class="container" style="margin-top: 3.5cm; margin-bottom: 1cm;">
    <div class="staff-info">
        <h3>Edit Profile</h3>
        <form action="EditProfile-Staff.php" method="POST" enctype="multipart/form-data">
        <p><label>Staff ID:</label> <?php echo $staff['staff_id']; ?></p>
            <p><label>Name:</label> <input type="text" name="staff_name" value="<?php echo $staff['staff_name']; ?>" required></p>
            <p><label>NIC:</label> <?php echo $staff['staff_nic']; ?></p>
            <p><label>Email:</label> <?php echo $staff['staff_email']; ?></p>
            <p><label>Contact:</label> <input type="text" name="staff_contact" value="<?php echo $staff['staff_contact']; ?>" required></p>
            <p><label>Birthday:</label> <input type="date" name="staff_birthday" value="<?php echo $staff['staff_birthday']; ?>" required></p>
            <p><label>Role:</label> <input type="text" name="staff_role" value="<?php echo $staff['staff_role']; ?>" required></p>
            <p><label>Department:</label> <input type="text" name="staff_department" value="<?php echo $staff['staff_department']; ?>" required></p>
            <p><label>Qualification:</label> <input type="text" name="staff_qualification" value="<?php echo $staff['staff_qualification']; ?>" required></p>
    </div>

    <div class="staff-image">
        <?php 
            if ($staff['staffimgPath']) {
                echo '<img src="../StaffImages/' . $staff['staffimgPath'] . '" style="width: 150px; height: 150px;">';
            } else {
                echo '<p>No image uploaded</p>';
            }
        ?>
        <p><label>Upload New Profile Picture:</label>
        <input type="file" name="staff_image"></p>

        <div class="edit-profile">
            <button type="submit">Save Changes</button>
        </div>
        <div class="edit-profile">
        <button type="button"><a href="Profile-Staff.php" style="text-decoration: none; color: white;">Back</a></button>
        </div>
    </div>
</div>

</form>
</body>
</html>

<?php include 'footer1.php'; ?>
