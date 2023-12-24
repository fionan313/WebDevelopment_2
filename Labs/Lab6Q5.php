<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Question 4</title> 
</head>

<body>

<h2>Input values into user</h2>


<?php

$servername = "localhost";
$username = "root";
$password = "Gs17rocks!";
$dbname = "labdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//require_once "labdb.php";

if ( isset($_POST['Username']) && isset($_POST['Password']) && isset($_POST['FirstName']) && isset($_POST['FirstName'])) {
     $u = $_POST['Username'];
     $p = $_POST['Password'];
     $f = $_POST['Firstname'];
     $l = $_POST['lastname'];
     $sql = "INSERT INTO user (UserName, Password, FirstName, LastName) VALUES ('$u', '$p', '$f', '$l')";
     if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
     } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
     }
     $conn->close();
}
?>

<p>Add A New User</p>
<form method="post">
<p>Username:
<input type="text" name="Username"></p>
<p>Password:
<input type="password" name="Password"></p>
<p>FirstName:
<input type="text" name="FirstName"></p>
<p>LastName:
<input type="text" name="LastName"></p>
<p><input type="submit" value="Add New"/></p>
</form>



<p>Please enter values in the form above.</p>

</body>
</html>