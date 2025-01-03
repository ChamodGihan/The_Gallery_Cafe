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

// Handle deleting reservation
if (isset($_GET['id'])) {
    $reservation_id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Use the correct column name for your table
    $deleteSQL = "DELETE FROM reservations WHERE reservation_id = '$reservation_id'";
    
    if (mysqli_query($conn, $deleteSQL)) {
        header("Location: manage_reservations.php");
        exit();
    } else {
        echo "Error deleting reservation: " . mysqli_error($conn);
    }
} else {
    echo "Delete";
}

// Close connection
mysqli_close($conn);
?>
