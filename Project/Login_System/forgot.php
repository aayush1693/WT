<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Forgot Password</h1>
    <?php
    // Check if the form has been submitted
    if (isset($_POST['email'])) {
        // Retrieve the form data using $_POST superglobal
        $email = $_POST['email'];

        // Prepare a SELECT statement to retrieve user information based on email
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        // Fetch the result and store it in an associative array
        $result = $stmt->get_result()->fetch_assoc();

        // Check if the result is not empty
        if ($result) {
            // Generate a random password reset token
            $token = bin2hex(random_bytes(32));

            // Store the token in the database for the user
            $stmt = $conn->prepare("UPDATE users SET reset_token = ? WHERE email = ?");
            $stmt->bind_param("ss", $token, $email);
            $stmt->execute();

            // Send an email to the user with a link to reset their password
            $reset_link = "http://aayushparajuli.com.np/reset.php?email=" . urlencode($email) . "&token=" . urlencode($token);
            $subject = "Password Reset";
            $message = "Hello,\n\nYou have requested to reset your password. Please click the following link to reset your password:\n\n" . $reset_link . "\n\nIf you did not request this, please ignore this email.\n\nBest regards,\nAayush Parajuli";
           $headers = "From: parajuliaayush@gmail.com";
            mail($email, $subject, $message, $headers);

            // Display a success message
            echo '<p>A password reset link has been sent to your email.</p>';
        } else {
            // Display an error message
            echo '<p>Invalid email address.</p>';
        }
    }
    ?>
    <form method="post">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <button type="submit">Send Reset Link</button>
    </form>
</body>
</html>
