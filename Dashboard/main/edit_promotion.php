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

// Fetch promotion data
$promotion = null;
if (isset($_GET['id'])) {
    $promotion_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM promotions WHERE promotion_id = '$promotion_id'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $promotion = mysqli_fetch_assoc($result);
        } else {
            echo "Promotion ID not found in the database.";
        }
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
} else {
    echo "No promotion ID specified in the URL.";
}

// Handle editing
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['promotion_id'])) {
    $promotion_id = mysqli_real_escape_string($conn, $_POST['promotion_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $startDate = mysqli_real_escape_string($conn, $_POST['start_date']);
    $endDate = mysqli_real_escape_string($conn, $_POST['end_date']);
    
    $updateSQL = "UPDATE promotions SET Title='$title', Description='$description', StartDate='$startDate', EndDate='$endDate' WHERE promotion_id='$promotion_id'";
    if (mysqli_query($conn, $updateSQL)) {
        header("Location: manage_promotions.php");
        exit();
    } else {
        echo "Error updating promotion: " . mysqli_error($conn);
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
    <title>Edit Promotion</title>
</head>
<body>
    <h1>Edit Promotion</h1>
    <?php if ($promotion): ?>
        <form action=" " method="POST">
            <input type="hidden" name="promotion_id" value="<?= htmlspecialchars($promotion['promotion_id']) ?>">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($promotion['Title']) ?>" required>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?= htmlspecialchars($promotion['Description']) ?></textarea>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="<?= htmlspecialchars($promotion['StartDate']) ?>" required>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" value="<?= htmlspecialchars($promotion['EndDate']) ?>" required>
            <button type="submit">Update Promotion</button>
        </form>
    <?php else: ?>
        <p>Promotion not found.</p>
    <?php endif; ?>
</body>
</html>
