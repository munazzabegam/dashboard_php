<?php
session_start();
include_once("../config.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Dashboard | Restaurant</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/user_dashboard.css">

  <style>
    .user-sidebar {
      background-color: #343a40;
      color: white;
      min-height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      transition: transform 0.3s ease-in-out;
      transform: translateX(-100%);
    }

    .user-sidebar.show {
      transform: translateX(0);
    }

    .user-sidebar .sidebar-logo {
      background-color: #212529;
    }

    .user-sidebar a {
      display: block;
      padding: 12px 20px;
      color: #fff;
      text-decoration: none;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .user-sidebar a:hover {
      background-color: #495057;
    }

    .user-main {
      margin-left: 0;
      padding-left: 0;
      transition: margin-left 0.3s;
    }

    @media (min-width: 768px) {
      .user-sidebar {
        transform: translateX(0);
      }

      .user-main {
        margin-left: 250px;
        padding-left: 1rem;
      }
    }

    .card h5 {
      font-size: 1.1rem;
    }
  </style>
</head>
<body>

<!-- 🔸 SIDEBAR -->
<div class="user-sidebar" id="userSidebar">
  <div class="sidebar-logo d-flex justify-content-between align-items-center px-3 py-3">
    <h5 class="text-white mb-0">My Account</h5>
    <button class="btn text-white" id="toggleSidebarClose"><i class="fas fa-times"></i></button>
  </div>
  <a href="user_dashboard.php"><i class="fas fa-home me-2"></i>Dashboard</a>
  <a href="order.php"><i class="fas fa-clipboard-list me-2"></i>My Orders</a>
  <a href="reservation.php"><i class="fas fa-calendar-alt me-2"></i>My Reservations</a>
  <a href="profile.php"><i class="fas fa-user me-2"></i>Profile</a>
  <a href="logout.php" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
</div>

<!-- 🔸 HEADER -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 px-4 shadow-sm">
  <button class="btn text-white" id="toggleSidebarOpen">
    <i class="fas fa-bars fa-lg"></i>
  </button>
  <span class="navbar-brand ms-3 fw-bold">Welcome User</span>
</nav>

<!-- 🔹 MAIN CONTENT -->
<main class="user-main" id="userMain">
  <div class="container-fluid py-4">
    <div class="row mb-4">
      <div class="col-md-12">
        <h2 class="fw-bold">Dashboard Overview</h2>
        <p class="text-muted">Here's a quick overview of your activity:</p>
      </div>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card p-4 text-center shadow-sm border-0">
          <h5>📦 Orders</h5>
          <p class="display-6">3</p>
          <a href="order.php" class="btn btn-outline-primary btn-sm">View Orders</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4 text-center shadow-sm border-0">
          <h5>📅 Reservations</h5>
          <p class="display-6">2</p>
          <a href="reservation.php" class="btn btn-outline-success btn-sm">View Reservations</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4 text-center shadow-sm border-0">
          <h5>👤 Profile</h5>
          <p class="display-6">Edit</p>
          <a href="profile.php" class="btn btn-outline-dark btn-sm">Update Info</a>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById("userSidebar");
  document.getElementById("toggleSidebarOpen").onclick = () => sidebar.classList.add("show");
  document.getElementById("toggleSidebarClose").onclick = () => sidebar.classList.remove("show");
</script>

</body>
</html>
