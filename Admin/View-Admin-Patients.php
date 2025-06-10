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
    $sql = "SELECT patient_id, patient_name, nic FROM patients 
            WHERE LOWER(patient_name) LIKE LOWER('%$search%') 
            OR patient_id = '$search'";
} else {
    $sql = "SELECT patient_id, patient_name, nic FROM patients";
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
    <title>Patient Management</title>
    <link rel="stylesheet" href="CSSA/StyleSheet-View-A-P.css">
</head>
<body style="background-image: url(../Images/PatientHistory4.jpg);">
    <div class="container" style="margin-top: 4cm; margin-bottom: 1cm;">
        <h2 class="title">Patient Management</h2>
        <div class="top-bar">
            <form class="search-form" method="POST" action="">
                <input class="search-input" type="text" name="search_query" placeholder="Enter Patient Name or ID">
                <button class="search-btn" type="submit" name="submit">Search</button>
            </form>
            <a href="NewPatient.php">
                <button class="add-btn">Add New Patient</button>
            </a>
        </div>
        
        <table class="patient-table" >
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>NIC</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['patient_id']}</td>
                                <td>{$row['patient_name']}</td>
                                <td>{$row['nic']}</td>
                                <td>
                                    <form action='View-Admin-1Profile.php' method='get'>
                                        <input type='hidden' name='patient_id' value='{$row['patient_id']}'>
                                        <button type='submit' class='view-btn'>View</button>
                                    </form>
                                     <form action='Edit-Admin-Patient.php' method='get'>
                                        <input type='hidden' name='patient_id' value='{$row['patient_id']}'>
                                        <button type='submit' class='edit-btn'>Edit</button>
                                    </form>
                                    <form action='Delete-Patient.php' method='get' onsubmit='return confirm
                                    (\"Are you sure you want to delete this User?\")'>
                                        <input type='hidden' name='patient_id' value='{$row['patient_id']}'>
                                        <button type='submit' class='delete-btn'>Delete</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No patients found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php include 'footer1.php'; ?>
