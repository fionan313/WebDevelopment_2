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
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully"."</br>";

$sql = "SELECT ProductID, PName, Description, Price, Stock FROM Product";

$result = $conn->query($sql);

$result = $conn->query($sql);

if($result->num_rows > 0)
{
    //output data of each row in the table
    echo "<table border = '1'>";

    while($row = $result->fetch_assoc())
    {
        echo "<tr><td>";
        echo (htmlentities($row["ProductID"]));
        echo "</td><td>";;
        echo (htmlentities($row["PName"]));
        echo "</td><td>";
        echo (htmlentities($row["Description"]));
        echo "</td><td>\n";
        echo "</td></tr>\n";
    }
}
else
{
    echo "0 results";
}

    

$conn->close();
?>
</table>
<a href="add.php">Add New</a>
<a href="index.php" target="_self">index</a>
</body>
</html>