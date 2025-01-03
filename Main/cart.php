<?php
session_start(); // Start the session

// Initialize the cart if it doesn't already exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['remove_item'])) {
        // Remove item from cart
        $item_name_to_remove = htmlspecialchars($_POST['item_name']);
        foreach ($_SESSION['cart'] as $key => $cart_item) {
            if ($cart_item['name'] === $item_name_to_remove) {
                unset($_SESSION['cart'][$key]); // Remove item from cart
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
                break;
            }
        }
    } else {
        // Retrieve and sanitize form inputs for adding items
        $item_name = htmlspecialchars($_POST['item_name']);
        $item_price = htmlspecialchars($_POST['item_price']);
        $item_quantity = intval($_POST['item_quantity']);

        // Check if the item already exists in the cart
        $item_exists = false;
        foreach ($_SESSION['cart'] as &$cart_item) {
            if ($cart_item['name'] === $item_name) {
                $cart_item['quantity'] += $item_quantity; // Update quantity
                $item_exists = true;
                break;
            }
        }

        // If item doesn't exist, add it to the cart
        if (!$item_exists) {
            $_SESSION['cart'][] = array(
                'name' => $item_name,
                'price' => $item_price,
                'quantity' => $item_quantity
            );
        }
    }

    // Redirect to cart page
    header("Location: cart.php?action=view");
    exit();
}

// Display cart contents
if (isset($_GET['action']) && $_GET['action'] == 'view') {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart - The Gallery Cafe</title>
        <link rel="stylesheet" href="../CSS/Cart.css">
    </head>
    <body>
    <header>
        <div class="header-container">
            <h1><a href="../Main/home.php">The Gallery Cafe</a></h1>
            <nav>
                <ul>
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
        <section class="cart-section">
            <h1>Your Cart</h1>
            <?php
            if (!empty($_SESSION['cart'])) {
                echo "<table class='cart-table'>";
                echo "<tr><th>Item Name</th><th>Quantity</th><th>Price</th><th>Total</th><th>Action</th></tr>";
                $total = 0;
                foreach ($_SESSION['cart'] as $item) {
                    $item_total = $item['price'] * $item['quantity'];
                    $total += $item_total;
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($item['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($item['quantity']) . "</td>";
                    echo "<td>Rs. " . htmlspecialchars(number_format($item['price'], 2)) . "</td>";
                    echo "<td>Rs. " . htmlspecialchars(number_format($item_total, 2)) . "</td>";
                    echo "<td>";
                    echo "<form action='cart.php' method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='item_name' value='" . htmlspecialchars($item['name']) . "'>";
                    echo "<button type='submit' name='remove_item' class='link'>Remove</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "<tr><td colspan='4'>Grand Total</td><td>Rs. " . htmlspecialchars(number_format($total, 2)) . "</td></tr>";
                echo "</table>";
            } else {
                echo "<p>Your cart is empty.</p>";
            }
            ?>
            <div class="cart-actions">
                <a href="../Main/Menu.php" class="link">Continue Shopping</a>
                <a href="#" class="link">Checkout</a> 
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
    </body>
    </html>
    <?php
}
?>
