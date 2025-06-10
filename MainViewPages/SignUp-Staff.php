<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Sign Up | Hospital</title>
    <style>
  /* General Styles */
body {
  margin: 0;
  font-family: Arial, sans-serif;
}

.Background1 {
  width: 100%;
  min-height: 110vh; /* Ensures it takes full screen height */
  position: relative;
  display: flex; /* Enables flexbox */
  align-items: center; /* Centers vertically */
}

.container5 {
  width: 40%;
  background-color: aliceblue;
  padding: 40px;
  border-radius: 40px;
  box-shadow: 0 12px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
  border: 1px solid black;
  align-items: center;
}
/* Title */
.login-title {
  font-weight: bold;
  color: blue;
}

/* Form Styles */
form {
  display: flex;
  flex-direction: column;
  width: 100%;
}

label {
  margin-top: 10px;
  font-size: 15px;
  font-weight: bold;
  text-align: left;
}

/* Input Fields */
input {
  padding: 10px;
  margin-top: 5px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

/* Select Box */
.select-box {
  padding: 10px;
  font-size: 14px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: white;
  cursor: pointer;
}

.select-box:focus {
  outline: none;
  border-color: #007BFF;
}

button {
      background-color: #007BFF;
      color: white;
      padding: 12px;
      margin-top: 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    a {
      color: #1E90FF;
      text-decoration: none;
    }

    a:hover {
      text-decoration: none;
    }
</style>
</head>
<body>
    
<?php include '1header.php'; ?>

<div class="Background1" style="background-image: url(../Images/login22.jpg);">
  <div class="container5" style="margin-left: 12.7cm; margin-top: 4.5cm; margin-bottom: 1cm;">
      <h2 style="font-weight:bold; color: blue;">Staff Sign Up</h2>
      <form action="SignUpProcess-Staff.php" method="POST">

        <div style="margin-top: 8px;">
        <p><strong>Note:</strong> Please enter your Email which you are already registered to the system & enter a new Passowrd for sign up.</p>
        </div>

        <label for="email" style="font-size: 15px; font-weight: bold;">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password" style="font-size: 15px; font-weight: bold;">Password</label>
        <div class="checkbox-container">
          <input type="checkbox" id="show-password">
          <label for="show-password">Show Password</label>
        </div>
        <input type="password" id="password" name="password" 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

        <label for="confirm-password" style="font-size: 15px; font-weight: bold;">Confirm Password</label>
        <div class="checkbox-container">
          <input type="checkbox" id="show-confirm-password">
          <label for="show-confirm-password">Show Confirm Password</label>
        </div>
        <input type="password" id="confirm-password" name="confirm-password" required>

        <label for="select-type" style="font-size: 15px; font-weight: bold;">Select User Type</label>
        <select id="select-type" name="select-type" class="select-box" required>
          <option value="staff">Staff</option>
          <option value="admin">Admin</option>
        </select>

        <button type="submit" name="submit" value="Submit" style="margin-top: 20px; border-radius: 4px;">Sign Up</button>
      <p class="align" style="margin-top: 20px;">Already have an account?<a href="Login-Staff.php" style="text-decoration: none;">Log in</a></p>
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