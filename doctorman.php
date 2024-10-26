

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Patients</title>
    <style>
        .patient-info {
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

        .patient-info:hover {
            transform: scale(1.03);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .patient-box {
            border: 2px solid #4caf50;
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctorId = $_POST['doctorId'];

    
    $sql = "SELECT doctors.*, patients.*
            FROM doctors
            JOIN patients ON doctors.DoctorID = patients.DoctorID
            WHERE doctors.DoctorID = $doctorId";

    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $doctorInfo = $result->fetch_assoc(); 
        echo "<h2>Doctor Information</h2>";
        echo "<p>Doctor ID: " . $doctorInfo['DoctorID'] . "</p>";
        echo "<p>Doctor Name: " . $doctorInfo['dFullName'] . "</p>";
        echo "<p>Specialization: " . $doctorInfo['Specialization'] . "</p>";

        echo "<h2>Doctor's Patients</h2>";
        do {
          
            echo "<div class='patient-info'>";
            echo "<p>Patient ID: " . $doctorInfo['PatientID'] . "</p>";
            echo "<p>Full Name: " . $doctorInfo['FullName'] . "</p>";
            echo "<button class='treatment-button' onclick='redirectToTreatmentPage(" . $doctorInfo['PatientID'] . ")'>Treatment</button>";
            echo "</div>";
        } while ($doctorInfo = $result->fetch_assoc());
    } else {
        echo "No information found for the given Doctor ID.";
    }
}


$conn->close();
?>


<script>
    function redirectToTreatmentPage(patientId) {
        window.location.href = 'treatment.php?patientId=' + patientId;
    }
</script>

</body>
</html>
