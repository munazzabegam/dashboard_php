<?php include 'components/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Foodies' Paradise | Home</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body>

<!-- Hero Section -->
<section class="hero text-white text-center d-flex align-items-center" style="background: url('assets/images/hero.jpg') center/cover no-repeat; height: 100vh;">
  <div class="container">
    <h1 class="display-4" data-aos="fade-down">Delicious Meals Delivered to You</h1>
    <p class="lead mb-4" data-aos="fade-up" data-aos-delay="100">Experience fine dining in the comfort of your home</p>
    <a href="menu.php" class="btn btn-lg btn-light me-2" data-aos="fade-right" data-aos-delay="200">Order Online</a>
    <a href="reservation.php" class="btn btn-lg btn-outline-light" data-aos="fade-left" data-aos-delay="300">Book a Table</a>
  </div>
</section>

<!-- About Section -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6" data-aos="fade-right">
        <img src="assets/images/about.jpg" class="img-fluid rounded shadow" alt="About Us">
      </div>
      <div class="col-md-6" data-aos="fade-left">
        <h2>About Our Restaurant</h2>
        <p>We bring you flavors from around the world with a touch of warmth and tradition. Whether you dine in or order online, we ensure an unforgettable culinary experience.</p>
        <p>Our chefs use only the freshest ingredients to prepare your favorite dishes with care and love.</p>
      </div>
    </div>
  </div>
</section>

<!-- Preview Menu Section -->
<section class="py-5">
  <div class="container text-center">
    <h2 class="mb-4" data-aos="fade-up">Popular Dishes</h2>
    <div class="row g-4">
      <div class="col-md-4" data-aos="zoom-in">
        <div class="card h-100 shadow">
          <img src="assets/images/image.jpeg" class="card-img-top" alt="Dish 1">
          <div class="card-body">
            <h5 class="card-title">Margherita Pizza</h5>
            <p class="card-text">Classic cheese pizza with tomato base</p>
          </div>
        </div>
      </div>
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="card h-100 shadow">
          <img src="assets/images/image.jpeg" class="card-img-top" alt="Dish 2">
          <div class="card-body">
            <h5 class="card-title">Pasta Alfredo</h5>
            <p class="card-text">Creamy Alfredo sauce tossed with fettuccine</p>
          </div>
        </div>
      </div>
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="card h-100 shadow">
          <img src="assets/images/image.jpeg" class="card-img-top" alt="Dish 3">
          <div class="card-body">
            <h5 class="card-title">Tandoori Paneer</h5>
            <p class="card-text">Grilled paneer cubes with Indian spices</p>
          </div>
        </div>
      </div>
    </div>
    <a href="menu.php" class="btn btn-primary btn-lg mt-4" data-aos="fade-up" data-aos-delay="300">View Full Menu</a>
  </div>
</section>

<?php include 'components/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
