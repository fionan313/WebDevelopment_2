<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Question 5</title> 
</head>

<body>


<?php

if ( 123 === "123" ) print ("Equality 1\n");
if ( 123 === "100"+23 ) print ("Equality 2\n");
if ( FALSE === "0" ) print ("Equality 3\n");
if ( (5 < 6) === "2"-"1" ) print ("Equality 4\n");
if ( (5 < 6) == TRUE ) print ("Equality 5\n");

?>

</body>
</html>