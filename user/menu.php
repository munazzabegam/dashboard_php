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
            <img src="assets/images/<?= htmlspecialchars($item_image) ?>" class="card-img-top" alt="<?= htmlspecialchars($item_name) ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($item_name) ?></h5>
              <p class="card-text"><?= htmlspecialchars($item_description) ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-success">₹<?= number_format($item_price, 2) ?></span>
                <button class="btn btn-primary btn-sm">Add to Cart</button>
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
  const filterButtons = document.querySelectorAll(".filter-btn");
  const menuItems = document.querySelectorAll(".menu-item");

  filterButtons.forEach(button => {
    button.addEventListener("click", () => {
      // Remove active class from all buttons
      filterButtons.forEach(btn => btn.classList.remove("active"));
      button.classList.add("active");

      const category = button.getAttribute("data-category");

      menuItems.forEach(item => {
        const itemCategory = item.getAttribute("data-category");
        if (category === "all" || itemCategory === category) {
          item.classList.remove("d-none");
        } else {
          item.classList.add("d-none");
        }
      });
    });
  });
</script>

<?php include 'components/footer.php'; ?>
