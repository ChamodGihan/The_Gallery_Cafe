<?php
session_start(); 

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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $guests = mysqli_real_escape_string($conn, $_POST['guests']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $sql = "INSERT INTO reservations (name, phone_number, reservation_date, reservation_time, number_of_guests, email) 
        VALUES ('$name', '$phone', '$date', '$time', '$guests', '$email')";

    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Reservation successfully added!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
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
    <title>About Us - Cafenod</title>
    <link rel="stylesheet" href="../CSS/Reservations.css">
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
                <li><a href="../Main/LoginForm.php">Login</a></li>
            </ul>
        </nav>
    </div>
</header>
 
<main>
    <section class="about-header">
        <h1>RESERVATION</h1>
        <div class="cart-container">
            <a href="./cart.php"><img src="../Images/cart.png" alt="Cart"></a>
        </div>
    </section>
    
    <section id="reservation-form" class="reservation-form">
        <div class="form-container">
            <h2>BOOK A TABLE</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" id="name" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="text" id="phone" name="phone" placeholder="Your Phone" required>
                </div>
                <div class="form-group">
                    <input type="date" id="date" name="date" placeholder="Select Date" required>
                </div>
                <div class="form-group">
                    <input type="time" id="time" name="time" placeholder="Enter Time" required>
                </div>
                <div class="form-group">
                    <input type="number" id="guests" name="guests" placeholder="Number of Guests" required>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <button type="submit">Submit Your Request</button>
                </div>
            </form>
        </div>
    </section>
    
    <section id="reservation-image" class="reservation-image">
        <img src="../Images/image-banners.jpg" alt="Happy customers">
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>The Gallery Cafe</h3>
                <p>Experience the best dining in Colombo.</p>
            </div>
            <div class="footer-section">
                <h3>CONTACT US</h3>
                <p>ADDRESS: De Mel Mawatha, Colombo</p>
                <p>EMAIL: Thegallerycafe@gmail.com</p>
                <p>PHONE: +9411 300 8888</p>
                <p>FAX ID: +94 65459 49594</p>
            </div>
            <div class="footer-section">
                <h3>OPENING HOURS</h3>
                <p>Saturday: 09:00 - 18:00</p>
                <p>Sunday: 09:00 - 18:00</p>
                <p>Monday: 08:00 - 23:00</p>
                <p>Tuesday: 08:00 - 23:00</p>
                <p>Wednesday: 08:00 - 23:00</p>
                <p>Thursday: 08:00 - 23:00</p>
                <p>Friday: Closed</p>
            </div>
            <div class="footer-section">
                <div class="social-icons">
                    <a href=""><img src="../Images/facebook logo.png" alt="Facebook"></a>
                    <a href=""><img src="../Images/icons-TWlogo.png" alt="Twitter"></a>
                    <a href=""><img src="../Images/icons-instagram-logo (1).png" alt="Instagram"></a>
                </div>
            </div>
        </div>
        <div class="newsletter">
            <input type="email" placeholder="Enter your email">
            <button>SUBSCRIBE NOW</button>
        </div>
        <div class="footer-bottom">
            <p>&copy; Copyright 2024 - All Rights Reserved | With love by The Gallery Cafe</p>
        </div>
    </footer>
</main>
</body>
</html>
