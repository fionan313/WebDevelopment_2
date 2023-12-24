<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Index</title> 
</head>

<body>

<h2>Index</h2>


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

if ( isset($_POST['ProductID']) && isset($_POST['PName']) && isset($_POST['Description']) && isset($_POST['Price']) && isset($_POST['Stock'])) {
     $pid = $_POST['ProductID'];
     $pn = $_POST['PName'];
     $d = $_POST['Description'];
     $p = $_POST['Price'];
     $s = $_POST['Stock'];
     $sql = "INSERT INTO product (ProductID, PName, Description, Price, Stock) VALUES ('$pid', '$pn', '$d', '$p', '$s')";
     if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
     } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
     }
     $conn->close();
}
?>
</table>
<a href="add.php">Add New</a>

<p>Add A New User</p>
<form method="post">
<p>ProductID:
<input type="text" name="ProductID"></p>
<p>Product Name:
<input type="text" name="PName"></p>
<p>Description:
<input type="text" name="Description"></p>
<p>Price:
<input type="number" name="Price"></p>
<p>Stock:
<input type="text" name="Stock"></p>
<p><input type="submit" value="Add New"/></p>
</form>

<a href="index.php" target="_self">index</a>


</body>
</html>