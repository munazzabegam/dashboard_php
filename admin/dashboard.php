<?php
session_start();

// if (!isset($_SESSION['admin_username'])) {
//     header("Location: admin_login.php");
//     exit();
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../assets/css/style.css"> 
    <style>
        /* Sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 50px;
        }

        .sidebar a {
            color: white;
            padding: 15px 20px;
            text-decoration: none;
            display: block;
            font-size: 1.1rem;
            border-bottom: 1px solid #495057;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .sidebar h2 {
            color: white;
            text-align: center;
            margin-bottom: 40px;
        }

        /* Main content area */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .content-header {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        /* Footer */
        footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="manage_orders.php">Manage Orders</a>
        <a href="manage_reservations.php">Manage Reservations</a>
        <a href="add_menu_item.php">Add Menu Item</a>
        <a href="../logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-header">
            <h1>Welcome to the Admin Dashboard</h1>
            <p class="lead">You can manage orders, reservations, and menu items from here.</p>
        </div>

        <!-- Admin Controls -->
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Manage Orders</h5>
                        <p class="card-text">View and update customer orders.</p>
                        <a href="manage_orders.php" class="btn btn-primary">Go to Orders</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Manage Reservations</h5>
                        <p class="card-text">View and manage customer reservations.</p>
                        <a href="manage_reservations.php" class="btn btn-primary">Go to Reservations</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Add Menu Item</h5>
                        <p class="card-text">Add new items to the menu.</p>
                        <a href="add_menu_item.php" class="btn btn-primary">Add Item</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Restaurant Management. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
