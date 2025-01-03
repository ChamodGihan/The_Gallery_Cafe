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

// Fetch pre-orders
$sql = "SELECT * FROM pre_orders"; 
$result = mysqli_query($conn, $sql);

// Display pre-orders
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["order_id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["phone_number"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["order_date"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["pickup_time"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["number_of_items"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
        echo "<td>
            <button class='edit-btn'>Edit</button>
      
        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No pre-orders found</td></tr>";
}

// Close connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe - View Pre-Orders</title>
    <link rel="stylesheet" href="../CSS/viewpre-oders.css">
</head>
<body>
    <header id="header">
        <div id="topbar" class="topbar">
            <h1><a href="">The Gallery Cafe</a></h1>
            
            <?php include('./navbar.php'); ?>

        </div>
    </header>

    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">
                <h2>The Gallery Cafe</h2>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="./staff_dashboard.php">Dashboard</a></li>
                    <li><a href="./View_reservations.php">View Reservations</a></li>
                    <li><a href="./ViewPreOrders.php">View Pre-Orders</a></li>
                    <li><a href="./Logout.php">Logout</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>View Pre-Orders</h1>
            </header>
            <section class="content">
                <table class="pre-orders-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Order Date</th>
                            <th>Pickup Time</th>
                            <th>Number of Items</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
