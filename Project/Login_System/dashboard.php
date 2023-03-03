<?php
// Start the session and check if the user is logged in
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

?>

<<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<!-- Header section -->
<header>
  <h1>Welcome to your dashboard, <?php echo $_SESSION['username']; ?>!</h1>
  <nav>
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav>
</header>

<!-- Main section -->
<main>
  <p>This is your dashboard. You can view your information here.</p>
</main>
</body>
</html>

