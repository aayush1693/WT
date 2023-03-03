<?php
// Database credentials
$db_host = 'sql112.epizy.com';
$db_name = 'epiz_33137262_project_db';
$db_user = 'epiz_33137262';
$db_pass = 'zdLgvSZLkGo2';

// Attempt to connect to the database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check the connection
if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
