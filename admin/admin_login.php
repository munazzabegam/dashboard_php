<?php
session_start();
include '../components/header.php';

// Check if admin is already logged in
if (isset($_SESSION['admin_id'])) {
    header("Location: admin_dashboard.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password_input = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($password_input, $admin['password'])) {
            $_SESSION['admin_username'] = $admin['username'];
            $_SESSION['admin_id'] = $admin['id'];
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Incorrect password!";
        }
    } else {
        $_SESSION['error_message'] = "Username not found!";
    }
}

$conn->close();
?>

<!-- Hero Section -->
<section class="py-5 bg-dark text-white text-center">
  <div class="container" data-aos="fade-up">
    <h1 class="display-4 fw-bold">Admin Login</h1>
    <p class="lead">Login to manage orders, users, and restaurant settings.</p>
  </div>
</section>

<!-- Login Form -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center" data-aos="zoom-in">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-body">
            <h4 class="card-title text-center mb-4">Admin Login Form</h4>
            <form action="admin_login.php" method="POST">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
              </div>
              <div class="forgot">
                <a href="" class="text-decoration-none">Forgot Password?</a>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Display success or error message -->
<?php if (isset($_SESSION['error_message'])): ?>
  <div class="alert alert-danger text-center mt-3" role="alert">
    <?= $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
  </div>
<?php endif; ?>

<?php include '../components/footer.php'; ?>
