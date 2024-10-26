<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WardBoy Management</title>
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

        .wardboy-box {
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $wardBoyId = $_POST['wardboyid'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT w.WardBoyID, w.FullName AS WardBoyName, w.Responsibilities, COUNT(wp.PatientID) AS PatientCount
                            FROM wardboys w
                            LEFT JOIN wardboypatients wp ON w.WardBoyID = wp.WardBoyID
                            WHERE w.WardBoyID = ?
                            GROUP BY w.WardBoyID");
    $stmt->bind_param("s", $wardBoyId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='wardboy-box'>";
        echo "<h2>WardBoy Information</h2>";

        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>WardBoy ID:</strong> " . $row['WardBoyID'] . "</p>";
            echo "<p><strong>WardBoy Name:</strong> " . $row['WardBoyName'] . "</p>";
            echo "<p><strong>Responsibilities:</strong> " . $row['Responsibilities'] . "</p>";
            echo "<p><strong>Patient Count:</strong> " . $row['PatientCount'] . "</p>";
        }

        echo "</div>";
    } else {
        echo "<p>No records found for the given WardBoy ID.</p>";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
