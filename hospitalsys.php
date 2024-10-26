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
    background-color: black;
    padding: 10px;
    text-align: center;
    width: 200px;
    height: 100vh; /* Set the height to 100% of the viewport height */
    display: flex;
    flex-direction: column; /* Stack items vertically */
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    flex-grow: 1; /* Make the list take up the remaining vertical space */
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

/* Add more styles as needed */


/* Add more styles as needed */

        </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="patientma.php">Patient Management</a></li>
            <li><a href="#">Doctor Management</a></li>
            <li><a href="room.php">Room Allocation</a></li>
            <li><a href="#">Staff Management</a></li>
            <li><a href="#">Billing Section</a></li>
            <li><a href="#">User Authentication</a></li>
            <li><a href="#">Reporting</a></li>
        </ul>
    </nav>

    <section id="main-content">
       
        
    </section>
</body>
</html>
