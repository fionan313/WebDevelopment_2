<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Update</title> 
</head>

<body>

<h2>Delete</h2>


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

if (isset($_POST['ProductID']) && isset($_POST['ProductDelete']) ) {
    $pid = $_POST['ProductID'];
    $sql = "DELETE FROM Product WHERE ProductID = $pid";
    echo "<pre>\n$sql\n</pre>\n";
    $conn->query($sql);
    return;
}
?>

</table>
<a href="update.php">Delete</a>

<p>Delete an entry</p>
<form method="post">
<p>ProductID:
<input type="number" name="ProductID"></p>
<p>Confirm you want to delete?</p>
<p><input type="submit" value="Delete" name="ProductDelete"/></p>
</form>

<a href="index.php" target="_self">index</a>



</body>
</html>