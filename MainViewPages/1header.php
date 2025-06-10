<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="styleSheet" href="CSS/StyleSheet-Header.css">
  
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg topnavigationBar sticky-top">
    <div class="container-fluid">
      <!-- Logo -->
      <a class="navbar-brand" href="#">
        <img src="Images/logo1.png" alt="logo" class="navi-logo">
      </a>
      <!-- Navbar Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navbarNav" style="background-color: white;">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="HomePage.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AboutUs.html">About Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Branches
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" style="font-size: 16px;" href="ColomboBranch.php">Colombo</a></li>
              <li><a class="dropdown-item" style="font-size: 16px;" href="KandyBranch.php">Kandy</a></li>
              <li><a class="dropdown-item" style="font-size: 16px;" href="KurunagalaBranch.php">Kurunegala</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Facilities.php">Facilities</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Doctors.php">Doctors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="appointment1.php">Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="OnlinePayments.php">Online Payments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faq.php">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ChooseLoginRole.php">Login</a>
          </li>
          <li class="nav-item dropdown" style="margin-right: 1cm;">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              SignUp
            </a>
            <ul class="dropdown-menu" style="height: 1.7cm;">
              <li><a class="dropdown-item" style="font-size: 16px;" href="SignUp-Patient.php">Patient</a></li>
              <li><a class="dropdown-item" style="font-size: 16px;" href="SignUp-Staff.php">Staff</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- Popper.js (for Bootstrap dropdowns) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>
</html>