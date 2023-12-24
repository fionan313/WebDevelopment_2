<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Question 1</title> 
</head>

<body>


<?php

date_default_timezone_set('Europe/Dublin');

$d=date("H");
if ($d<"10")
echo "Have a good morning!";
elseif ($d<"20")
echo "Have a good day!";
else
echo "Have a good night!";
?>
</body>
</html>
