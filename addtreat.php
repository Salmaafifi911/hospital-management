<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Treatment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="date"] {
            width: calc(100% - 16px);
        }

        input[type="submit"] {
            background-color:rgb(75, 146, 140);
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: black;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospitaladv";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $patientId = $_GET['patientId'];

    
    $treatmentDetails = $_POST['treatmentDetails'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    

    
    $insertSql = "INSERT INTO treatments (PatientID, TreatmentDetails, StartDate, EndDate, TotalDays)
    VALUES ('$patientId', '$treatmentDetails', '$startDate', '$endDate', DATEDIFF('$endDate', '$startDate'))";

    if ($conn->query($insertSql) === TRUE) {
        echo "Treatment added successfully.";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}


$conn->close();
?>


<form action="" method="post">
    <label for="treatmentDetails">Treatment Details:</label>
    <input type="text" name="treatmentDetails" required>

    <label for="startDate">Start Date:</label>
    <input type="date" name="startDate" required>

    <label for="endDate">End Date:</label>
    <input type="date" name="endDate" required>

    <input type="submit" value="Add Treatment">
</form>

</body>
</html>
