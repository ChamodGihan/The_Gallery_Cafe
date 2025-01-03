<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'the_gallery_cafe'; 

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch reservations
$sql = "SELECT * FROM reservations"; 
$result = mysqli_query($conn, $sql);

// Store reservations data
$reservations = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $reservations[] = $row;
    }
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe - View Reservations</title>
    <link rel="stylesheet" href="../CSS/view_reservation.css">
</head>
<body>
    <header id="header">
        <div id="topbar" class="topbar">
            <h1><a href="../Main/home.php"></a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="../Main/home.php">Home</a></li>
                    <li><a href="../Main/Menu.php">Menu</a></li>
                    <li><a href="../Main/Reservation.php">Reservations</a></li>
                    <li><a href="../Main/About.php">About Us</a></li>
                    <li><a href="../Main/Contact.php">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">
                <h2>The Gallery Cafe</h2>
            </div>
          <?php include('./navbar.php'); ?>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>View Reservations</h1>
            </header>
            <section class="content">
                <table class="reservations-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Number of Guests</th>
                            <th>Email</th>
                            
                     
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($reservations)): ?>
                            <?php foreach ($reservations as $reservation): ?>
                                <tr>
                                    <td><?= htmlspecialchars($reservation["id"] ?? '') ?></td>
                                    <td><?= htmlspecialchars($reservation["name"] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($reservation["phone_number"] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($reservation["reservation_date"] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($reservation["reservation_time"] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($reservation["number_of_guests"] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($reservation["email"] ?? 'N/A') ?></td>
                                   
                                   
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan='9'>No reservations found</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
