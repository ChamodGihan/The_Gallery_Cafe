<?php
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

// Check if ID is provided
if (isset($_GET['id'])) {
    $reservationId = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch reservation data
    $sql = "SELECT * FROM reservations WHERE reservation_id = '$reservationId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $reservation = mysqli_fetch_assoc($result);
    } else {
        echo "Reservation not found.";
        exit();
    }
} else {
    echo "No reservation ID provided.";
    exit();
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
    <link rel="stylesheet" href="../CSS/edit_reservation.css">
</head>
<body>
    <div class="container">
        <h1>Edit Reservation</h1>
        <?php if ($reservation): ?>
            <form action=" " method="post">
    <input type="hidden" name="reservation_id" value="<?= htmlspecialchars($reservation['reservation_id']) ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($reservation['name']) ?>" required>
    
    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number" value="<?= htmlspecialchars($reservation['phone_number']) ?>" required>
    
    <label for="reservation_date">Reservation Date:</label>
    <input type="date" id="reservation_date" name="reservation_date" value="<?= htmlspecialchars($reservation['reservation_date']) ?>" required>
    
    <label for="reservation_time">Reservation Time:</label>
    <input type="time" id="reservation_time" name="reservation_time" value="<?= htmlspecialchars($reservation['reservation_time']) ?>" required>
    
    <label for="number_of_guests">Number of Guests:</label>
    <input type="number" id="number_of_guests" name="number_of_guests" value="<?= htmlspecialchars($reservation['number_of_guests']) ?>" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($reservation['email']) ?>" required>
    
    <button type="submit">Update Reservation</button>
</form>

            
        <?php else: ?>
            <p class="error">Reservation not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
