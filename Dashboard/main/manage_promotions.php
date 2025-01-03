<?php
// Database connection details
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

// Handle adding a new promotion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $startDate = mysqli_real_escape_string($conn, $_POST['start_date']);
    $endDate = mysqli_real_escape_string($conn, $_POST['end_date']);
    
    $insertSQL = "INSERT INTO promotions (Title, Description, StartDate, EndDate) VALUES ('$title', '$description', '$startDate', '$endDate')";
    if (mysqli_query($conn, $insertSQL)) {
        header("Location: manage_promotions.php");
        exit();
    } else {
        $error = "Error adding promotion: " . mysqli_error($conn);
    }
}

// Fetch promotions
$sql = "SELECT * FROM promotions";
$result = mysqli_query($conn, $sql);

// Store promotions data
$promotions = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $promotions[] = $row;
    }
} else {
    $error = "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe - Manage Promotions</title>
    <link rel="stylesheet" href="../CSS/managepromotion.css">
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
                <h1>Manage Promotions</h1>
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
                <div class="manage-promotions">
                    <!-- Form to add a new promotion -->
                    <form action="manage_promotions.php" method="POST">
                        <h2>Add New Promotion</h2>
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" required>
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required></textarea>
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" required>
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" name="end_date" required>
                        <button type="submit">Add Promotion</button>
                    </form>

                    <!-- Table to display promotions -->
                    <table class="promotions-table">
                        <thead>
                            <tr>
                                <th>Promotion ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            if (isset($promotions) && !empty($promotions)) {
                                foreach ($promotions as $promotion) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($promotion["promotion_id"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($promotion["Title"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($promotion["Description"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($promotion["StartDate"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($promotion["EndDate"]) . "</td>";
                                    echo "<td>
                                        <a href='edit_promotion.php?id=" . htmlspecialchars($promotion['promotion_id']) . "' class='edit-btn'>Edit</a>
                                        <a href='delete_promotion.php?id=" . htmlspecialchars($promotion['promotion_id']) . "' class='delete-btn' onclick=\"return confirm('Are you sure you want to delete this promotion?')\">Delete</a>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No promotions found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
