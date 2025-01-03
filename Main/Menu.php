<?php
// database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "the_gallery_cafe";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT id, category, subcategory, meal_name, price, image FROM meals";
$result = mysqli_query($conn, $sql);

$meals = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $meals[] = $row;
    }
} else {
    echo "0 results";
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Cafenod</title>
    <link rel="stylesheet" href="../CSS/Menu.css">
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
                <li><a href="../Main/About.php">About Us</a></li>
                <li><a href="../Main/Contact.php">Contact Us</a></li>
                <li><a href="../Main/LoginForm.php">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <section class="about-header">
        <h1>OUR MENU</h1>
        <div class="cart-container">
            <a href="./cart.php"><img src="../Images/cart.png" alt="Cart"></a>
        </div>
    </section>

    <section class="menu-categories">
        <ul>
            <li class="active" data-category="all">All</li>
            <li data-category="Sri Lanka">Sri Lanka</li>
            <li data-category="Chinese">Chinese</li>
            <li data-category="Italian">Italian</li>
        </ul>
    </section>

    <section class="menu-subcategories" id="SriLanka-subcategories" style="display: none;">
        <ul>
            <li class="active" data-subcategory="all">All</li>
            <li data-subcategory="Beverages">Beverages</li>
            <li data-subcategory="Fresh juice">Fresh juice</li>
            <li data-subcategory="Desserts">Desserts</li>
            <li data-subcategory="Seafood Menu">Seafood Menu</li>
            <li data-subcategory="Noodles Menu">Noodles Menu</li>
        </ul>
    </section>

    <section class="menu-subcategories" id="Chinese-subcategories" style="display: none;">
        <ul>
            <li class="active" data-subcategory="all">All</li>
            <li data-subcategory="Chinese Main Dishes">Chinese Main Dishes</li>
            <li data-subcategory="Chinese Seafood Main Dishes">Chinese Seafood Main Dishes</li>
            <li data-subcategory="Chinese Appetizers">Chinese Appetizers</li>
        </ul>
    </section>

    <section class="menu-subcategories" id="Italian-subcategories" style="display: none;">
        <ul>
            <li class="active" data-subcategory="all">All</li>
            <li data-subcategory="Drinks">Drinks</li>
            <li data-subcategory="Main Dishes">Main Dishes</li>
            <li data-subcategory="Soups and Stews">Soups and Stews</li>
        </ul>
    </section>

    <section class="menu-items">
        <?php foreach ($meals as $meal): ?>
            <div class="menu-item" data-category="<?php echo htmlspecialchars($meal['category']); ?>" data-subcategory="<?php echo htmlspecialchars($meal['subcategory']); ?>">
                <?php
                $imgData = $meal['image'];
                $imgType = 'image/jpeg'; 
                $base64Image = base64_encode($imgData);
                $imgSrc = 'data:' . $imgType . ';base64,' . $base64Image;
                ?>
                <img src="<?php echo $imgSrc; ?>" alt="">
                <div class="item-info">
                    <h3><?php echo htmlspecialchars($meal['meal_name']); ?></h3>
                    <span class="price">Rs.<?php echo htmlspecialchars(number_format($meal['price'], 2)); ?></span>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="item_name" value="<?php echo htmlspecialchars($meal['meal_name']); ?>">
                        <input type="hidden" name="item_price" value="<?php echo htmlspecialchars($meal['price']); ?>">
                        <input type="number" name="item_quantity" value="1" min="1">
                        <button type="submit" class="menubtn">Add to cart</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
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
            <h3>FOLLOW US</h3>
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

<script src="../JS/Menu.js"></script>
</body>
</html>
