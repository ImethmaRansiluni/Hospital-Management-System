<?php
session_start();
include 'db_connect.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$sql = "SELECT staff_name, staff_department, staff_email, staff_contact, staff_qualification, staffimgPath 
        FROM staff 
        WHERE staff_role = 'Doctor'";

if (!empty($search)) {
    $searchEscaped = $conn->real_escape_string($search);
    $sql .= " AND (staff_name LIKE '%$searchEscaped%' OR staff_department LIKE '%$searchEscaped%')";
}

$result = mysqli_query($conn, $sql);
?>

<?php include_once '1header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
    <link rel="stylesheet" href="CSS/DoctorCSS.css">
</head>
<body>

    <!-- Search Bar -->
    <form class="search-container" method="GET">
        <input type="text" name="search" placeholder="Search by doctor name or department..." 
               value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>

    <div class="card-container">
        <?php if (mysqli_num_rows($result) >0): ?>
            <?php while( $row = mysqli_fetch_assoc($result)): ?>
                <div class="card">
                    <div class="staff-image">
                        <?php 
                            if ($row['staffimgPath']) {
                                echo '<img src="../StaffImages/' . ($row['staffimgPath']) . '" alt="Doctor Image">';
                            } else {
                                echo '<p>No image uploaded</p>';
                            }
                        ?>
                    </div>
                    <h3><?php echo ($row['staff_name']); ?></h3>
                    <p><strong>Department:</strong> <?php echo ($row['staff_department']); ?></p>
                    <p><strong>Email:</strong> <?php echo ($row['staff_email']); ?></p>
                    <p><strong>Contact:</strong> <?php echo ($row['staff_contact']); ?></p>
                    <p><strong>Qualification:</strong> <?php echo ($row['staff_qualification']); ?></p>
                    <a href="appointment1.php" class="btn">Make Appointment</a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No doctors found.</p>
        <?php endif; ?>
    </div>

</body>
</html>
<?php include 'footer1.php'; ?>
