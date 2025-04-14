<?php
session_start();
include 'components/header.php';

// Check if the user is already logged in (optional)
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");  // Redirect if already logged in
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
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check the user's credentials
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, login successful
        $_SESSION['user'] = $result->fetch_assoc();
        $_SESSION['user_id'] = $_SESSION['user']['id'];
        header("Location: index.php"); // Redirect to home after login
    } else {
        $_SESSION['error_message'] = "Invalid email or password!";
    }
}

$conn->close();
?>

<!-- Hero Section -->
<section class="py-5 bg-dark text-white text-center">
  <div class="container" data-aos="fade-up">
    <h1 class="display-4 fw-bold">Login</h1>
    <p class="lead">Access your account to order and reserve a table.</p>
  </div>
</section>

<!-- Login Form -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center" data-aos="zoom-in">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-body">
            <h4 class="card-title text-center mb-4">Login Form</h4>
            <form action="login.php" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
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
  <div class="alert alert-danger text-center" role="alert">
    <?= $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
  </div>
<?php endif; ?>

<?php include 'components/footer.php'; ?>
