<?php
// MySQL server configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

// Close connection
$conn->close();
?>
