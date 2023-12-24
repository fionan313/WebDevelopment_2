<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Question 4</title> 
</head>

<body>
<form method="post">
   <p>Number: <input type="text" name="num" /></p>
   <input type="submit" />
</form>

<?php

$string = "Hello PHP!";

$counter = $_POST['num'];

for ($i = 0; $i < $counter; $i++) {
    echo "<p style='font-size:$i%;'> Hello PHP!. </p>";
}
?>
	
</body>
</html>