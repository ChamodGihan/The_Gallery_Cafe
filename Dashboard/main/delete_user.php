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

if (isset($_GET['id'])) {
    $userId = mysqli_real_escape_string($conn, $_GET['id']);

    // Use the correct column name here
    $sql = "DELETE FROM Users WHERE userID='$userId'";

    if (mysqli_query($conn, $sql)) {
        header("Location: Manage_Users.php");
        exit();
    } else {
        echo "<p>Error deleting record: " . mysqli_error($conn) . "</p>";
    }
} else {
    echo "<p>No user ID provided.</p>";
}

mysqli_close($conn);
?>
