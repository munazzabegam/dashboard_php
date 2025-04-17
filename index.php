<?php session_start(); 
 include 'components/header.php'; ?>
 
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
<section class="hero text-white text-center d-flex align-items-center" style="background: url('assets/images/image.jpeg') center/cover no-repeat; height: 100vh;">
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
        <img src="assets/images/image.jpeg" class="img-fluid rounded shadow" alt="About Us">
      </div>
      <div class="col-md-6" data-aos="fade-left">
        <h2>About Our Restaurant</h2>
        <p>We bring you flavors from around the world with a touch of warmth and tradition. Whether you dine in or order online, we ensure an unforgettable culinary experience.</p>
        <p>Our chefs use only the freshest ingredients to prepare your favorite dishes with care and love.</p>
      </div>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="py-5 text-center">
  <div class="container">
    <h2 class="mb-4" data-aos="fade-up">Why Choose Us</h2>
    <div class="row g-4">
      <div class="col-md-4" data-aos="zoom-in">
        <div class="p-4 border rounded shadow">
          <h4>🧑‍🍳 Expert Chefs</h4>
          <p>Our chefs are highly trained with years of experience.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="p-4 border rounded shadow">
          <h4>🌿 Fresh Ingredients</h4>
          <p>We source only fresh and organic ingredients every day.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="p-4 border rounded shadow">
          <h4>🚚 Fast Delivery</h4>
          <p>Enjoy our quick and reliable delivery service at your doorstep.</p>
        </div>
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

<!-- Testimonials Section -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="mb-4" data-aos="fade-up">What Our Customers Say</h2>
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up" data-aos-delay="200">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <blockquote class="blockquote">
            <p class="mb-4">“Absolutely amazing food! Prompt delivery and great packaging.”</p>
            <footer class="blockquote-footer">Ananya Sharma</footer>
          </blockquote>
        </div>
        <div class="carousel-item">
          <blockquote class="blockquote">
            <p class="mb-4">“Loved the flavors and the presentation. Highly recommend!”</p>
            <footer class="blockquote-footer">Rahul Mehta</footer>
          </blockquote>
        </div>
        <div class="carousel-item">
          <blockquote class="blockquote">
            <p class="mb-4">“Best dining experience I've had in a long time!”</p>
            <footer class="blockquote-footer">Priya Verma</footer>
          </blockquote>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle"></span>
      </button>
    </div>
  </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 text-white text-center" style="background-color: #222;">
  <div class="container" data-aos="fade-up">
    <h2 class="mb-3">Subscribe to our Newsletter</h2>
    <p class="mb-4">Get updates on new dishes, offers, and events directly to your inbox.</p>
    <form class="row justify-content-center">
      <div class="col-md-6">
        <input type="email" class="form-control form-control-lg mb-3" placeholder="Enter your email" required>
        <button type="submit" class="btn btn-primary btn-lg">Subscribe</button>
      </div>
    </form>
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
