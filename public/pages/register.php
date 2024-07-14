<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO login (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssss', $first_name, $last_name, $email, $hashed_password);
    
    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.html'>Go to Login</a>";
        // Optionally, redirect to a login page or other destination
    } else {
        echo "Error: " . $stmt->error;
    }
}
$conn->close();
?>
