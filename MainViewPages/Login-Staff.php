<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Login | Hospital</title>
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
  width: 35%;
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
  <div class="container5" style="margin-left: 12.7cm; margin-top: 2.5cm;">
    <h2 class="login-title">Staff Login</h2>
    <form action="LoginProcess-Staff.php" method="POST">
      <p class="note"><strong>Note:</strong> Please provide Email and Password to login.</p>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password</label>
      <div class="checkbox-container">
        <input type="checkbox" id="show-password">
        <label for="show-password">Show Password</label>
      </div>
      <input type="password" id="password" name="password" required>

      <label for="select-type">Select User Type</label>
      <select id="select-type" name="select-type" class="select-box" required>
        <option value="staff">Staff</option>
        <option value="admin">Admin</option>
      </select>

      <button type="submit" style="margin-top: 20px; border-radius: 4px;">Login</button>
    </form>

    <button type="button" style="margin-top: 20px; border-radius: 4px;"><a href="ChooseLoginRole.php" 
        style="text-decoration: none; color: white;">Back</a></button>
      <p style="margin-top: 20px;">Don't have an account? <a href="SignUp-Staff.php" style="text-decoration: none;">Sign up</a></p>
    </div>
  </div>
</div>


<?php include 'footer1.php'; ?>

<script>
  // Toggle password visibility
  document.getElementById('show-password').addEventListener('change', function() {
    let passwordField = document.getElementById('password');
    passwordField.type = this.checked ? 'text' : 'password';
  });
</script>

</body>
</html>
