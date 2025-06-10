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

// Fetch staff list for dropdown
$staff_query = "SELECT staff_id, staff_name FROM staff";
$staff_result = mysqli_query($conn, $staff_query);
?>

<?php include 'header4Admin.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Schedule</title>
    <link rel="stylesheet" href="CSSA/NewUser.css">
    <script>
        // JavaScript to add multiple date fields
        function addDateField() {
            var container = document.getElementById("date-container");
            var inputField = document.createElement("input");
            inputField.type = "date";
            inputField.name = "available_dates[]";  // Using an array for multiple dates
            inputField.required = true;
            container.appendChild(inputField);
            container.appendChild(document.createElement("br"));
        }
    </script>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-size: cover;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background: aliceblue;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 600px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
}

label {
    font-size: 1.1rem;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="date"], select, button, input[type="submit"] {
    width: 100%;
    padding: 0.8rem;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-top: 5px;
}

input[type="date"], select {
    max-width:550px; /* Ensures fields are uniform in size */
}

button {
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
    margin-top: 10px;
}

button:hover {
    background-color: #0056b3;
}

.form-group button {
    max-width: 500px;
}
.form-group input[type="submit"] {
    background-color: #007BFF;
    border: none;
    color: white;
}

.form-group input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
       
</head>
<body style="background-image: url(../Images/PatientHistory4.jpg);">

<div class="container">
    <h2>Add Staff Schedule</h2>
    <form action="Add-Schedule.php" method="POST">
        <div class="form-group">
            <label for="staff_id">Select Staff:</label>
            <select name="staff_id" required>
                <option value="">Select Staff</option>
                <?php while ($row = mysqli_fetch_assoc($staff_result)) { ?>
                    <option value="<?= $row['staff_id']; ?>"><?= $row['staff_name']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group" id="date-container">
            <label for="available_date">Available Dates:</label>
            <input type="date" name="available_dates[]" required>
        </div>

        <button type="button" onclick="addDateField()">Add Another Date</button><br><br>

        <div class="form-group">
            <input type="submit" name="submit" value="Add Schedule">
        </div>
    </form>

</div>

</body>
</html>

<?php include 'footer1.php'; ?>
