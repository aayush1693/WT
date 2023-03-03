<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Reset Password</h1>
    <?php
    // Check if the email and token are set
    if (isset($_GET['email']) && isset($_GET['token'])) {
        // Retrieve the email and token from the query string
        $email = $_GET['email'];
        $token = $_GET['token'];

        // Check if the email and token are valid
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND reset_token = ?");
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result) {
            // Display the reset password form
            echo '<form method="post">';
            echo '<label>New Password:</label>';
            echo '<input type="password" name="password" required><br><br>';
            echo '<button type="submit">Reset Password</button>';
            echo '</form>';

            // Check if the form has been submitted

                        if (isset($_POST['password'])) {
                // Retrieve the new password from the form data
                $password = $_POST['password'];

                // Hash the password using the password_hash function
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                // Update the user's password in the database
                $stmt = $conn->prepare("UPDATE users SET password_hash = ?, reset_token = NULL WHERE email = ?");
                $stmt->bind_param("ss", $password_hash, $email);
                $stmt->execute();

                // Display a success message
                echo '<p>Your password has been reset.</p>';
            }
        } else {
            // Display an error message
            echo '<p>Invalid reset link.</p>';
        }
    } else {
        // Display an error message
        echo '<p>Invalid reset link.</p>';
    }
    ?>
</body>
</html>

           
