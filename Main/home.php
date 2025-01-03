<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>The Gallery Cafe</title>
  <link rel="stylesheet" href="../CSS/home.css">
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
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
          <li><a href="../Dashboard/main/dashboard.php">Admin dashboard</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'staff'): ?>
          <li><a href="../Staff Dashboard/main/staff_dashboard.php">staff dashboard</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</header>

<!-- Your existing HTML content -->


<div class="welcome">
<section id="hero" class="hero">
 
  <div>
    <img src="../Images/logo.jpeg" alt="Images">
    <h1>The Gallery Cafe</h1>
    <p> Experience the best dining in Colombo.</p>
    <button><a href="./promotion.php">Promotions</a></button>
    <button><a href="./Special Events.php">Special Event</a></button>
  </div>
</div>
</section>

<section id="about" class="about">
  <div class="content">
    <h2>About The Gallery Cafe</h2>
    <p>The Gallery Cafe, located in the heart of Colombo, offers an exquisite dining experience combining the finest cuisine with a stunning ambiance. Our menu features a diverse selection of dishes, all crafted with the freshest ingredients to ensure a delightful culinary journey.</p>
    <p>Whether you're here for a casual meal, a romantic dinner, or a special celebration, The Gallery Cafe provides the perfect setting. Our dedicated team is committed to providing exceptional service, making your visit memorable.</p>
    <p>Join us and discover why The Gallery Cafe is a beloved dining destination in Colombo.</p>
  </div>
</section>

<section id="story" class="story">
  <div class="content">
    <div class="story-content">
      <div class="story-text">
        <h2>Our Cafe Story</h2>
        <p> Our story began with a passion for creating an extraordinary dining experience. From the inception of The Gallery Cafe, our mission has been to offer a unique blend of exquisite cuisine, artistic ambiance, and outstanding service.</p>
        <p>Every detail, from our carefully curated menu to the elegant decor, is designed to provide an unforgettable experience. Our team of dedicated chefs and staff work tirelessly to ensure that each visit is special.</p>
        <p>We invite you to be a part of our story, to savor the flavors, and to enjoy the artistry that defines The Gallery Cafe.</p>
      </div>
      <div class="story-image">
        <img src="../Images//our cafe 01.jpeg" alt="Our Cafe Story Image">
      </div>
    </div>
  </div>
</section>


<section id="special-events" class="special-events">
  <div class="content">
    <h2>Special Events & Promotions</h2>
    <div class="events-grid">
      <div class="event-card">
        <div class="event-image">
          <img src="../Images/anivasary.jpg" alt="Event 1">
        </div>
        <div class="event-info">
          <h3>Anniversary Party</h3>
          
        </div>
      </div>
      <div class="event-card">
        <div class="event-image">
          <img src="../Images/birthday.jpg" alt="Event 2">
        </div>
        <div class="event-info">
          <h3>Birthday Event</h3>
          
        </div>
      </div>
      <div class="event-card">
        <div class="event-image">
          <img src="../Images/promo.jpeg" alt="Event 3">
        </div>
        <div class="event-info">
          <h3>Buy One Get One Free</h3>
          <p>Enjoy our special offer - buy any coffee and get another one free! Valid till the end of the month.</p>
         
        </div>
      </div>
    </div>
  </div>
</section>

<section id="reviews" class="reviews">
  <div class="content">
    <h2>Customer Reviews</h2>
    <div class="review-list">
      <div class="review-card">
        <div class="review-header">
          <div class="review-avatar">
            <img src="../Images/C 01.jpeg" alt="Reviewer 1">
          </div>
          <div class="review-info">
            <h3>DIMUTHU LAKSHAN</h3>
            <div class="review-rating">
              ★★★★☆
            </div>
          </div>
        </div>
        <div class="review-body">
          <p>"The Gallery Cafe offers an incredible dining experience. The ambiance is perfect for a special night out, and the food is absolutely delicious. Highly recommend!"</p>
        </div>
      </div>
      <div class="review-card">
        <div class="review-header">
          <div class="review-avatar">
            <img src="../Images/c 02.jpeg" alt="Reviewer 2">
          </div>
          <div class="review-info">
            <h3>GAYANI SIRIWARDHANA</h3>
            <div class="review-rating">
              ★★★★★
            </div>
          </div>
        </div>
        <div class="review-body">
          <p>"Fantastic place for a family dinner. The service was impeccable, and the food exceeded our expectations. We will definitely be coming back!"</p>
        </div>
      </div>
      
    </div>
  </div>
</section>
<footer>
  <div class="footer-content">
      <div class="footer-section">
        <h3>The Gallery cafe</h3>
        <p>Experience the best dining in Colombo.<p>
          
      </div>
      <div class="footer-section">
          <h3>CONTACT US</h3>
          <p>ADDRESS: De Mel Mawatha,Colombo</p>
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
        <h3>FOLLOW  US</h3>
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
</body>
</html>