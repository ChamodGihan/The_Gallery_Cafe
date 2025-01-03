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

// Handle adding a new special event
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_event'])) {
    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
    $event_time = mysqli_real_escape_string($conn, $_POST['event_time']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $insertSQL = "INSERT INTO special_events (event_name, event_date, event_time, location, description) VALUES ('$event_name', '$event_date', '$event_time', '$location', '$description')";
    if (mysqli_query($conn, $insertSQL)) {
        header("Location: manage_special_events.php");
        exit();
    } else {
        echo "Error adding event: " . mysqli_error($conn);
    }
}

// Fetch special events
$sql = "SELECT * FROM special_events";
$result = mysqli_query($conn, $sql);

// Store special events data
$special_events = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $special_events[] = $row;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe - Manage Special Events</title>
    <link rel="stylesheet" href="../CSS/ManageSpecial Events.css">
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
                <h1>Manage Special Events</h1>
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
                <div class="manage-special-events">
                    <button class="add-event-btn" onclick="document.getElementById('addEventModal').style.display='block'">Add New Special Event</button>
                    
                    <!-- Add Event Modal -->
                    <div id="addEventModal" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="document.getElementById('addEventModal').style.display='none'">&times;</span>
                            <h2>Add New Special Event</h2>
                            <form action="" method="post">
    <input type="hidden" name="add_event" value="1">
    <label for="event_name">Event Name:</label>
    <input type="text" id="event_name" name="event_name" required>
    
    <label for="event_date">Event Date:</label>
    <input type="date" id="event_date" name="event_date" required>
    
    <label for="event_time">Event Time:</label>
    <input type="time" id="event_time" name="event_time" required>
    
    <label for="location">Location:</label>
    <input type="text" id="location" name="location" required>
    
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>
    
    <button type="submit">Add Event</button>
</form>

                        </div>
                    </div>
                    
                    <table class="special-events-table">
                        <thead>
                            <tr>
                                <th>Event Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($special_events)): ?>
                                <?php foreach ($special_events as $event): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($event["event_name"]) ?></td>
                                        <td><?= htmlspecialchars($event["event_date"]) ?></td>
                                        <td><?= htmlspecialchars($event["event_time"]) ?></td>
                                        <td><?= htmlspecialchars($event["location"]) ?></td>
                                        <td><?= htmlspecialchars($event["description"]) ?></td>
                                        <td>
                                            <a href="edit_special_event.php?id=<?= htmlspecialchars($event["event_id"]) ?>" class='edit-btn'>Edit</a>
                                            <button class='delete-btn' onclick="confirmDelete(<?= htmlspecialchars($event["event_id"]) ?>)">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan='6'>No special events found</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
    <script>
        // Get all modals
        var modals = document.getElementsByClassName('modal');
        // Loop through each modal
        for (var i = 0; i < modals.length; i++) {
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target.classList.contains('modal')) {
                    event.target.style.display = "none";
                }
            }
        }
      
        function confirmDelete(eventId) {
            if (confirm("Are you sure you want to delete this event?")) {
                window.location.href = "delete_special_event.php?id=" + eventId;
            }
        }
    </script>
</body>
</html>
