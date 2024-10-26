<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital System Dashboard</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <nav>
        <ul>
        <li><a href="dashboarrd.php">Dashboard</a></li>
            <li><a href="patientma.php">search patient</a></li>
            <li><a href="addpatient.php">add patient</a></li>
            <li><a href="doctor.php">Doctor Management</a></li>
            <li><a href="room.php">Room Allocation</a></li>
            <li><a href="nurse.php">nurse Staff </a></li>
            <li><a href="#">Billing Section</a></li>
            <li><a href="#">User Authentication</a></li>
            <li><a href="#">Reporting</a></li>
        </ul>
    </nav>

    <section id="main-content">
        
        <h2>search patient</h2>
           <form action="searchpatient.php" method="post">
        <input type="text" placeholder="FullName" class="FullName" id="all" name="FullName" required />
        <input type="tel" placeholder="Phone" id="all1" name="Phone" required /><br>
            <button type="submit">Search Patient</button>
        </form>

        
    </section>
</body>
</html>
