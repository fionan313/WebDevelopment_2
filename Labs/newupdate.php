<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Update</title> 
</head>

<body>

<h2>Update</h2>


<?php
$servername = "localhost";
$username = "root";
$password = "Gs17rocks!";
$dbname = "Addressbook";

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['UserID']) && isset($_POST['street']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zip'])) {
    $uid = $_POST['UserID'];
    $add = $_POST['street'];
    $c = $_POST['city'];
    $s = $_POST['state'];
    $z = $_POST['zip'];
    $sql = "UPDATE Address SET street = '$add', city = '$c', state = '$s', zip = '$z' WHERE UserId = '$uid'";
    echo "<pre>\n$sql</pre>\n";
    $conn->query($sql);
    echo 'Updated - <a href="index.php">Continue...</a>';
    return;
}

$sql = "SELECT street, city, state, zip, UserId FROM Address WHERE UserId='$uid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$uid = htmlentities($row['UserId']);
$add = htmlentities($row['street']);
$c = htmlentities($row['city']);
$s = htmlentities($row['state']);
$z = htmlentities($row['zip']);
?>

</table>
<a href="update.php">Update</a>

<p>Update an entry</p>
<form method="post">
<p>UserID:
<input type="text" name="UserID"></p>
<p>Product Name:
<input type="text" name="address"></p>
<p>Description:
<input type="text" name="city"></p>
<p>Price:
<input type="text" name="state"></p>
<p>Stock:
<input type="text" name="zip"></p>
<p><input type="submit" value="Add New"/></p>
</form>

<a href="index.php" target="_self">index</a>


</body>
</html>