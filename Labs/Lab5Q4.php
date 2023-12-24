<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Question 4</title> 
</head>

<body>

<?php

function password_generate($chars) 
{
  $characters = '1234567890abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@£$%^&*()';
  return substr(str_shuffle($characters), 0, $chars);
}
  echo password_generate(8)."\n";
?>
	
</body>
</html>