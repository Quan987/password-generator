<?php require_once '../../private/initialize.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO user (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssss', $first_name, $last_name, $email, $hashed_password);
    
    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.html'>Go to Login</a>";
        // Optionally, redirect to a login page or other destination
    } else {
        echo "Error: " . $stmt->error;
    }
}
db_disconnect($db);
?>
