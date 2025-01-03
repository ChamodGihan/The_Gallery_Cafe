<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe - Manage Orders</title>
    <link rel="stylesheet" href="../CSS/ManageOrders.css">
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">
                <h2>The Gallery Cafe</h2>
            </div>
            <nav class="sidebar-nav">
            <nav class="sidebar-nav">
            <   <ul>
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
                <h1>Manage Orders</h1>
                <div class="user-info">
                    <div class="profile-card">
                        <img src="profile-pic.jpg" alt="Admin Profile Picture">
                        <div class="profile-details">
                            <p>GIHAN</p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </header>
            <section class="content">
                <div class="table-container">
                    <h2>Order List</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Contact</th>
                                <th>Meal</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                       

                        
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
