<?php
session_start();
include 'components/header.php';

// Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");  
//     exit();
// }

// Database connection
$servername = "localhost";
$username = "root";  // Replace with your database username
$password = "";      // Replace with your database password
$dbname = "restaurant"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];  // Get logged-in user ID

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guests = mysqli_real_escape_string($conn, $_POST['guests']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);

    // Insert reservation into database
    $sql = "INSERT INTO reservations (user_id, reservation_time, guests) 
            VALUES ('$user_id', '$time', '$guests')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Your table has been successfully reserved!";
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!-- Hero Section -->
<section class="py-5 bg-dark text-white text-center">
  <div class="container" data-aos="fade-up">
    <h1 class="display-4 fw-bold">Book a Table</h1>
    <p class="lead">Reserve your table in advance with a click!</p>
  </div>
</section>

<!-- Reservation Form -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center" data-aos="zoom-in">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-body">
            <h4 class="card-title text-center mb-4">Reservation Form</h4>
            <form action="reservation.php" method="POST">
              <div class="mb-3">
                <label for="guests" class="form-label">Number of Guests</label>
                <input type="number" name="guests" class="form-control" id="guests" min="1" required>
              </div>
              <div class="mb-3">
                <label for="time" class="form-label">Reservation Time</label>
                <input type="time" name="time" class="form-control" id="time" required>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Reserve Table</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Display success or error message -->
<?php if (isset($_SESSION['success_message'])): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
  </div>
<?php elseif (isset($_SESSION['error_message'])): ?>
  <div class="alert alert-danger text-center" role="alert">
    <?= $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
  </div>
<?php endif; ?>

<?php include 'components/footer.php'; ?>
