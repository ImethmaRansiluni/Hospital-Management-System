<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Website</title>
  
  <link rel="styleSheet" href="CSS/ChooseLoginType.css">
  
</head>
<body>

<?php include '1header.php' ?>

<div class="Background1" style="background-image: url(../Images/login22.jpg);">
<div class="container4">
        <div class="role-card" style="width: 350px;">
            <div class="image-box1">
                <img src="../Images/patientlogo1.jpg" alt="care1">
            </div>
            <h2>Patient</h2>
            <p>Login as a patient to access <br> your profile.</p>
            <a href="Login-Patient.php" style="text-decoration: none;">Login</a>
        </div>

        <div class="role-card" style="width: 350px;">
            <div class="image-box1">
                <img src="../Images/doctoricon1.jpg" alt="care1">
            </div>
            <h2>Staff</h2>
            <p>Login as Staff or Admin, to manage the system.</p>
            <a href="Login-Staff.php" style="text-decoration: none;">Login</a>
        </div>

    </div>
</div>
<?php include 'footer1.php' ?>


</body>
</html>
