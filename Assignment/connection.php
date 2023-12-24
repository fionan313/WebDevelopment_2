<!-- DATABASE CONNECTION FILE -->
<?php
$servername = "localhost";
$username = "root";
$password = "Gs17rocks!";
$dbname = "Assignment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

