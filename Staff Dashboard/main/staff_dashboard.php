<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe - Staff Dashboard</title>
    <link rel="stylesheet" href="../CSS/staff_dashboard.css">
</head>
<body>

    <header id="header">
        <div id="topbar" class="topbar">
            <h1><a href="">The Gallery Cafe</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="../Main/home.php">Home</a></li>
                    <li><a href="../Main/Menu.php">Menu</a></li>
                    <li><a href="../Main/Reservation.php">Reservations</a></li>
                    <li><a href="../Main/About.php">About Us</a></li>
                    <li><a href="../Main/Contact.php">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">
                <h2>The Gallery Cafe</h2>
            </div>
            <?php include('./navbar.php'); ?>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>Staff Dashboard</h1>
                <div class="user-info">
                    <div class="profile-card">
                        <img src="../../Images/C 01.jpeg" alt="Staff Profile Picture">
                        <div class="profile-details">
                            <p>Vimukthi</p>
                        </div>
                    </div>
                </div>
            </header>
            <section class="content">
                <div class="cards">
                    <div class="card">
                        <h3><a href="./ViewReservations.php">View Reservations</a></h3>
                        <p>Confirm, modify, or cancel reservations</p>
                    </div>
                    <div class="card">
                        <h3><a href="./ViewPreOrders.php">View Pre-Orders</a></h3>
                        <p>Confirm, modify, or cancel pre-orders</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
