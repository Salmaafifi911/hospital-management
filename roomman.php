<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        button {
            background-color: rgb(75, 146, 140);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .room-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h2 {
            color: rgb(75, 146, 140);
        }

        strong {
            font-weight: bold;
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


if (isset($_POST['roomnumber'])) {
    $roomNumber = $_POST['roomnumber'];

    
    $stmt = $conn->prepare("SELECT r.RoomNumber, r.RoomType,r.state, COUNT(p.PatientID) AS PatientCount
                            FROM rooms r
                            LEFT JOIN patients p ON r.RoomNumber = p.RoomNumber
                            WHERE r.RoomNumber = ?
                            GROUP BY r.RoomNumber");
    $stmt->bind_param("s", $roomNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        

        while ($row = $result->fetch_assoc()) {
            echo "<div class='room-box'>";
            echo "<h2>Room Information</h2>";
            echo "<p><strong>Room Number:</strong> " . $row['RoomNumber'] . "</p>";
            echo "<p><strong>Room Type:</strong> " . $row['RoomType'] . "</p>";
            echo "<p><strong>Room state:</strong> " . $row['state'] . "</p>";
            echo "<p><strong>Patient Count:</strong> " . $row['PatientCount'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No records found for the given room number.";
    }

    $stmt->close();
} else {
    echo "Room number not provided in the form data.";
}

$conn->close();
?>
