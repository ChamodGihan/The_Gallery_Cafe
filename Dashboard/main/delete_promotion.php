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
    $promotion_id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $deleteSQL = "DELETE FROM promotions WHERE promotion_id = '$promotion_id'";
    if (mysqli_query($conn, $deleteSQL)) {
        header("Location: manage_promotions.php");
        exit();
    } else {
        echo "Error deleting promotion: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
