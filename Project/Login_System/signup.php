<?php
// Include database connection file
require_once 'db_conn.php';

// Retrieve the form data using $_POST superglobal
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare an INSERT statement to add the new user to the database
$stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES ($email,$username, $password)");
$stmt->bind_param("sss", $email, $username, $password);
$stmt->execute();

// Redirect the user to the login page with a success message
header('Location: index.php?success=You have successfully signed up!');
require 'class.phpmailer.php';
 
$gmail_mail = new PHPMailer;
 
$gmail_mail->IsSMTP();
// Send email using gmail SMTP server
$gmail_mail->Host = 'ssl://smtp.gmail.com';
// port for Send email
$gmail_mail->Port = 465;
$gmail_mail->SMTPDebug = 1;
$gmail_mail->SMTPAuth = true;
$gmail_mail->Username = 'parajuliaayush@gmail.com';
$gmail_mail->Password = 'yvhijblybvwkctzy';
 
$gmail_mail->From = 'parajuliaayush@gmail.com';
$gmail_mail->FromName = 'Aayush Parajuli';// frome name
$gmail_mail->AddAddress("$email", "$username");  // Add a recipient  to name
$gmail_mail->AddAddress("$email");  // Name is optional
 
$gmail_mail->IsHTML(true); // Set email format to HTML
 
$gmail_mail->Subject = 'Congratulations';
$gmail_mail->Body    = 'Hello,\n\nCongratulations. You have successfully signed up to our system. Best Wishes !!';
 
if(!$gmail_mail->Send()) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $gmail_mail->ErrorInfo;
exit;
}
else
{
echo 'Message of Send email using gmail SMTP server has been sent';
}
exit();
?>
