<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'the_gallery_cafe';


$conn = mysqli_connect($host, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get meal ID from query parameters
if (isset($_GET['id'])) {
    $meal_id = intval($_GET['id']);

    // Delete the meal
    $sql = "DELETE FROM meals WHERE id = $meal_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: ManageMeals.php");
        exit();
    } else {
        echo "<p>Error deleting meal: " . mysqli_error($conn) . "</p>";
    }
} else {
    echo "No meal ID specified.";
}

mysqli_close($conn);
?>
