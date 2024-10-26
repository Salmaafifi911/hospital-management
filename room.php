<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Room Allocation</title>
    <link rel="stylesheet" href="styles.css"><style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    display: flex;
}

nav {
    background-color:rgb(75, 146, 140);
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
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
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


    
    <form action="roomman.php" method="post">
        <label for="roomnumber">Room number:</label>
        <input type="text" id="roomnumber" name="roomnumber" required>
        <button type="submit">Search Rooms</button>
    </form>
</body>
</html>

    
</body>
</html>
