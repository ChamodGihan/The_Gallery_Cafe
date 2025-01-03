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

// Handle form submission
if (isset($_POST['submit'])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $subcategory = mysqli_real_escape_string($conn, $_POST['subcategory']);
    $mealName = mysqli_real_escape_string($conn, $_POST['mealName']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    
    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $image = mysqli_real_escape_string($conn, $image);

        $sql = "INSERT INTO meals (category, subcategory, meal_name, price, image) VALUES ('$category', '$subcategory', '$mealName', '$price', '$image')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('New meal added successfully!');</script>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>Error uploading file.</p>";
    }
}

// Fetch existing meals
$sql = "SELECT * FROM meals";
$result = mysqli_query($conn, $sql);

// Check for query errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe - Manage Meals</title>
    <link rel="stylesheet" href="../CSS/ManageMeals.css">
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
                <h1>Manage Meals</h1>
            </header>
            <section class="content">
                <div class="form-container">
                    <h2>Add New Meal</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- Form Fields -->
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" id="category" name="category" placeholder="Enter Category" required>
                        </div>
                        <div class="form-group">
                            <label for="subcategory">Subcategory</label>
                            <input type="text" id="subcategory" name="subcategory" placeholder="Enter Subcategory" required>
                        </div>
                        <div class="form-group">
                            <label for="mealName">Meal Name</label>
                            <input type="text" id="mealName" name="mealName" placeholder="Enter Meal Name" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" placeholder="Enter Price" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit">Add Meal</button>
                        </div>
                    </form>
                </div>
                <div class="table-container">
                    <h2>Manage Existing Meals</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Meal Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php
    // Fetch and display meals
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["category"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["subcategory"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["meal_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["price"]) . "</td>";
        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row["image"]) . "' alt='" . htmlspecialchars($row["meal_name"]) . "' width='100'></td>";
        echo "<td>
            <a href='edit_meal.php?id=" . htmlspecialchars($row["id"]) . "' class='edit-btn'>Edit</a>
            <a href='delete_meal.php?id=" . htmlspecialchars($row["id"]) . "' class='delete-btn' onclick=\"return confirm('Are you sure you want to delete this meal?')\">Delete</a>
        </td>";
        echo "</tr>";
    }
    mysqli_close($conn);
    ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
