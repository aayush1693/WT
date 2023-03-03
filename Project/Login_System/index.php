<!DOCTYPE html>
<html>
<head>
    <title>Login and Signup Form</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Login</h1>
    <form method="post" action="login.php">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <!-- Forgot password link -->
<p><a href="forgot.php">Forgot your password?</a></p>
    <br>
    <h1>Sign Up</h1>
    <form method="post" action="signup.php">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
