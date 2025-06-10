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
?>

<?php include 'header4Admin.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
    <link rel="stylesheet" href="CSSA/NewUser.css">
    <style>
        /* Ensure dropdowns match input size */
        select, input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body style="background-image: url(../Images/PatientHistory4.jpg);">

<div class="container">
    <h2>Add Staff</h2>
    <form action="Add-Staff.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="staff_name">Full Name:</label>
            <input type="text" name="staff_name" required>
        </div>
        
        <div class="form-group">
            <label for="staff_email">Email:</label>
            <input type="email" name="staff_email" required>
        </div>

        <div class="form-group">
            <label for="staff_type">Staff Type:</label>
            <select name="staff_type" required>
                <option value="staff">Staff</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="contact_info">Contact Information:</label>
            <input type="text" name="staff_contact">
        </div>

        <div class="form-group">
            <label for="nic">NIC:</label>
            <input type="text" name="staff_nic">
        </div>

        <div class="form-group">
            <label for="staff_role">Role:</label>
            <select name="staff_role">
                <option value="Doctor">Doctor</option>
                <option value="Nurse">Nurse</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="branch">Branch:</label>
            <select name="branch" required>
                <option value="Colombo">Colombo</option>
                <option value="Kandy">Kandy</option>
                <option value="Kurunegala">Kurunegala</option>
            </select>
        </div>

        <input type="submit" name="submit" value="Add Staff">
    </form>

    <button type="button"><a href="View-Admin-Staff.php" style="color: white; text-decoration: none;">Back</a></button>
</div>

</body>
</html>

<?php include 'footer1.php'; ?>
