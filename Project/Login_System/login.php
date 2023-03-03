<?php
// Include database connection file
require_once 'db_conn.php';

// Retrieve the form data using $_POST superglobal
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare a SELECT statement to retrieve user information based on email and password
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();

// Fetch the result and store it in an associative array
$result = $stmt->get_result()->fetch_assoc();

// Check if the result is not empty
if ($result) {
    // Redirect the user to the dashboard
    header('Location: dashboard.php');
    exit();
} else {
    // Redirect the user to the login page with an error message
    header('Location: index.php?error=Invalid email or password');
    exit();
}
?>
