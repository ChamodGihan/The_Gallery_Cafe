<?php
session_start(); 


$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "the_gallery_cafe"; 


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if user is logged in and is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: LoginForm.php"); // Redirect to login page or any other page
    exit();
}

// Initialize variables
$first_name = $last_name = $email = $password = $user_type = "";
$errors = array();

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if POST data is set and not empty
    if (isset($_POST['first_name'], $_POST['last_name'],$_POST['username'], $_POST['email'], $_POST['password'], $_POST['user_type'])) {
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
        
        // Validate input
        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($user_type)) {
            $errors[] = "All fields are required.";
        }

        if (empty($errors)) {
            // Encrypt password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert user into the database
            $sql = "INSERT INTO users (Firstname, Lastname,Username, email, password, role) VALUES ('$first_name', '$last_name','$username', '$email', '$hashed_password', '$user_type')";
            
            if (mysqli_query($conn, $sql)) {
                echo "<script>  alert('New user added successfully.');  </script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
        }
    } else {
        echo "<p>No form data submitted.</p>";
    }
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User - The Gallery Café</title>
    <link rel="stylesheet" href="../CSS/add_user.css"> 
</head>
<body>

<header>
    <h1>Add New User</h1>
</header>

<main>
    <form action=" " method="POST">
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>
        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>

        <div>
            <label for="username">Username:</label>
            <input type="username" id="username" name="username" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="user_type">User Type:</label>
            <select id="user_type" name="user_type" required>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
                <option value="customer">customer</option>
            </select>
        </div>
        <button type="submit">Add User</button>
    </form>
</main>

</body>
</html>
