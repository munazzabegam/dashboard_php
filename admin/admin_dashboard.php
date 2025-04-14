<?php
session_start();
include_once("../config.php");

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}


// include '../components/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<!-- 🔸 HEADER with toggle button -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid px-4">
    <button class="btn btn-dark me-3" id="toggleSidebar">
      <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand fw-bold" href="#">Admin Panel</a>
  </div>
</nav>

<!-- 🔹 SIDEBAR -->
<div class="admin-sidebar" id="adminSidebar">
  <ul class="sidebar-nav">
    <li><a href="dashboard.php"><i class="fas fa-home me-2"></i>Dashboard</a></li>
    <li><a href="manage_users.php"><i class="fas fa-users-cog me-2"></i>Manage Users</a></li>
    <li><a href="reservations.php"><i class="fas fa-calendar-check me-2"></i>Reservations</a></li>
    <li><a href="menu.php"><i class="fas fa-utensils me-2"></i>Menu</a></li>
    <li><a href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
  </ul>
</div>

<!-- 🔸 MAIN CONTENT -->
<main class="admin-main" id="adminMain">
  <div class="container py-4">
    <h2>Welcome to Dashboard 👋</h2>
    <!-- Your cards or content go here -->
  </div>
</main>

<!-- Bootstrap & JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Sidebar Toggle Script -->
<script>
  const toggleBtn = document.getElementById("toggleSidebar");
  const sidebar = document.getElementById("adminSidebar");
  const main = document.getElementById("adminMain");

  toggleBtn.addEventListener("click", () => {
    sidebar.classList.toggle("show");
    main.classList.toggle("full-width");
  });
</script>

<?php include('../components/footer.php'); ?>

</body>
</html>
