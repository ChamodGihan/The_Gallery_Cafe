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

// Fetch event data
$event = null;
if (isset($_GET['id'])) {
    $event_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM special_events WHERE event_id = '$event_id'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $event = mysqli_fetch_assoc($result);
    } else {
        echo "Event not found.";
    }
}

// Handle editing
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['event_id'])) {
    $event_id = mysqli_real_escape_string($conn, $_POST['event_id']);
    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
    $event_time = mysqli_real_escape_string($conn, $_POST['event_time']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    $updateSQL = "UPDATE special_events SET event_name='$event_name', event_date='$event_date', event_time='$event_time', location='$location', description='$description' WHERE event_id='$event_id'";
    if (mysqli_query($conn, $updateSQL)) {
        header("Location: manage_special_events.php");
        exit();
    } else {
        echo "Error updating event: " . mysqli_error($conn);
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
    <title>Edit Special Event</title>
    <link rel="stylesheet" href="../CSS/edit_special_event.css">
</head>
<body>
    <h1>Edit Special Event</h1>
    <?php if ($event): ?>
        <form action="edit_special_event.php" method="POST">
            <input type="hidden" name="event_id" value="<?= htmlspecialchars($event['event_id']) ?>">
            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name" value="<?= htmlspecialchars($event['event_name']) ?>" required>
            
            <label for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date" value="<?= htmlspecialchars($event['event_date']) ?>" required>
            
            <label for="event_time">Event Time:</label>
            <input type="time" id="event_time" name="event_time" value="<?= htmlspecialchars($event['event_time']) ?>" required>
            
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?= htmlspecialchars($event['location']) ?>" required>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?= htmlspecialchars($event['description']) ?></textarea>
            
            <button type="submit">Update Event</button>
        </form>
    <?php else: ?>
        <p>Event not found.</p>
    <?php endif; ?>
</body>
</html>
