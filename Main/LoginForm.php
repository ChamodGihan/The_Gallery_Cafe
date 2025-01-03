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

// Form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {
    // Retrieve form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Check user credentials
    $sql = "SELECT UserID, Username, Password, role FROM users WHERE Username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // Verify password
        if (password_verify($password, $row['Password'])) {
            // Start session and store user data
            $_SESSION['UserID'] = $row['UserID'];
            $_SESSION['Username'] = $row['Username'];
            $_SESSION['role'] = $row['role'];
            
            // Redirect to a user dashboard or home page
            header("Location: home.php"); // Update to your desired page
            exit();
        } else {
            echo "<script>alert('Invalid credentials'); window.location.href = 'LoginForm.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials'); window.location.href = 'LoginForm.php';</script>";
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="../CSS/LoginForm.css">
</head>
<body>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form method="post" action="register.php">
        <h1>Sign up</h1>
        <span>Use your Username and password</span>
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="signup">Sign up</button>
      </form>
    </div>
    <div class="form-container sign-in-container">

      <form method="post" action="">
        <h1>Sign In</h1>
        <span>Use your Username and password</span>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <a href="#">Forgot Your password?</a>
        <button type="submit" name="signin">Sign In</button>
      </form>

    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome to The Gallery Cafe</h1>
          <p>Register with your personal info to use all site features</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Welcome to The Gallery Cafe</h1>
          <p>Register with your personal info to use all site features</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
  <script src="../JS/login.js"></script>
</body>
</html>