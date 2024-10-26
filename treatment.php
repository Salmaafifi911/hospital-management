<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient's Treatment</title>
    <style>
        .treatment-info {
            border: 1px solid rgb(75, 146, 140);
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            overflow: hidden;
            position: relative;
        }

        .treatment-info:hover {
            transform: scale(1.03);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .treatment-box {
            border: 2px solid rgb(75, 146, 140);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }

        h2 {
            color: rgb(75, 146, 140);
            margin-bottom: 15px;
            border-bottom: 2px solid rgb(75, 146, 140);
            padding-bottom: 5px;
        }

        p {
            margin: 10px 0;
            font-size: 16px;
        }

        strong {
            font-weight: bold;
        }

        .treatment-button {
            background-color: rgb(75, 146, 140);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['patientId'])) {
    $patientId = $_GET['patientId'];

    $sql = "SELECT treatments.*
            FROM treatments
            WHERE treatments.PatientID = $patientId";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Patient's Treatment Information</h2>";
        while ($treatmentInfo = $result->fetch_assoc()) {
            //  treatment details
            echo "<div class='treatment-info'>";
            echo "<p>Treatment ID: " . $treatmentInfo['TreatmentID'] . "</p>";
            echo "<p>Start Date: " . $treatmentInfo['StartDate'] . "</p>";
            echo "<p>End Date: " . $treatmentInfo['EndDate'] . "</p>";
            echo "<p>Total Days: " . $treatmentInfo['TotalDays'] . "</p>";
            echo "<button class='treatment-button' onclick='redirectToTreatmentPage(" . $treatmentInfo['PatientID'] . ")'>ADD Treatment</button>";
            echo "</div>";
        }
    } else {
        echo "No treatment information found for the given Patient ID.";
        echo "<button class='treatment-button' onclick='redirectToTreatmentPage($patientId)'>Add Treatment</button>";
    }
}

$conn->close();
?>

<script>
    function redirectToTreatmentPage(patientId) {
        window.location.href = 'addtreat.php?patientId=' + patientId;
    }
</script>

</body>
</html>
