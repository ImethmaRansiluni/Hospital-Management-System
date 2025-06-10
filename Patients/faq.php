<?php
session_start();

if (!isset($_SESSION['patient_id'])) { 
    echo "<script>
    alert('Unauthorized access! Please log in.');
    window.location.href = '../MainViewPages/ChooseLoginRole.php';
</script>";
exit();
}
include 'db_connect.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    $sql = "INSERT INTO faq (email, question) VALUES ('$email', '$feedback')";
    $conn->query($sql);

    // Redirect to the same page after successful form submission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<?php include 'header2Patient.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="CSSP/faqCSS.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            display: flex;
            justify-content: space-between;
            padding: 20px;
            margin-top: 3.5cm;
        }
        .feedback-list {
            width: 40%;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 255, 0.2);
        }

        .feedback-container
        {
            width: 40%;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 255, 0.2);
            height: 350px;
        }
        h2 {
            color: #0073e6;
        }
        .feedback-item {
            border-bottom: 1px solid #cccccc;
            padding: 10px 0;
        }
        input, textarea {
            margin-left: 1cm;
            width: 80%;
            border: 1px solid #0073e6;
            border-radius: 5px;
            align-items: center;
        }
        button {
            background-color: #0073e6;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #005bb5;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="feedback-list">
            <h2>Previous Feedback</h2>
            <?php
            $sql = "SELECT email, question, answer, created_at FROM faq";
            $result = mysqli_query($conn, $sql);
            while ( $row = mysqli_fetch_assoc($result)) {
                echo "<div class='feedback-item'>";
                echo "<p><strong>" . ($row['email']) . ":</strong> " . ($row['question']) . "</p>";
                echo "<small>Submitted on: " . (isset($row['created_at']) ? $row['created_at'] : 'N/A') . "</small>";
                echo "</br>";
                echo "<p><strong>" . "Answer" . ":</strong>" . ($row['answer']) . "</p>";
                echo "</div>";
            }
            ?>
        </div>

        <div class="feedback-container">
            <h2>Submit Feedback</h2>
            <form action="" method="POST">
                <label>Email:</label>
                <input type="email" name="email" required>
                <label>Feedback:</label>
                <textarea name="feedback" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php include 'footer1.php' ?>