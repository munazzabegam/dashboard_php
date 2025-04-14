<!-- <?php
require_once('../includes/auth_user.php'); 
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard | Restaurant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/user_dashboard.css">

</head>
<body>
    <div class="container-fluid dashboard-container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <h4 class="text-center mb-4">My Account</h4>
                <a href="user_dashboard.php">🏠 Dashboard</a>
                <a href="order.php">🧾 My Orders</a>
                <a href="reservation.php">📅 My Reservations</a>
                <a href="profile.php">👤 Profile</a>
                <a href="logout.php" class="text-danger">🚪 Logout</a>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 content">
                <h2 class="welcome">Welcome back!</h2>
                <p class="text-muted">Here's a quick overview of your activity:</p>

                <div class="row g-4 mt-3">
                    <div class="col-md-4">
                        <div class="card p-4 text-center">
                            <h5>📦 Orders</h5>
                            <p class="display-6">3</p>
                            <a href="order.php" class="btn btn-outline-primary btn-sm">View Orders</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-4 text-center">
                            <h5>📅 Reservations</h5>
                            <p class="display-6">2</p>
                            <a href="reservation.php" class="btn btn-outline-success btn-sm">View Reservations</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-4 text-center">
                            <h5>👤 Profile</h5>
                            <p class="display-6">Edit</p>
                            <a href="profile.php" class="btn btn-outline-dark btn-sm">Update Info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
