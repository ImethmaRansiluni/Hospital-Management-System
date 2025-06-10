<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['staff_id'])) { 
    echo "<script>
    alert('Unauthorized access! Please log in.');
    window.location.href = '../MainViewPages/ChooseLoginRole.php';
</script>";
exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $staff_id = $_POST['staff_id'];
    $available_dates = $_POST['available_dates']; // Array of dates

    if (!empty($staff_id) && !empty($available_dates)) {
        foreach ($available_dates as $date) {
            $date = mysqli_real_escape_string($conn, $date);

            // Check if the schedule already exists
            $check_sql = "SELECT * FROM schedule WHERE staff_id = '$staff_id' AND available_date = '$date'";
            $check_result = mysqli_query($conn, $check_sql);

            if (mysqli_num_rows($check_result) == 0) {
                // Insert new schedule
                $sql = "INSERT INTO schedule (staff_id, available_date) 
                        VALUES ('$staff_id', " . (!empty($date) ? "'$date'" : "NULL") . ")";
                
                if (!mysqli_query($conn, $sql)) {
                    echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='Schedule.php';</script>";
                    exit();
                }
            }else{
                echo "<script>alert('Already added!'); window.location.href='Schedule.php';</script>";
                exit();
            }
        }
        echo "<script>alert('Schedule added successfully!'); window.location.href='Schedule.php';</script>";
        exit();
    } else {
        echo "<script>alert('Please select a staff member and at least one date.'); window.location.href='Schedule.php';</script>";
        exit();
    }
}
?>
