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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Compass Hospital - Staff Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="Stylesheet" href="CSSS/StyleSheet-HomePage.css">
    <style>
       body {
        background-image: url(../Images/image.png);
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        font-family: 'Arial', sans-serif;
       }
    </style>
</head>
<body>

    <?php include 'header3Staff.php'; ?>


<section class="text-center py-5">
    <div class="container" style="margin-top: 3cm; color: black;">
        <h1 class="display-4 fw-bold ">Welcome to Care Compass Hospital</h1>
        <p class="lead">Your commitment to care makes us who we are.</p>
    </div>
</section>

<section class="py-5" style="margin-top: -2cm;">
    <div class="container section-light">
        <div class="row align-items-center">
            <div class="col-md-6 order-md-2">
                <h2>About Our Staff</h2>
                <p>At Care Compass Hospital, we believe that our staff is the heart of our organization. We are committed to 
                    fostering a supportive and inclusive environment where every team member can thrive. From professional 
                    development opportunities to promoting work-life balance, we prioritize the well-being and growth of our
                    dedicated staff. Together, we are building a community of care and excellence.</p>
            </div>
            <div class="col-md-6 order-md-1 text-center">
                <img src="../Images/7p.jpg" alt="Staff Collaboration" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<div class="container quote-container my-4" style="align-items: center;">
    <div class="quote-text">
        "The best way to find yourself is to lose yourself in the service of others."</br></br>
       
    </div>
    <div class="quote-text">
    - Mahatma Gandhi
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

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Our Values</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="p-3 shadow-sm rounded values-card" style="height: 150px; align-content: center;">
                    <h3><i class="bi bi-hand-thumbs-up icon"></i> Compassion</h3>
                    <p>We deeply care about the well-being of our patients and colleagues.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 shadow-sm rounded values-card" style="height: 150px; align-content: center;">
                    <h3><i class="bi bi-star icon"></i> Excellence</h3>
                    <p>We strive for the highest quality in all we do.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 shadow-sm rounded values-card" style="height: 150px; align-content: center;">
                    <h3><i class="bi bi-people-fill icon"></i> Teamwork</h3>
                    <p>We collaborate to achieve our common goals.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer1.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
