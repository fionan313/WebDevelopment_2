<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Question 5</title> 
<?php 

$file = fopen("Lab5Q1.txt", "r") or exit("Unable to
open file!");
//Output a line of the file until the end is reached
while(!feof($file))
{
echo fgets($file). "<br>";
}
fclose($file);

file_put_contents('Lab5Q1.txt', file_get_contents('Lab5Q2.txt'), FILE_APPEND | LOCK_EX);

$file = fopen("Lab5Q1.txt", "r") or exit("Unable to
open file!");
//Output a line of the file until the end is reached
while(!feof($file))
{
echo fgets($file). "<br>";
}
fclose($file);

?>
</head>

<body>

	
</body>
</html>