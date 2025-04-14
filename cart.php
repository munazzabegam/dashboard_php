<?php
session_start();
include 'components/header.php';

// Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");  
//     exit();
// }

$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!-- Cart Page -->
<section class="py-5 bg-light">
  <div class="container" data-aos="fade-up">
    <h2 class="mb-4 text-center fw-bold">🛒 Your Cart</h2>

    <?php if (!empty($_SESSION['cart'])): ?>
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-dark">
            <tr>
              <th>Item</th>
              <th class="text-center">Quantity</th>
              <th class="text-end">Price</th>
              <th class="text-end">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $grand_total = 0;
              // Loop through the cart items
              foreach ($_SESSION['cart'] as $item_id => $item) {
                // Fetch item details from the database
                $sql = "SELECT name, price FROM menu_items WHERE id = $item_id"; // Replace 'menu_items' with your table name
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  $item_details = $result->fetch_assoc();
                  $item_name = $item_details['name'];
                  $item_price = $item_details['price'];
                } else {
                  $item_name = "Unknown Item";
                  $item_price = 0;
                }

                // Calculate the total price for this item
                $total_price = $item_price * $item['quantity'];
                $grand_total += $total_price;
            ?>
              <tr>
                <td><?= htmlspecialchars($item_name) ?></td>
                <td class="text-center"><?= $item['quantity'] ?></td>
                <td class="text-end">₹<?= number_format($item_price, 2) ?></td>
                <td class="text-end">₹<?= number_format($total_price, 2) ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-between align-items-center mt-4">
        <h4>Total Amount: ₹<?= number_format($grand_total, 2) ?></h4>
        <div>
          <a href="menu.php" class="btn btn-outline-secondary me-2">← Continue Shopping</a>
          <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
        </div>
      </div>
    <?php else: ?>
      <div class="alert alert-warning text-center" role="alert">
        Your cart is currently empty.
      </div>
      <div class="text-center">
        <a href="menu.php" class="btn btn-primary">Browse Menu</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php
// Close the database connection
$conn->close();
?>

<?php include 'components/footer.php'; ?>
