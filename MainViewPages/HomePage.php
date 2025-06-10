<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Website</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- FontAwesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!--CSS -->
  <link rel="styleSheet" href="CSS/StyleSheet-Home.css">
</head>
<body>

<?php include '1header.php' ?>

<div class="container-fluid image-container p-0">
  <!-- Bootstrap Carousel -->
  <div id="doctorCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    
    <!-- Carousel Items -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../Images/slide11.jpg" class="d-block w-100 carousel-image" alt="Doctor 1">
      </div>
      <div class="carousel-item">
        <img src="../Images/slide22.jpg" class="d-block w-100 carousel-image" alt="Doctor 2">
      </div>
      <div class="carousel-item">
        <img src="../Images/slide33.jpg" class="d-block w-100 carousel-image" alt="Doctor 3">
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

  <!-- Button Row -->
  <div class="button-row">
    <div class="btn btn-1" style="background-color: #1E90FF;">
      <span><a href="appointment1.php" style="text-decoration: none; color: white;">Book an Appointment</a></span>
      <img src="../Images/calendarap1.png" alt="Appointment Icon">
    </div>
    <div class="btn btn-2" style="background-color: rgb(97, 162, 215);">
      <span><a href="Doctors.php" style="text-decoration: none; color: white;">Specialists</a></span>
      <img src="../Images/spe1.png" alt="Specialist Icon">
    </div>
    <div class="btn btn-3" style="background-color: #87CEEB;">
      <span><a href="Services.php" style="text-decoration: none; color: white;">Services</a></span>
      <img src="../Images/services.png" alt="FAQ Icon">
    </div>
  </div>
</div>


  <div class="welcome-section">
  <h1>Welcome to Care Compass Hospitals</h1>
  <p>We at Care Compass Hospitals are dedicated to offering patients the best possible healthcare
            with an emphasis on their well-being. Our hospital network, which has locations in Kandy, Colombo, and Kurunegala,
            provides a variety of medical services and treatments, backed by a group of knowledgeable experts committed to your well-being.
  </p>
  <p>
            Our all-inclusive services, which are intended to make your healthcare
            experience smooth and effective, include online bill payment, laboratory testing,
            appointment scheduling, and doctor consultations. Additionally, our user-friendly web portal allows
            patients to contact with healthcare practitioners, examine medical information, and register for medical services.  
  </p>
  <p>
                On your path to improved health, Care Compass Hospitals is ready to help, whether you're looking
                 for standard care or specialist therapies.
            </p>
</div>
    
     <div class="container3" style="background-color:rgb(169, 206, 243);">
    <div class="left">
      <h2 style="color: blue;">Why Patients Choose Us</h2>
      <p style="color: black;">At Care Compass Hospital, we are dedicated to providing world-class healthcare services with compassion and precision. 
         Our highly skilled team of doctors and state-of-the-art facilities ensure that every patient receives the care they deserve. 
         Choose Care Compass for unparalleled expertise and unwavering commitment to your well-being.</p>
    </div>

    <div class="right">
      <div class="image-slider">
        <img src="../Images/b1remove.png" alt="Hospital image 1">
      </div>
    </div>
  </div>

  <div class="container mt-5">
        <h2 class="text-center mb-4" style="margin-top: 3cm;">Our Specialities</h2>
        <div class="row g-3">
            <!-- Specialities List -->
            <div class="col-lg-3 col-md-4 col-sm-6 speciality-button">
                <button type="button" class="btn btn-outline-primary">
                    <i class="fas fa-brain"></i> <a href="#" style="text-decoration: none;">Neurology</a>
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 speciality-button">
                <button type="button" class="btn btn-outline-warning">
                    <i class="fas fa-eye"></i> Ophthalmology
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 speciality-button">
                <button type="button" class="btn btn-outline-info">
                    <i class="fas fa-heartbeat"></i> Cardiovascular
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 speciality-button">
                <button type="button" class="btn btn-outline-dark">
                    <i class="fas fa-lungs"></i> Pulmonology
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 speciality-button">
                <button type="button" class="btn btn-outline-primary">
                    <i class="fas fa-toilet"></i> Urology
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 speciality-button">
                <button type="button" class="btn btn-outline-danger">
                    <i class="fas fa-user-md"></i> Dermatology
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 speciality-button">
                <button type="button" class="btn btn-outline-success">
                    <i class="fas fa-female"></i> Gynecology
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 speciality-button">
                <button type="button" class="btn btn-outline-danger">
                    <i class="fas fa-heart"></i> Heart Center
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 speciality-button">
                <button type="button" class="btn btn-outline-warning">
                    <i class="fas fa-baby"></i> Mother and Baby Care
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 speciality-button">
                <button type="button" class="btn btn-outline-info">
                    <i class="fas fa-hand-holding-medical"></i> Kidney Transplant
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 speciality-button">
                <button type="button" class="btn btn-outline-secondary">
                    <i class="fas fa-x-ray"></i> Radiology
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 speciality-button">
                <button type="button" class="btn btn-outline-dark">
                    <i class="fas fa-ribbon"></i> Cancer Treatments
                </button>
            </div>
        </div>
    </div>

  <div class="story-container" style="margin-top: 3cm; margin-bottom: 3cm;">
  <div class="story-image">
    <img src="../Images/p+d.jpg" alt="Patient Image">
  </div>
  <div class="story-slider">
    <div class="story">
      <p><strong>Sarah Thompson:</strong> "After battling cancer for two years, I’m finally in remission. The care and compassion I received here helped me through the toughest days. I’m grateful beyond words."</p>
    </div>
    <div class="story">
      <p><strong>James Lee:</strong> "Broken bones from an accident left me hopeless, but the hospital staff never gave up on me. I walked again, stronger than before. Their support was my strength."</p>
    </div>
    <div class="story">
      <p><strong>Maria Gonzalez:</strong> "Recovering from surgery was tough, but the nurses’ encouragement kept me going. Their dedication to my well-being made all the difference in my healing journey."</p>
    </div>
  </div>
</div>

  <?php include 'footer1.php' ?>
  
</body>
</html>
