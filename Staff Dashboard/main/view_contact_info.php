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

// Fetch contact messages
$sql = "SELECT * FROM contacts"; 
$result = mysqli_query($conn, $sql);

// Store contact data
$contacts = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $contacts[] = $row;
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
    <title>Contact Messages - The Gallery Cafe</title>
    <link rel="stylesheet" href="../CSS/view_contact_info.css">
</head>
<body>
    <header id="header">
        <div id="topbar" class="topbar">
            <h1><a href="">The Gallery Cafe</a></h1>
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
                <h1>Contact Messages</h1>
            </header>
            <section class="content">
                <table class="contacts-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($contacts)): ?>
                            <?php foreach ($contacts as $contact): ?>
                                <tr>
                                    <td><?= htmlspecialchars($contact["id"]) ?></td>
                                    <td><?= htmlspecialchars($contact["name"]) ?></td>
                                    <td><?= htmlspecialchars($contact["email"]) ?></td>
                                    <td><?= htmlspecialchars($contact["subject"]) ?></td>
                                    <td><?= htmlspecialchars($contact["message"]) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan='5'>No contact messages found</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
