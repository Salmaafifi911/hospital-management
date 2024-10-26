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

        nav {
            background-color: rgb(75, 146, 140);
            padding: 10px;
            text-align: center;
            width: 200px;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            flex-grow: 1;
        }

        nav ul li {
            margin-bottom: 10px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
        }

        section {
            margin: 20px;
            flex: 1;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin: auto;
        }

        h2 {
            color: rgb(75, 146, 140);
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

        button {
            background-color: rgb(75, 146, 140);
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 18px;
        }

        button:hover {
            background-color: #5d997e;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="patientma.php">Search patient</a></li>
            <li><a href="addpatient.php">Add patient</a></li>
            <li><a href="doctor.php">Doctor Management</a></li>
            <li><a href="room.php">Room Allocation</a></li>
            <li><a href="nurse.php">nurse Staff </a></li>
            <li><a href="#">Billing Section</a></li>
            <li><a href="#">User Authentication</a></li>
            <li><a href="#">Reporting</a></li>
        </ul>
    </nav>

    <section id="main-content">
        <form action="addpatientman.php" method="post">
            <h2 class="fullName">Add Patient</h2>
            <div class="input">
                <input type="text" placeholder="Fullname" class="FullName" id="all" name="FullName" required />
                <br/>
                <input type="tel" placeholder="Phone" id="all1" name="Phone" required />
                <br />
                <input type="text" placeholder="Address" class="Address" id="all" name="Address" required />
                <br />
                <input type="text" placeholder="Disease" class="Disease" id="all" name="Disease" required />
                <br />
                <input type="date" placeholder="AdmissionDate" class="AdmissionDate" id="all" name="AdmissionDate" required />
                <br/>
                <input type="number" placeholder="RoomNumber" id="all1" name="RoomNumber" required />
                <br />
                <input type="number" placeholder="DoctorID" id="all1" name="DoctorID" required />
                <br/>
                <input type="number" placeholder="TotalAmount" class="TotalAmount" id="all" name="TotalAmount" required />
                <br/>
                <input type="text" placeholder="PaymentStatus" id="all1" name="PaymentStatus" required />
                <br />
                <input type="date" placeholder="BillingDate" class="BillingDate" id="all" name="BillingDate" required />
                <br/>
                <button type="submit">Add Patient</button>
            </div>
        </form>
    </section>
</body>
</html>
