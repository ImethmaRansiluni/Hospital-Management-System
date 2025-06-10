<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="styleSheet" href="CSSA/StyleSheet-Header.css">
  
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg topnavigationBar sticky-top">
    <div class="container-fluid">
      <!-- Logo -->
      <a class="navbar-brand" href="#">
        <img src="../Images/logo1.png" alt="logo" class="navi-logo">
      </a>
      <!-- Navbar Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navbarNav" style="background-color: white;">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="HomePage-Admin.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="View-Admin-Patients.php">Patients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="View-Admin-Staff.php">Staff</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Schedule.php">Schedules</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="OnlinePayments-Admin.php">Manage-Payments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Appointment-Admin.php">Manage-Appointments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="FAQ.php">Manage-FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Profile-Admin.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../MainViewPages/logout.php">LogOut</a>
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