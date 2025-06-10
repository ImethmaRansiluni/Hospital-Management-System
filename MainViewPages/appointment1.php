<?php
// Page 1: select_department
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['patient_APemail'] = $_POST['email'];
    $_SESSION['nic'] = $_POST['nic'];
    $_SESSION['staff_department'] = $_POST['staff_department'];
    $_SESSION['branch'] = $_POST['branch'];
    header('Location: appointment2.php');
    exit();
}

$sql=  "SELECT DISTINCT staff_department FROM staff WHERE staff_role = 'Doctor'";
// Fetch distinct branches from the database
$result_departments = mysqli_query($conn, $sql);
?>

<?php include '1header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Select Department</title>
    <link rel="StyleSheet" href="CSS/StyleSheet-appointment1.css">
</head>
<body class="Background1" style="background-image: url(../Images/image.png); margin: 0;" >
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

</body>
</html>

<?php include 'footer1.php'?>