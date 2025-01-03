<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Cafenod</title>
    <link rel="stylesheet" href="../CSS/pre-oders.css">
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
            <h1>PRE-ODER</h1>
            <div class="cart-container">
                <a href="./cart.html"><img src="../Images/cart.png" alt="Cart"></a>
            </div>
            
        </section>
  <section id="pre-order-form" class="pre-order-form">
      <div class="form-container">
          <h2>Place Your Pre-Order</h2>
          <form action="submit_pre_order.php" method="POST">
              <div class="form-group">
                  <input type="text" id="name" name="name" placeholder="Item Name" required>
              </div>
              <div class="form-group">
                  <input type="tel" id="phone" name="phone" placeholder="Your Phone Number" required>
              </div>
              <div class="form-group">
                  <input type="date" id="order_date" name="order_date" placeholder="Order Date" required>
              </div>
              
              <div class="form-group">
                  <input type="number" id="number_of_items" name="number_of_items" placeholder="Number of Items" required>
              </div>
              <div class="form-group">
                  <input type="email" id="email" name="email" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                  <button type="submit">Submit Pre-Order</button>
              </div>
          </form>
      </div>
  </section>
  <section id="pre-order-image" class="pre-order-image">
      <img src="../Images/image-banners.jpg" alt="Delicious pre-ordered meals">
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
            <a href="#"><img src="../Images/facebook logo.png" alt="Facebook"></a>
            <a href="#"><img src="../Images/icons-TWlogo.png" alt="Twitter"></a>
            <a href="#"><img src="../Images/icons-instagram-logo (1).png" alt="Instagram"></a>
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
