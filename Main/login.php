<?php
session_start();

// Database config
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "the_gallery_cafe";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {
    // Retrieve form data
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];

    // Query to check if the user exists
    $sql = "SELECT * FROM users WHERE username='$user'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Verify the password
        if (password_verify($pass, $row['Password'])) {
            // Store user information in session variables
            $_SESSION['username'] = $row['Username'];
            $_SESSION['role'] = $row['role'];
            echo "<script>alert('Login successful!'); window.location.href = 'home.html';</script>";
        } else {
            // If password is incorrect
            echo "<script>alert('Error: Incorrect password.'); window.location.href = 'LoginForm.php';</script>";
        }
    } else {
        // If username doesn't exist
        echo "<script>alert('Error: Username does not exist.'); window.location.href = 'LoginForm.php';</script>";
    }
}

mysqli_close($conn);
?>
