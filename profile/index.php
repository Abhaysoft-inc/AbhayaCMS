<?php
$host = 'localhost';
$dbname = 'newdb';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}

// Include database configuration file


// Fetch user details from database
$user = $_SESSION['username'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$user]);
$user = $stmt->fetch();

// Display user details
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="/admin" class="btn btn-secondary mb-3"><i class="fa fa-arrow-left"></i> Back to Dashboard</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
  <div class="container">
      <h1>Profile</h1>
      <div class="profile-info">
        <div class="profile-picture">
          <img src="#" alt="Profile Picture">
        </div>
        <div class="profile-details">
          <h2><?php echo $user['username']; ?></h2>
          <p>password: <?php echo $user['password']; ?></p>
          <!-- <p>Age: <?php echo $user['age']; ?></p> -->
        </div>
      </div>
      <a href="logout.php">Logout</a>
    </div>
  </body>
</html>
