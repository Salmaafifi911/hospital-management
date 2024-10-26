<?php


// Create a connection
$conn = mysqli_connect("localhost", "root", "", "hospitaladv");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['FullName'];
    $phone = $_POST['Phone'];
    $address = $_POST['Address'];
    $disease = $_POST['Disease'];
    $admissionDate = $_POST['AdmissionDate'];
    $roomNumber = $_POST['RoomNumber'];
    $doctorID = $_POST['DoctorID'];
    $totalAmount = $_POST['TotalAmount'];
    $paymentStatus = $_POST['PaymentStatus'];
    $billingDate = $_POST['BillingDate'];

    // SQL query to insert a new patient
    $sqlPatient = "INSERT INTO patients (FullName, Phone, Address, Disease, AdmissionDate, RoomNumber, DoctorID) 
                   VALUES ('$fullName', '$phone', '$address', '$disease', '$admissionDate', $roomNumber, $doctorID)";

    // Execute the patient query
    if ($conn->query($sqlPatient) === TRUE) {
        // Get the last inserted PatientID
        $patientID = $conn->insert_id;

        // SQL query to insert a new bill
        $sqlBill = "INSERT INTO bills (PatientID, TotalAmount, PaymentStatus, BillingDate) 
                    VALUES ($patientID, $totalAmount, '$paymentStatus', '$billingDate')";

        // Execute the bill query
        if ($conn->query($sqlBill) === TRUE) {
            echo "Patient and Bill added successfully.";
        } else {
            echo "Error adding Bill: " . $conn->error;
        }
    } else {
        echo "Error adding Patient: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>


