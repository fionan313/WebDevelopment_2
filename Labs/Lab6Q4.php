<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Question 4</title> 
</head>

<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "labdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT ProductID, PName, Description, Price, Stock FROM Product";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ProductID: " . $row["ProductID"].
        " - PName: " . $row["PName"].
        " - Description: " . $row["Description"].
        " - Price: " . $row["Price"].
        " - Stock: " . $row["Stock"].
        "<br>";
    } }
    else {
        echo "0 results";
}

$conn->close();

?>

	
</body>
</html>