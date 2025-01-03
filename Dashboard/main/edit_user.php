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

// Check if ID is provided
if (isset($_GET['id'])) {
    $userId = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch user data
    $sql = "SELECT * FROM users WHERE UserID = '$userId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "No user ID provided.";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../CSS/edit_user.css">
</head>
<body>
    <header>
        <h1>Edit User</h1>
    </header>
    <main>
        <form action="update_user.php" method="post">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['UserID']) ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['Firstname'] . ' ' . $user['Lastname']) ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['Email']) ?>" required>
            
            <label for="role">Role:</label>
            <input type="text" id="role" name="role" value="<?= htmlspecialchars($user['role']) ?>" required>
            
            <button type="submit">Update User</button>
        </form>
    </main>
</body>
</html>
