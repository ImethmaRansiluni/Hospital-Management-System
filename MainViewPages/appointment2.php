<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['staff_department'])) {
    header('Location: appointment1.php');
    exit();
}
$email = $_SESSION['patient_APemail'];
$nic = $_SESSION['nic'];
$department = $_SESSION['staff_department'];
$branch = $_SESSION['branch'];

// Fetch doctors from the same department and branch
$sql = "SELECT staff_id, staff_name, staff_qualification, staffimgPath FROM staff 
        WHERE staff_department = ? AND staff_role = 'Doctor' AND branch = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $department, $branch);
$stmt->execute();
$staff_query = $stmt->get_result();

$doctors = [];

while ($row = $staff_query->fetch_assoc()) {
    $doctor_id = $row['staff_id'];
    $doctors[$doctor_id] = [
        'name' => $row['staff_name'],
        'qualification' => $row['staff_qualification'],
        'imgPath' => $row['staffimgPath'],
        'available_dates' => [],
        'reserved_appointments' => []
    ];

    // Fetch available dates
    $sql = "SELECT available_date FROM schedule WHERE staff_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $doctor_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($date = $result->fetch_assoc()) {
        $doctors[$doctor_id]['available_dates'][] = $date['available_date'];
    }

    // Fetch reserved appointments
    $sql = "SELECT appointment_date, appointment_time FROM appointment WHERE staff_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $doctor_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($appt = $result->fetch_assoc()) {
        $doctors[$doctor_id]['reserved_appointments'][] = $appt['appointment_date'] . ' at ' . $appt['appointment_time'];
    }
}

if (empty($doctors)) {
    echo "<script>
            alert('No doctors available in this department. Please check another branch.');
            window.location.href = 'appointment1.php';
          </script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $staff_id = $_POST['staff_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $patient_email = $_SESSION['patient_APemail']; 
    $nic = $_SESSION['nic'];  
    $staff_department = $_SESSION['staff_department']; 
    $branch = $_SESSION['branch']; 

    // Check if email or NIC already exists
    $check_query = "SELECT * FROM appointment WHERE appointment_date = '$appointment_date' AND nic = '$nic' AND 
    staff_id = '$staff_id'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) == 0) {
        // Proceed with appointment insertion
        $sql = "INSERT INTO appointment (staff_id, patient_APemail, nic, staff_department, branch, appointment_date, appointment_time) 
                VALUES ('$staff_id', '$patient_email', '$nic', '$staff_department', '$branch', '$appointment_date', '$appointment_time')";

        if (mysqli_query($conn, $sql)) {
            // Get the last inserted appointment ID
            $appointment_id = mysqli_insert_id($conn);

            // Check if the appointment ID is being fetched
            if ($appointment_id) {
                echo "<script>alert('Appointment ID: " . $appointment_id . "');</script>";
            } else {
                echo "<script>alert('Error fetching appointment ID');</script>";
            }

            $_SESSION['appointment_id'] = $appointment_id;

            header("Location: AppointmentInfo.php");
            exit();
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='appointment1.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('An appointment already reserved. Please select another time.'); window.location.href='appointment2.php';</script>";
    }
}


?>

<?php include '1header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Select Doctor & Schedule</title>
    <link rel="StyleSheet" href="CSS/StyleSheet-appointment2.css">
</head>
<body class="Background1" style="background-image: url(../Images/admin2.jpg); margin: 0;" >
    <div class="container">

    <div class="doctor-info">
            <?php foreach ($doctors as $doctor) { ?>
                <div class="doctor-card">
                    <h3><?php echo $doctor['name']; ?></h3>
                    <div class="staff-image">
                    <?php 
                        // Check if staff image exists
                        if ($doctor['imgPath']) {
                            echo '<img src="../StaffImages/' . $doctor['imgPath'] . '"style="width: 150px; height: 150px;">';
                        } else {
                            echo '<p>No image uploaded</p>';
                        }
                    ?>
                    </div>
                    <p><strong>Qualification:</strong> <?php echo $doctor['qualification']; ?></p>
                    <p><strong>Available Dates:</strong></p>
                    <ul>
                        <?php foreach ($doctor['available_dates'] as $date) { ?>
                            <li><?php echo $date; ?></li>
                        <?php } ?>
                        <?php if (empty($doctor['available_dates'])) echo '<li>No available dates</li>'; ?>
                    </ul>
                    <p><strong>Reserved Appointments:</strong></p>
                    <ul>
                        <?php foreach ($doctor['reserved_appointments'] as $appointment) { ?>
                            <li><?php echo $appointment; ?></li>
                        <?php } ?>
                        <?php if (empty($doctor['reserved_appointments'])) echo '<li>No reserved appointments</li>'; ?>
                    </ul>
                </div>
            <?php } ?>
        </div>


        <div class="form-container">
            <h2 style="align-items: center;">Select Doctor & Time</h2>
            <form method="post" action="appointment2.php">
                <label>Select Doctor:</label>
                <select name="staff_id" required>
                    <option value="">-- Select Doctor --</option>
                    <?php foreach ($doctors as $id => $doctor) { ?>
                        <option value="<?php echo $id; ?>"> <?php echo $doctor['name']; ?> </option>
                    <?php } ?>
                </select>

                <label>Select Date:</label>
                <input type="date" name="appointment_date" id="appointment_date" required>
                    </br>

                <label>Select Time:</label>
                <select name="appointment_time" required>
                    <option value="09:00">09:00 AM</option>
                    <option value="09:30">09:30 AM</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="10:30">10:30 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="11:30">11:30 AM</option>
                    <option value="14:00">02:00 PM</option>
                    <option value="14:30">02:30 PM</option>
                    <option value="15:00">03:00 PM</option>
                    <option value="15:30">03:30 PM</option>
                    <option value="16:00">04:00 PM</option>
                    <option value="16:30">04:30 PM</option>
                </select>

                <div class="edit-profile">
                <button type="submit">Confirm Appointment</button>
                </div>
                <div class="edit-profile">
                <button type="button"><a href="appointment1.php" style="text-decoration: none; color: white;">Back</a></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php include 'footer1.php'?>
