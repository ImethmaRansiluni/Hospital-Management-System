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

<?php include_once 'header4Admin.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="CSSA/StyleSheet-HomeAdmin.css">
</head>
<body>
<div class="admin-dashboard">
    <h1>Welcome to the Care Compass Hospital Admin Dashboard</h1>

    <!-- Admin Overview (Image Right, Text Left) -->
    <section class="py-5 section-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 order-md-2">
                    <h2>Admin Overview</h2>
                    <p>Welcome. As an admin, you have the ability to manage the hospital's system operations, oversee user profiles, update schedules, and coordinate internal activities. Your role is vital in ensuring the hospital's daily operations run smoothly.</p>
                    <p>Use the options below to add and manage users, update profiles, and coordinate activities through messages and landlines. Stay updated with real-time system changes and provide essential support to other hospital departments.</p>
                </div>
                <div class="col-md-6 order-md-1 text-center">
                    <img src="../Images/PatientSupport.jpg" alt="Staff Collaboration" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- System Management (Image Left, Text Right) -->
    <section class="py-5 section-light">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-md-6">
                    <h2>System Management</h2>
                    <p>As an admin, you have full control over managing the system:</p>
                    <ul>
                        <li><strong>Add New Users:</strong> Create new staff or admin accounts.</li>
                        <li><strong>Edit User Profiles:</strong> Update user details and assign roles.</li>
                        <li><strong>Update Schedules:</strong> Modify and manage department schedules.</li>
                        <li><strong>Coordinate Communication:</strong> Use landlines and messaging to communicate with staff and departments.</li>
                    </ul>
                </div>
                <div class="col-md-6 text-center">
                    <img src="../Images/admin2.jpg" alt="System Management" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Admin Activities -->
    <section class="py-5 section-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 order-md-2">
                    <h2>Recent Admin Activities</h2>
                    <p>Here are the most recent actions taken by admins:</p>
                    <ul>
                        <li><strong>Admin John:</strong> Updated the hospital schedule for the cardiology department at 10:00 AM.</li>
                        <li><strong>Admin Sarah:</strong> Added a new staff member to the HR department at 9:30 AM.</li>
                        <li><strong>Admin Mike:</strong> Coordinated with the ICU unit via message at 8:45 AM.</li>
                    </ul>
                    <p>These activities reflect the ongoing communication and system updates required for smooth hospital operations.</p>
                </div>
                <div class="col-md-6 order-md-1 text-center">
                    <img src="../Images/admin3.jpg" alt="Recent Activities" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

</div>

</body>
</html>

<?php include 'footer1.php'; ?>
