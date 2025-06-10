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

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$sql = "SELECT staff_name, staff_department, staff_email, staff_contact, staff_qualification, staffimgPath 
        FROM staff 
        WHERE staff_role = 'Doctor'";

if (!empty($search)) {
    $searchEscaped = $conn->real_escape_string($search);
    $sql .= " AND staff_name LIKE '%" . $conn->real_escape_string($search) . "%'";
}

$result = mysqli_query($conn, $sql);
?>

<?php include 'header2Patient.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
    <link rel="stylesheet" href="CSSP/DoctorCSS.css">
</head>
<body>

    <!-- Search Bar -->
    <form class="search-container" method="GET">
        <input type="text" name="search" placeholder="Search by doctor name..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>

    <div class="card-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <div class="staff-image">
                        <?php 
                            if ($row['staffimgPath']) {
                                echo '<img src="../StaffImages/' . htmlspecialchars($row['staffimgPath']) . '" alt="Doctor Image">';
                            } else {
                                echo '<p>No image uploaded</p>';
                            }
                        ?>
                    </div>
                    <h3><?php echo htmlspecialchars($row['staff_name']); ?></h3>
                    <p><strong>Department:</strong> <?php echo htmlspecialchars($row['staff_department']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($row['staff_email']); ?></p>
                    <p><strong>Contact:</strong> <?php echo htmlspecialchars($row['staff_contact']); ?></p>
                    <p><strong>Qualification:</strong> <?php echo htmlspecialchars($row['staff_qualification']); ?></p>
                    <a href="appointment1.php" class="btn">Make Appointment</a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No doctors found.</p>
        <?php endif; ?>
    </div>
    
    <?php $conn->close(); ?>
</body>
</html>
<?php include 'footer1.php' ?>
