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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['patient_APemail'] = $_POST['email'];
    $_SESSION['nic'] = $_POST['nic'];
    $_SESSION['staff_department'] = $_POST['staff_department'];
    $_SESSION['branch'] = $_POST['branch'];
    header('Location: appointment2.php');
    exit();
}

// Fetch distinct branches from the database
$result_departments = mysqli_query($conn, "SELECT DISTINCT staff_department FROM staff WHERE staff_role = 'Doctor'");
?>

<?php include 'header2Patient.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Select Department</title>
    <link rel="StyleSheet" href="CSSP/StyleSheet-appointment1.css">
</head>
<body class="Background1" style="background-image: url(../Images/image.png);">
    <div class="container">
        <h2>Book an Appointment</h2>
        <form method="post">
            <label>Email:</label>
            <input type="email" name="email" required>
            
            <label>NIC:</label>
            <input type="text" name="nic" required>
            
            <label>Branch:</label>
            <select name="branch" required>
                <option value="Colombo">Colombo</option>
                <option value="Kandy">Kandy</option>
                <option value="Kurunegala">Kurunegala</option>
            </select>
            
            <label>Department:</label>
            <select name="staff_department" required>
                <?php while ($row = mysqli_fetch_assoc($result_departments)) { ?>
                    <option value="<?php echo ($row['staff_department']); ?>">
                        <?php echo ($row['staff_department']); ?>
                    </option>
                <?php } ?>
            </select>
            
            <button type="submit">Next</button>
        </form>
    </div>

    <div style="width: auto; margin: -1.4cm; margin-top: 1cm;">
    <?php include 'footer1.php'?>
    </div>
</body>
</html>
