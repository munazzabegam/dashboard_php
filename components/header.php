<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restaurant</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- AOS Animation -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Foodie's Delight</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav me-3">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="menu.php">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reservation.php">Reservation</a>
        </li>
      </ul>

      <!-- Login / Signup Buttons -->
      <div class="d-flex">
        <a href="cart.php" class="btn btn-outline-dark me-2">Cart 🛒</a>
        <div class="d-flex">
        <?php if (isset($_SESSION['user_id'])): ?>
          <a href="user/user_dashboard.php" class="btn btn-dark me-2">Dashboard</a>
          <a href="user/logout.php" class="btn btn-danger">Logout</a>
        <?php else: ?>
          <a href="login.php" class="btn btn-outline-dark">Login</a>
        <?php endif; ?>
      </div>
      </div>
    </div>
  </div>
</nav>
