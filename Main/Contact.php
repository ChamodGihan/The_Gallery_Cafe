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
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    // Insert data into the contacts table
    $sql = "INSERT INTO contacts (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Message sent successfully!');</script>";
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
    <title>Contact Us - The Gallery Cafe</title>
    <link rel="stylesheet" href="../CSS/Contact.css">
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
        <h1>CONTACT US</h1>
        <div class="cart-container">
            <a href="./cart.php"><img src="../Images/cart.png" alt="Cart"></a>
        </div>
    </section>
    
    <section class="contact-info">
        <div class="info1">
            <div class="info">
                <h2>Email Address</h2>
                <p>Thegallerycafe@gmail.com</p>
                <p>info@gallerycafe@gmail.com</p>
            </div>
        </div>
        <div class="info1">
            <div class="info">
                <h2>Our Location</h2>
                <p>De Mel Mawatha, Colombo 003.</p>
            </div>
        </div>
        <div class="info1">
            <div class="info">
                <h2>Phone Number</h2>
                <p>+9411 300 8888</p>
                <p>+9477 885 3000</p>
            </div>
        </div>
    </section>

    <section id="contact-form" class="contact-form">
        <div class="form-container">
            <h2>Send Us a Message</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="text" id="subject" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea id="message" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>

    <section class="map">
        <h2>Find Us Here</h2>
        <div id="map"> 
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12837.138573446868!2d79.87500752454226!3d6.90107980004602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2slk!4v1722343797669!5m2!1sen!2slk" width="1450" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</main>

<footer>
    <div class="footer-content">
        <div class="footer-section">
            <h3>THE GALLERY CAFE</h3>
            <p>Experience the best dining in Colombo.</p>
        </div>
        <div class="footer-section">
            <h3>CONTACT US</h3>
            <p>Address: De Mel Mawatha, Colombo</p>
            <p>Email: Thegallerycafe@gmail.com</p>
            <p>Phone: +9411 300 8888</p>
            <p>Fax: +94 65459 49594</p>
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
            <h3>FOLLOW US</h3>
            <div class="social-icons">
                <a href="#"><img src="../Images/facebook logo.png" alt="Facebook"></a>
                <a href="#"><img src="../Images/icons-instagram-logo (1).png" alt="Instagram"></a>
                <a href="#"><img src="../Images/icons-TWlogo.png" alt="Twitter"></a>
            </div>
        </div>
    </div>
    <div class="newsletter">
        <input type="email" placeholder="Enter your email">
        <button>Subscribe Now</button>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 The Gallery Café. All Rights Reserved.</p>
    </div>
</footer>
</body>
</html>
