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

// Get meal ID from query parameters
if (isset($_GET['id'])) {
    $meal_id = intval($_GET['id']);

    // Fetch meal details for editing
    $sql = "SELECT * FROM meals WHERE id = $meal_id";
    $result = mysqli_query($conn, $sql);
    $meal = mysqli_fetch_assoc($result);

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $subcategory = mysqli_real_escape_string($conn, $_POST['subcategory']);
        $mealName = mysqli_real_escape_string($conn, $_POST['mealName']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image = file_get_contents($_FILES['image']['tmp_name']);
            $image = mysqli_real_escape_string($conn, $image);
            $sql = "UPDATE meals SET category='$category', subcategory='$subcategory', meal_name='$mealName', price='$price', image='$image' WHERE id=$meal_id";
        } else {
            $sql = "UPDATE meals SET category='$category', subcategory='$subcategory', meal_name='$mealName', price='$price' WHERE id=$meal_id";
        }

        if (mysqli_query($conn, $sql)) {
            header("Location: ManageMeals.php");
            exit();
        } else {
            echo "<p>Error updating meal: " . mysqli_error($conn) . "</p>";
        }
    }
} else {
    echo "No meal ID specified.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meal</title>
    <link rel="stylesheet" href="../CSS/edit_meal.css">
</head>
<body>
    <div class="container">
        <h1>Edit Meal</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" id="category" name="category" value="<?= htmlspecialchars($meal['category']) ?>" required>
            </div>
            <div class="form-group">
                <label for="subcategory">Subcategory</label>
                <input type="text" id="subcategory" name="subcategory" value="<?= htmlspecialchars($meal['subcategory']) ?>" required>
            </div>
            <div class="form-group">
                <label for="mealName">Meal Name</label>
                <input type="text" id="mealName" name="mealName" value="<?= htmlspecialchars($meal['meal_name']) ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" value="<?= htmlspecialchars($meal['price']) ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image">
                <img src="data:image/jpeg;base64,<?= base64_encode($meal['image']) ?>" alt="Meal Image" width="100">
            </div>
            <button type="submit">Update Meal</button>
        </form>
    </div>
</body>
</html>
