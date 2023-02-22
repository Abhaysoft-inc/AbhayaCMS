<?php

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'newdb');

// Check if the connection was successful
if (!$conn) {
  die('Could not connect to the database: ' . mysqli_connect_error());
}

// Get the user agent and IP address
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ip_address = $_SERVER['REMOTE_ADDR'];

// Prepare the query to insert a new visit into the database
$query = "INSERT INTO visits (user_agent, ip_address, created_at) VALUES (?, ?, NOW())";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ss', $user_agent, $ip_address);
mysqli_stmt_execute($stmt);

// Close the database connection
mysqli_close($conn);

?>
