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

// Handle adding a new reservation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_reservation'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $reservation_date = mysqli_real_escape_string($conn, $_POST['reservation_date']);
    $reservation_time = mysqli_real_escape_string($conn, $_POST['reservation_time']);
    $number_of_guests = mysqli_real_escape_string($conn, $_POST['number_of_guests']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $insertSQL = "INSERT INTO reservations (name, phone_number, reservation_date, reservation_time, number_of_guests, email) VALUES ('$name', '$phone_number', '$reservation_date', '$reservation_time', '$number_of_guests', '$email')";
    if (mysqli_query($conn, $insertSQL)) {
        header("Location: manage_reservations.php");
        exit();
    } else {
        echo "Error adding reservation: " . mysqli_error($conn);
    }
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

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe - Manage Reservations</title>
    <link rel="stylesheet" href="../CSS/ManageReservations.css">
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">
                <h2>The Gallery Cafe</h2>
            </div>
            <nav class="sidebar-nav">
            <ul>
                    <li><a href="./dashboard.php">Dashboard</a></li>
                    <li><a href="./Manage_Users.php">Manage Users</a></li>
                    <li><a href="./ManageMeals.php">Manage Meals</a></li>
                    <li><a href="./ManageReservations.php">Manage Reservations</a></li>
                    <li><a href="./ManageSpecial Events.php">Manage Special Events</a></li>
                    <li><a href="./manage_promotions.php">Manage Promotions</a></li>
                    <li><a href="./logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>Manage Reservations</h1>
                <div class="user-info">
                    <div class="profile-card">
                        <img src="../../Images/C 01.jpeg" alt="Admin Profile Picture">
                        <div class="profile-details">
                            <p>GIHAN</p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </header>
            <section class="content">
                <div class="manage-reservations">
                    
                    
                    <!-- Add Reservation Modal -->
                    <div id="addReservationModal" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="document.getElementById('addReservationModal').style.display='none'">&times;</span>
                            <h2>Add New Reservation</h2>
                            <form action=" " method="post">
                                <input type="hidden" name="add_reservation" value="1">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required>
                                
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" id="phone_number" name="phone_number" required>
                                
                                <label for="reservation_date">Reservation Date:</label>
                                <input type="date" id="reservation_date" name="reservation_date" required>
                                
                                <label for="reservation_time">Reservation Time:</label>
                                <input type="time" id="reservation_time" name="reservation_time" required>
                                
                                <label for="number_of_guests">Number of Guests:</label>
                                <input type="number" id="number_of_guests" name="number_of_guests" required>
                                
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required>
                                
                                <button type="submit">Add Reservation</button>
                            </form>
                        </div>
                    </div>
                    
                    <table class="reservations-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Number of Guests</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($reservations)): ?>
                                <?php foreach ($reservations as $reservation): ?>
                                    <tr>
                                    
                                        <td><?= htmlspecialchars($reservation["name"] ?? 'N/A') ?></td>
                                        <td><?= htmlspecialchars($reservation["phone_number"] ?? 'N/A') ?></td>
                                        <td><?= htmlspecialchars($reservation["reservation_date"] ?? 'N/A') ?></td>
                                        <td><?= htmlspecialchars($reservation["reservation_time"] ?? 'N/A') ?></td>
                                        <td><?= htmlspecialchars($reservation["number_of_guests"] ?? 'N/A') ?></td>
                                        <td><?= htmlspecialchars($reservation["email"] ?? 'N/A') ?></td>
                                        
                                        <td>
                                            <a href="" class='edit-btn'>confirmed</a>
                                            <a href="delete_reservation.php" class='delete-btn' onclick="return confirm('Are you sure you want to delete this reservation?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan='7'>No reservations found</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
    <script>
    
        var modals = document.getElementsByClassName('modal');
        
        for (var i = 0; i < modals.length; i++) {
           
            window.onclick = function(event) {
                if (event.target.classList.contains('modal')) {
                    event.target.style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
