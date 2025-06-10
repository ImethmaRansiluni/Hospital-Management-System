<?php
session_start();

if (!isset($_SESSION['staff_id'])) { 
    echo "<script>
    alert('Unauthorized access! Please log in.');
    window.location.href = '../MainViewPages/ChooseLoginRole.php';
</script>";
exit();
}
include 'db_connect.php'; // Include database connection

// Handle deletion of feedback
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM faq WHERE id = '$delete_id'";
    if ($conn->query($sql)) {
        echo "<script>
                alert('Delete Successfully');
                window.location.href = 'FAQ.php'; // Redirect to the same page after deletion
              </script>";
        exit(); // Stop further script execution
    }
}

// Handle updating the answer
if (isset($_POST['update_answer'])) {
    $answer = $_POST['answer'];
    $id = $_POST['id'];
    $sql = "UPDATE faq SET answer = '$answer' WHERE id = '$id'";
    if ($conn->query($sql)) {
        echo "<script>
                alert('Update Successfully');
                window.location.href = 'FAQ.php'; // Redirect to the same page after updating
              </script>";
        exit(); // Stop further script execution
    }
}

// Fetch feedback data
$sql = "SELECT id, email, question, answer, created_at FROM faq";
$result = $conn->query($sql);
?>

<?php include 'header4Admin.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
       body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin-top: 4cm;
            margin-bottom: 1cm;
            padding: 20px;
            border-radius: 10px;
            background-color: aliceblue;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-radius: 10px;
            border: 1px solid bl;
            padding: 30px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #dddddd;
            text-align: left;
        }

        th {
            background-color: #0073e6;
            color: white;
            border-radius: 10px 10px 0 0;
        }

        td {
            border-radius: 0 0 10px 10px;
        }

        .button {
            background-color: #ff4747;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #d43f3f;
        }

        .update-btn {
            background-color: #007BFF;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .update-btn:hover {
            background-color: #0056b3;
        }

        .answer-input {
            width: 100%;
            padding: 5px;
            border: 1px solid #0073e6;
            border-radius: 5px;
        }
    </style>
</head>
<body style="background-image: url(../Images/PatientHistory4.jpg);">
    <div class="container">
        <h2>Manage Feedback</h2>
        <table>
            <tr>
                <th>Email</th>
                <th>Feedback</th>
                <th>Answer</th>
                <th>Submitted on</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['question']); ?></td>
                <form action="" method="POST">
                    <td>
                        <textarea class="answer-input" name="answer"><?php echo htmlspecialchars($row['answer'] ? $row['answer'] : ''); ?></textarea>
                    </td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td>
                        <!-- Submit answer form -->
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="update_answer" class="update-btn">Update Answer</button>
                    </td>
                </form>
                <td>
                    <!-- Delete button -->
                    <a href="?delete_id=<?php echo $row['id']; ?>">
                        <button class="button">Delete</button>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
<?php include 'footer1.php'; ?>