<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Question 3</title> 
</head>

<body>

<form method="post">
   <p>Number: <input type="text" name="hour" /></p>
   <input type="submit" />
</form>

<?php
   echo("The time entered: " . $_POST['hour'] . "<br />");


   if ($_POST['hour'] < "10") {
    echo "Have a good morning!";
  } 
  elseif ($_POST['hour'] < "18") {
    echo "Have a good day!";
  }
    
  elseif ($_POST['hour'] < "23") {
    echo "Have a good evening!";
  } 
  else {
    echo "Turn off the computer!";
}

?>
	
</body>
</html>