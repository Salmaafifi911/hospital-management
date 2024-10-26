<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital System Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    display: flex;
}

section {
            margin: 20px;
            max-width: 600px;
            width: 100%;
        }

        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
            margin-bottom: 5px;
        }

        
        .patient-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        </style>
</head>
<body>
    <nav>
        <ul>
        <li><a href="dashboarrd.php">Dashboard</a></li>
            <li><a href="patientma.php">Search patient</a></li>
            <li><a href="addpatient.php">Add patient</a></li>
            <li><a href="doctor.php">Doctor Management</a></li>
            <li><a href="room.php">Room Allocation</a></li>
            <li><a href="nurse.php">nurse Staff </a></li>
            <li><a href="wardboys.php">wardboy staff</a></li>
        </ul>
    </nav>

    <section id="main-content">
       
        
    </section>
</body>
</html>
 <?php


$conn = mysqli_connect("localhost", "root", "", "hospitaladv");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $searchFullName = $_POST['FullName'];
    $searchPhone = $_POST['Phone'];

    
    $sql = "SELECT patients.*, doctors.dFullName, bills.*
            FROM patients
            LEFT JOIN doctors ON patients.DoctorID = doctors.DoctorID
            RIGHT JOIN bills ON patients.PatientID = bills.PatientID
            WHERE LOWER(patients.FullName) = LOWER('$searchFullName') AND patients.Phone = '$searchPhone'";

    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $patientData = $result->fetch_assoc();

        
        echo "<div class='patient-info'>";
        echo "<h2>Patient Information</h2>";
        echo "<p>ID: " . $patientData['PatientID'] . "</p>";
        echo "<p>Full Name: " . $patientData['FullName'] . "</p>";
        echo "<p>Phone: " . $patientData['Phone'] . "</p>";
        echo "<p>Address: " . $patientData['Address'] . "</p>";
        echo "<p>Disease: " . $patientData['Disease'] . "</p>";
        echo "<p>RoomNumber: " . $patientData['RoomNumber'] . "</p>";
        echo "<p>DoctorID: " . $patientData['DoctorID'] . "</p>";
        echo "<p>DoctorName: " . $patientData['dFullName'] . "</p>";
        echo "<p>TotalAmount: " . $patientData['TotalAmount'] . "</p>";
        echo "<p>PaymentStatus: " . $patientData['PaymentStatus'] . "</p>";
        echo "<p>BillingDate: " . $patientData['BillingDate'] . "</p>";
        echo "</div>";
        
    } else {
        
        echo "Patient not found.";
    }
}

$conn->close();
?> 

