<?php
session_start(); 
// Database connection details
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

// Initialize variables
$first_name = $last_name = $username = $email = $password = "";
$errors = array();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    // Check if POST data is set and not empty
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['email'], $_POST['password'])) {
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        // Validate input
        if (empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($password)) {
            $errors[] = "All fields are required.";
        }

        if (empty($errors)) {
            // Encrypt password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into the database
            $sql = "INSERT INTO users (Firstname, Lastname, Username, email, password, role) 
                    VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password', 'customer')"; // Set default role to 'customer'
            
            if (mysqli_query($conn, $sql)) {
                echo "User registered successfully.";
                // Optionally redirect or display a success message
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
