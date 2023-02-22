<?php
// Start the session to store user data
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
  // Redirect to the appropriate page based on user role
  if ($_SESSION['role'] == 'admin') {
    header("Location: /admin");
    exit;
  } else {
    header("Location: /");
    exit;
  }
}

// Check if the login form has been submitted
if (isset($_POST['login'])) {
  // Get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Connect to the database
  $conn = mysqli_connect('localhost', 'root', '', 'newdb');

  // Prepare the query to check if the user exists and has the correct password
  $query = "SELECT * FROM users WHERE username = ? AND password = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  // Check if the user was found and has the correct password
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    // Set session variables for the authenticated user
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];

    // Redirect to the appropriate page based on user role
    if ($row['role'] == 'admin') {
      header("Location: /admin");
      exit;
    } else {
      header("Location: /");
      exit;
    }
  } else {
    // Invalid login, show error message
    $error = "Invalid username or password";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
        }

        form {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-4">
                <h1 class="text-center mb-3">Login</h1>
                <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input name="username" type="text" class="form-control" id="username" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password" required>
                    </div>
                    <button name="login" type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>