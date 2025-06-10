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

$patient_id = $_SESSION['patient_id'];

$sql = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $patient = mysqli_fetch_assoc($result);
} else {
    die("Error fetching patient details.");
}
?>

<?php include 'header2Patient.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Home - Care Compass Hospitals</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .topnavigationBar { 
            background-color: white;
            box-shadow: 0 12px 8px rgba(0, 0, 0, 0.1);
            height: 100px;
            width: 100%;
            position: fixed; /* Use fixed positioning */
            top: 0; /* Sticks the navigation bar to the top */
            left: 0;
            padding: 10px 18px;
            font-size: 16px;
            z-index: 1000; /* Ensure it's above other content */
         }  
        body {
            background-size: cover;
            background-position: center;
            background-color: aliceblue;
        }
        .dashboard {
            text-align: center;
            padding: 50px 0;
        }
        .dashboard h2 {
            font-size: 28px;
            color: #003366;
        }
        .card {
            border-radius: 10px;
            transition: transform 0.3s;
            text-align: center;
            height: 7cm;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            width: 80px;
            margin: 10px auto;
        }
        .description {
            font-size: 14px;
            color: #555;
            margin-top: 5px;
        }
        .quote-section {
            background-color: lavender;
            padding: 30px;
            margin-top: 50px;
            border-radius: 60px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 1cm;
        }
        .quote-section p {
            font-size: 20px;
            color: #333;
            font-style: italic;
        }
        .quote-section h5 {
            font-size: 24px;
            font-weight: bold;
            margin-top: 10px;
        }
        .image-container {
        position: relative;
        width: 100%;
        max-height: 100vh; /* Adjust height as needed */

        margin-bottom: 1cm; /* Remove any margin on the container */
        padding: 0; /* Remove any padding on the container */
        }

        .carousel-image {
        width: 100%; /* Ensure the image takes full width */
        height: 100vh; /* Limit the height */
        object-fit: cover; /* Maintain aspect ratio and crop */
        }

    </style>
</head>
<body class="Background1" style="background-image: url(../Images/OB9.jpg);">
<div class="container-fluid image-container p-0">
<div id="doctorCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    

    <!-- Carousel Items -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../Images/home21.jpg" class="d-block w-100 carousel-image" alt="Doctor 1">
      </div>
      <div class="carousel-item">
        <img src="../Images/home22.jpg" class="d-block w-100 carousel-image" alt="Doctor 2">
      </div>
      <div class="carousel-item">
        <img src="../Images/home23.jpg" class="d-block w-100 carousel-image" alt="Doctor 3">
      </div>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#doctorCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#doctorCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<div class="container text-center">
    
    <h1 class="mt-3">Welcome to Care Compass Hospitals</h1>

    <!-- Inspirational Quote Section -->
    <div class="quote-section">
        <p>"Your health is your wealth. Take care of yourself today for a brighter tomorrow."</p>
        <h5>- Care Compass Hospitals</h5>
    </div>

    <p class="mt-2" style="max-width: 600px; margin: 0 auto; color: black; font-size: 20px;">
        We are committed to providing top-quality healthcare services. Use our online platform to easily manage your appointments, payments, lab reports, and diagnosis records. Your health, our priority!
    </p>

    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card p-3 shadow-sm">
                <img src="../Images/calendarap1.png" alt="Appointments">
                <h5>View Appointments</h5>
                <p class="description">Check and manage your upcoming appointments with our doctors.</p>
                <a href="appointment1.php" class="btn btn-primary">Go</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 shadow-sm">
                <img src="../Images/payment.png" alt="Payments">
                <h5>Payments</h5>
                <p class="description">Make secure payments for consultations and medical services.</p>
                <a href="OnlinePayments.php" class="btn btn-success">Go</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 shadow-sm">
                <img src="../Images/lab1.png" alt="Lab Reports">
                <h5>Lab Reports</h5>
                <p class="description">Access and download your test results anytime.</p>
                <a href="View-PatientsLR.php" class="btn btn-info">Go</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 shadow-sm">
                <img src="../Images/diagnosis.png" alt="Diagnosis">
                <h5>Diagnosis Reports</h5>
                <p class="description">View your diagnosis history and doctor's notes.</p>
                <a href="View-patientsMH.php" class="btn btn-warning">Go</a>
            </div>
        </div>
    </div>
</div>

<section class="py-5 bg-light" style="margin-top: 1cm;">
    <div class="container">
        <h2 class="text-center mb-4">Our Achievements</h2>
        <div class="row text-center">
            <div class="col-md-3">
                <h3 class="icon"><i class="bi bi-trophy"></i></h3>
                <h4>Top 10</h4>
                <p>Ranked nationally for patient care</p>
            </div>
            <div class="col-md-3">
                <h3 class="icon"><i class="bi bi-heart"></i></h3>
                <h4>1,000+</h4>
                <p>Successful surgeries annually</p>
            </div>
            <div class="col-md-3">
                <h3 class="icon"><i class="bi bi-lightbulb"></i></h3>
                <h4>Excellence</h4>
                <p>Recognized in research & innovation</p>
            </div>
            <div class="col-md-3">
                <h3 class="icon"><i class="bi bi-people"></i></h3>
                <h4>Community</h4>
                <p>Leader in health initiatives</p>
            </div>
        </div>
    </div>
</section>

</body>
</html>

<?php include 'footer1.php'; ?>
