<?php
session_start();

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
$sql = "SELECT * FROM special_events";
$result = mysqli_query($conn, $sql);

if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Events</title>
    <link rel="stylesheet" href="../CSS/special event.css">
</head>
<body>
    
<header id="header">
    <div id="topbar" class="topbar">
    <h1><a href="">The Gallery cafe</a></h1>
  
    <nav id="navbar" class="navbar">
      <ul>
        
        <li><a href="../Main/home.php">Home</a></li>
        <li><a href="../Main/Menu.php">Menu</a></li>
        <li><a href="../Main/Reservation.php">Reservations</a></li>
        <li><a href="../Main/About.v">About Us</a></li>
        <li><a href="../Main/Contact.php">Contact Us</a></li>
        <li><a href="../Main/LoginForm.php">Login</a></li>
      
      </ul>
    </nav>
  </div>
  </header>
 
    <main>
        <section class="about-header">
            <h1>SPECIAL EVENT</h1>
            <div class="cart-container">
                <a href="./cart.php"><img src="../Images/cart.png" alt="Cart"></a>
            </div>
        </section>

        
<section id="special-events" class="special-events">
  <div class="content">
    <h2>Special Events </h2>
    <div class="events-grid">

    <?php while ($row = mysqli_fetch_array($result)) {
            echo '<div class="event-card">';
            echo '<div>';
            echo '</div>';
            echo ' <div class="event-info">';
            echo "<h3>" . htmlspecialchars($row["event_name"]) ."</h3>";
            echo "<p>". htmlspecialchars($row["description"]) ."</p>";
            echo '</div>';
            echo '</div>';
          } ?>

        </div>
      </div>
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
