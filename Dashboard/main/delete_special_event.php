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

// Handle deletion
if (isset($_GET['id'])) {
    $event_id = mysqli_real_escape_string($conn, $_GET['id']);
    $deleteSQL = "DELETE FROM special_events WHERE event_id='$event_id'";
    if (mysqli_query($conn, $deleteSQL)) {
        header("Location: manage_special_events.php");
        exit();
    } else {
        echo "Error deleting event: " . mysqli_error($conn);
    }
} else {
    echo "No event ID specified.";
}

// Close connection
mysqli_close($conn);
?>
