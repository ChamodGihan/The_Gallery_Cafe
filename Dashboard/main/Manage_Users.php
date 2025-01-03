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

// Fetch users
$sql = "SELECT * FROM Users";
$result = mysqli_query($conn, $sql);

// Store users data
$users = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Cafe - Manage Users</title>
    <link rel="stylesheet" href="../CSS/ManageUser.css">
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
                <h1>Manage Users</h1>
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
                <div class="manage-users">
                    <a href="add_user.php" class="add-user-btn">Add New User</a>
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user["UserID"] ?? '') ?></td>
                                        <td><?= htmlspecialchars($user["Firstname"] ?? '') ?></td>
                                        <td><?= htmlspecialchars($user["Email"] ?? '') ?></td>
                                        <td><?= htmlspecialchars($user["role"] ?? '') ?></td>
                                        <td>
                                            <a href="edit_user.php?id=<?= htmlspecialchars($user["UserID"] ?? '') ?>" class='edit-btn'>Edit</a>
                                            <a href="delete_user.php?id=<?= htmlspecialchars($user["UserID"] ?? '') ?>" class='delete-btn' onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan='5'>No users found</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
