<?php include 'header4Admin.php'; ?>
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

// Handle search query
$search = "";
if (isset($_POST['submit']) && !empty($_POST['search_query'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search_query']);
    $sql = "SELECT staff_id, staff_name, staff_nic, staff_type, staff_role FROM staff 
            WHERE LOWER(staff_name) LIKE LOWER('%$search%') 
            OR staff_id = '$search'";
} else {
    $sql = "SELECT staff_id, staff_name, staff_nic, staff_type, staff_role FROM staff";
}

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Management</title>
    <link rel="stylesheet" href="CSSA/StyleSheet-View-A-S.css">
</head>
<body style="background-image: url(../Images/PatientHistory4.jpg);">
<div class="container" style="margin-top: 4cm; margin-bottom: 1cm;">
        <h2 class="title">Staff Management</h2>
        <div class="top-bar">
            <form class="search-form" method="POST" action="">
                <input class="search-input" type="text" name="search_query" placeholder="Enter Patient Name or ID">
                <button class="search-btn" type="submit" name="submit">Search</button>
            </form>
            <a href="NewStaff.php">
                <button class="add-btn">Add New Staff</button>
            </a>
        </div>

        <table class="patient-table">
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>NIC</th>
                    <th>Type</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['staff_id']}</td>
                                <td>{$row['staff_name']}</td>
                                <td>{$row['staff_nic']}</td>
                                <td>{$row['staff_type']}</td>
                                <td>{$row['staff_role']}</td>
                                <td>
                                    <form action='View-Admin-1Staff.php' method='get'>
                                        <input type='hidden' name='staff_id' value='{$row['staff_id']}'>
                                        <button type='submit' class='view-btn'>View</button>
                                    </form>
                                     <form action='Edit-Admin-Staff.php' method='get'>
                                        <input type='hidden' name='staff_id' value='{$row['staff_id']}'>
                                        <button type='submit' class='edit-btn'>Edit</button>
                                    </form>
                                    <form action='Delete-Patient.php' method='get' onsubmit='return confirm
                                    (\"Are you sure you want to delete this User?\")'>
                                        <input type='hidden' name='staff_id' value='{$row['staff_id']}'>
                                        <button type='submit' class='delete-btn'>Delete</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No staff found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php include 'footer1.php'; ?>
