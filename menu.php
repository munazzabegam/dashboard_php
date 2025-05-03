<?php
session_start();
include 'components/header.php';

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

// Fetch menu items from the database
$sql = "SELECT * FROM menu"; // Replace 'menu_items' with your actual table name
$result = $conn->query($sql);
?>

<!-- Hero Section -->
<section class="py-5 bg-dark text-white text-center">
  <div class="container" data-aos="fade-up">
    <h1 class="display-4 fw-bold">Our Menu</h1>
    <p class="lead">Explore & Order Your Favorites</p>
  </div>
</section>

<!-- Filter Buttons -->
<section class="py-4 bg-light">
  <div class="container text-center" data-aos="fade-up">
    <div class="row g-3 justify-content-center">
      <div class="col-auto"><button class="btn btn-outline-dark filter-btn active" data-category="all">All</button></div>
      <div class="col-auto"><button class="btn btn-outline-dark filter-btn" data-category="pizza">Pizza</button></div>
      <div class="col-auto"><button class="btn btn-outline-dark filter-btn" data-category="burger">Burger</button></div>
      <div class="col-auto"><button class="btn btn-outline-dark filter-btn" data-category="dessert">Dessert</button></div>
    </div>
  </div>
</section>

<!-- Food Items -->
<section class="py-5">
  <div class="container">
    <div class="row g-4" data-aos="fade-up">

      <?php
      if ($result->num_rows > 0) {
        // Output data for each row
        while($row = $result->fetch_assoc()) {
          $item_name = $row['name'];
          $item_description = $row['description'];
          $item_price = $row['price'];
          $item_category = $row['category']; // Assuming you have a category column
          $item_image = $row['image'];  // Assuming your table has an 'image' column for the image path
      ?>

        <div class="col-md-4 menu-item" data-category="<?= htmlspecialchars($item_category) ?>">
          <div class="card shadow-sm h-100">
            <img src="<?= htmlspecialchars($item_image) ?>" class="card-img-top" alt="<?= htmlspecialchars($item_name) ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($item_name) ?></h5>
              <p class="card-text"><?= htmlspecialchars($item_description) ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-success">₹<?= number_format($item_price, 2) ?></span>
                <button class="btn btn-primary btn-sm add-to-cart" 
                        data-id="<?= $row['id'] ?>"
                        data-name="<?= htmlspecialchars($item_name) ?>"
                        data-price="<?= $item_price ?>"
                        data-image="<?= htmlspecialchars($item_image) ?>">
                  Add to Cart
                </button>
              </div>
            </div>
          </div>
        </div>

      <?php
        }
      } else {
        echo "<p>No menu items found.</p>";
      }

      // Close the database connection
      $conn->close();
      ?>

    </div>
  </div>
</section>

<script>
  // Cart functionality
  document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
      button.addEventListener('click', function() {
        const itemId = this.getAttribute('data-id');
        const itemName = this.getAttribute('data-name');
        const itemPrice = this.getAttribute('data-price');
        const itemImage = this.getAttribute('data-image');
        
        // Create cart item object
        const cartItem = {
          id: itemId,
          name: itemName,
          price: itemPrice,
          image: itemImage,
          quantity: 1
        };
        
        // Get existing cart from session storage
        let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
        
        // Check if item already exists in cart
        const existingItem = cart.find(item => item.id === itemId);
        if (existingItem) {
          existingItem.quantity += 1;
        } else {
          cart.push(cartItem);
        }
        
        // Save cart back to session storage
        sessionStorage.setItem('cart', JSON.stringify(cart));
        
        // Show success message
        alert('Item added to cart!');
        
        // Update cart count in header if it exists
        const cartCount = document.querySelector('.cart-count');
        if (cartCount) {
          const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
          cartCount.textContent = totalItems;
        }
      });
    });
  });

  // Filter functionality
  const filterButtons = document.querySelectorAll(".filter-btn");
  const menuItems = document.querySelectorAll(".menu-item");

  // Function to filter menu items
  function filterMenuItems(category) {
    menuItems.forEach(item => {
      const itemCategory = item.getAttribute("data-category").toLowerCase();
      if (category === "all" || itemCategory === category) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    });
  }

  // Add click event listeners to filter buttons
  filterButtons.forEach(button => {
    button.addEventListener("click", () => {
      // Remove active class from all buttons
      filterButtons.forEach(btn => btn.classList.remove("active"));
      button.classList.add("active");

      const category = button.getAttribute("data-category");
      filterMenuItems(category);
    });
  });

  // Initialize with "all" category
  filterMenuItems("all");
</script>

<?php include 'components/footer.php'; ?>
