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
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['error_message'] = "Email already registered!";
    } else {
        // Insert new user into database
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            $_SESSION['success_message'] = "Your account has been created successfully!";
            header("Location: login.php");  // Redirect to login page after successful registration
        } else {
            $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!-- Hero Section -->
<section class="py-5 bg-dark text-white text-center">
  <div class="container" data-aos="fade-up">
    <h1 class="display-4 fw-bold">Sign Up</h1>
    <p class="lead">Create an account to reserve tables and order food.</p>
  </div>
</section>

<!-- Signup Form -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center" data-aos="zoom-in">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-body">
            <h4 class="card-title text-center mb-4">Sign Up Form</h4>
            <form action="signup.php" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Sign Up</button>
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
<?php elseif (isset($_SESSION['success_message'])): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
  </div>
<?php endif; ?>

<?php include 'components/footer.php'; ?>
