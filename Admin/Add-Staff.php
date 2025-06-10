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

if (isset($_POST['submit'])) {
    $staff_name = $_POST['staff_name'];
    $staff_email = $_POST['staff_email'];
    $staff_type = $_POST['staff_type'];
    $contact_info = $_POST['staff_contact'];
    $nic = $_POST['staff_nic'];
    $staff_role = $_POST['staff_role'];
    $branch = $_POST['branch'];

    // Required fields validation
    if (empty($staff_name) || empty($staff_email) || empty($staff_type) || empty($nic) || empty($branch)) {
        echo "<script>alert('Full Name, Email, Staff Type, NIC, and Branch are required.'); window.location.href='NewStaff.php';</script>";
        exit();
    }

    // Insert into database
    $sql = "INSERT INTO staff (staff_name, staff_email, staff_type, staff_contact, staff_nic, staff_role, branch) 
            VALUES ('$staff_name', '$staff_email', '$staff_type', 
                    " . (!empty($contact_info) ? "'$contact_info'" : "NULL") . ", 
                    '$nic', 
                    " . (!empty($staff_role) ? "'$staff_role'" : "NULL") . ", 
                    '$branch')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Staff added successfully!'); window.location.href='NewStaff.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='NewStaff.php';</script>";
    }
}
?>
