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

$search_query = '';
if (isset($_POST['search_query'])) {
    $search_query = $_POST['search_query'];
}

$query = "SELECT patient_id, patient_name FROM patients WHERE patient_id LIKE ? OR patient_name LIKE ? ORDER BY patient_id";
$stmt = $conn->prepare($query);
$search_query_param = "%" . $search_query . "%";
$stmt->bind_param("ss", $search_query_param, $search_query_param);
$stmt->execute();
$results = $stmt->get_result();
?>

<?php include 'header3Staff.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:ghostwhite;
        }

        .container {
            background: aliceblue;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 12px 8px rgba(0, 0, 0, 0.1);
            max-width: 950px;
            max-height: 650px;
            margin: auto;
            margin-top: 3.5cm;
            margin-bottom: 1cm;
            border: 2px solid black;
            overflow-y: auto;
        }


        .input-group {
            display: flex;
            gap: 5px;
            margin-bottom: 15px;
        }

        input[type="text"] {
            width: 80%;
            padding: 8px;
            font-size: 16px;
        }

        button.btn-primary {
            width: 20%;
            padding: 8px;
            background-color: #007bff;
            border-radius: 8px;
            color: white;
            font-size: 16px;
        }

        button.btn-primary:hover {
            background-color: #0056b3;
        }

        button.btn-primary:active {
            background-color: #004085;
        }

        #patient-list {
            display: flex;
            flex-direction: column;
        }

        button {
            width: 100%;
            padding: 5px 20px;
            background-color:rgb(202, 229, 253);
            border: 1px solid #ccc;
            border-radius: 8px;
            color: black;
            font-size: 16px;
            font-weight: bold;
            text-align: left;
            cursor: pointer;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
            transition: box-shadow 0.3s ease-in-out;
        }

        button:hover {
            background-color: #e0f0ff;
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
        }

        button:active {
            background-color: #d0e0ff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body style="background-image: url(../Images/PatientHistory4.jpg); ">

<div class="container" >
    <h2>Search Patients</h2>

    <form method="POST" action="View-Patients.php">
        <div class="input-group">
            <input type="text" class="form-control" name="search_query" value="<?php echo ($search_query); ?>" 
            placeholder="Search by Patient ID or Name" required>
            <button type="submit" class="btn-primary">Search</button>
        </div>
    </form>

    <div id="patient-list">

    <?php
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo '<form method="GET" action="view-1Patient.php">';
            echo '<input type="hidden" name="patient_id" value="' . $row['patient_id'] . '">';
            echo '<button type="submit" name="set_patient_id"> ' . $row['patient_id'] . ' - ' . $row['patient_name'] . '</button>';
            echo '</form><br>';
        }
    } else {
        echo 'No patients found.';
    }
    ?>

    </div>
</div>
</body>
</html>

<?php include 'footer1.php'; ?>
