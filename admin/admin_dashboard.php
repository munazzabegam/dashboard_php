<?php
session_start();
include_once("../config.php");

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<!-- 🔸 SIDEBAR -->
<div class="admin-sidebar" id="adminSidebar">
  <div class="sidebar-logo d-flex justify-content-between align-items-center px-3 py-3">
    <h5 class="text-white mb-0">Admin Panel</h5>
    <button class="btn text-white" id="toggleSidebarClose"><i class="fas fa-times"></i></button>
  </div>
  <ul class="sidebar-nav">
    <li><a href="dashboard.php"><i class="fas fa-home me-2"></i>Dashboard</a></li>
    <li><a href="manage_users.php"><i class="fas fa-users-cog me-2"></i>Manage Users</a></li>
    <li><a href="reservations.php"><i class="fas fa-calendar-check me-2"></i>Reservations</a></li>
    <li><a href="menu.php"><i class="fas fa-utensils me-2"></i>Menu</a></li>
    <li><a href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
  </ul>
</div>

<!-- 🔸 HEADER -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 px-4 shadow-sm" id = "adminHeader">
  <button class="btn text-white " id="toggleSidebarOpen">
    <i class="fas fa-bars fa-lg"></i>
  </button>
  <span class="navbar-brand ms-3 fw-bold">Welcome <?= $_SESSION['admin_username'] ?? 'Admin'; ?></span>
</nav>

<!-- 🔹 MAIN CONTENT -->
<main class="admin-main" id="adminMain">
  <div class="container-fluid py-4">
    <div class="row mb-4">
      <div class="col-md-12">
        <h2 class="fw-bold">Dashboard Overview</h2>
        <p class="text-muted">Quick insights and controls</p>
      </div>
    </div>

    <!-- DASHBOARD CARDS -->
    <div class="row g-4">
      <!-- Users -->
      <div class="col-md-4">
        <div class="card shadow admin-card">
          <div class="card-body text-center">
            <h5 class="card-title">Manage Users</h5>
            <p class="card-text">View and control registered users.</p>
            <a href="manage_users.php" class="btn btn-admin">Go</a>
          </div>
        </div>
      </div>

      <!-- Reservations -->
      <div class="col-md-4">
        <div class="card shadow admin-card">
          <div class="card-body text-center">
            <h5 class="card-title">Reservations</h5>
            <p class="card-text">Update and track bookings.</p>
            <a href="reservations.php" class="btn btn-admin">Go</a>
          </div>
        </div>
      </div>

      <!-- Menu -->
      <div class="col-md-4">
        <div class="card shadow admin-card">
          <div class="card-body text-center">
            <h5 class="card-title">Menu</h5>
            <p class="card-text">Add or update dishes.</p>
            <a href="menu.php" class="btn btn-admin">Go</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById("adminSidebar");
  document.getElementById("toggleSidebarOpen").onclick = () => sidebar.classList.add("show");
  document.getElementById("toggleSidebarClose").onclick = () => sidebar.classList.remove("show");
</script>

</body>
</html>
