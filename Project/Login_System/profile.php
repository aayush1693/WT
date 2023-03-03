<?php
// Start a session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If user is not logged in, redirect to login page
    header('Location: login.php');
    exit();
}

// Include database connection file
require_once 'db_conn.php';

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Retrieve user data from the database
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <p>Welcome <?php echo $user['username']; ?>!</p>
        <ul>
            <li><strong>Email:</strong> <?php echo $user['email']; ?></li>
            <li><strong>First Name:</strong> <?php echo $user['first_name']; ?></li>
            <li><strong>Last Name:</strong> <?php echo $user['last_name']; ?></li>
        </ul>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>

