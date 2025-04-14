<?php
// Database connection
$servername = "localhost";
$username = "root";  // Replace with your database username
$password = "";      // Replace with your database password
$dbname = "restaurant"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// include 'includes/auth_user.php'; 
// include 'includes/functions.php'; 

// Check if the user is logged in
// requireLogin(); 

// If the cart is empty, redirect to the menu page
if (empty($_SESSION['cart'])) {
    header("Location: menu.php");
    exit();
}

// Handle form submission (payment, address, etc.)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id']; // Assuming user session exists
    $address = sanitizeInput($_POST['address']); // Sanitize address input
    $payment_method = sanitizeInput($_POST['payment_method']); // Sanitize payment method

    // Here, you could insert the order into the database
    $conn = getDbConnection();
    $order_query = "INSERT INTO orders (user_id, address, payment_method, order_date) 
                    VALUES ('$user_id', '$address', '$payment_method', NOW())";
    if ($conn->query($order_query)) {
        $order_id = $conn->insert_id; // Get the inserted order ID

        // Insert each cart item as an order item in the database
        foreach ($_SESSION['cart'] as $item_id => $quantity) {
            $cart_item_query = "INSERT INTO order_items (order_id, menu_item_id, quantity) 
                                VALUES ('$order_id', '$item_id', '$quantity')";
            $conn->query($cart_item_query);
        }

        // Clear the cart after the order is placed
        unset($_SESSION['cart']);

        // Redirect to an order confirmation page
        header("Location: order_confirmation.php?order_id=$order_id");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!-- Checkout Form -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center">Checkout</h2>

        <form action="checkout.php" method="POST">
            <!-- Shipping Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Shipping Address</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>

            <!-- Payment Method -->
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select id="payment_method" name="payment_method" class="form-select" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="cash_on_delivery">Cash on Delivery</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Confirm Order</button>
        </form>
    </div>
</section>
