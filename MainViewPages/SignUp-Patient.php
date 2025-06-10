<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Website</title>
  
  <link rel="styleSheet" href="CSS/StyleSheet-SighUp.css">
  <style>
    .Background1 {
  width: 100%;
  min-height: 110vh; /* Ensures it takes full screen height */
  position: relative;
  display: flex; /* Enables flexbox */
  align-items: center; /* Centers vertically */
}
    .form-section {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .checkbox-container {
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .checkbox-container input[type="checkbox"] {
      width: 15px;
      height: 15px;
    }
  </style>
</head>
<body>

<?php include '1header.php'; ?>

<div class="Background1" style="background-image: url(../Images/login22.jpg);">

  <div class="container6" style="margin-top: 3.5cm; margin-bottom: 1cm; border: 1px solid black;">

    <h2 style="font-weight:bold; color: blue;">Sign Up</h2>

    <div class="align">
      <p><strong>Note:</strong> Please fill in all fields to create your account.</p>
    </div>
    <form action="SignUpProcess-Patient.php" method="POST" id="signup-form" style="margin-left: 1cm;">

      <div class="form-section" style="line-height: 25px;">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="nic">NIC</label>
        <input type="text" id="nic" name="nic" required>
      </div>

      <div class="form-section" style="line-height: 15px;">
        <label for="contact">Contact Info</label>
        <input type="text" id="contact" name="contact" required>

        <label for="password">Password</label>
        <div class="checkbox-container">
          <input type="checkbox" id="show-password">
          <label for="show-password">Show Password</label>
        </div>
        <input type="password" id="password" name="password" 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        
        <label for="confirm-password">Confirm Password</label>
        <div class="checkbox-container">
          <input type="checkbox" id="show-confirm-password">
          <label for="show-confirm-password">Show Confirm Password</label>
        </div>
        <input type="password" id="confirm-password" name="confirm-password" required>
      </div>

      <button type="submit" name="submit" value="Submit">Sign Up</button>
      <p class="align">Already have an account?<a href="Login-Patient.php" style="text-decoration: none;">Log in</a></p>
    </form>
  </div>
</div>


<?php include 'footer1.php'; ?>

<script>
  // Toggle password visibility
  document.getElementById('show-password').addEventListener('change', function() {
    let passwordField = document.getElementById('password');
    passwordField.type = this.checked ? 'text' : 'password';
  });

  document.getElementById('show-confirm-password').addEventListener('change', function() {
    let confirmPasswordField = document.getElementById('confirm-password');
    confirmPasswordField.type = this.checked ? 'text' : 'password';
  });
</script>

</body>
</html>


