<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Question 1</title> 
</head>

<body>


<?php

/*$i=5;
while($i<=40) {
    echo "The number is " . $i . "<br/>";
    $i+=5;
}*/

do
{
    $i+=5;
echo "The number is " . $i . "<br/>";
}
while ($i<40);

$programmingLanguagesArray = array("PHP", "C++", "C#", "Python", "Java");

echo "<br/>";

// for ($i = 0; $i < count($programmingLanguagesArray); $i++) {
//     echo $programmingLanguagesArray[$i] ."<br/>";
// }

foreach ($programmingLanguagesArray as $value) {
    echo "$value <br>";
}

echo "<br/>";

$arrObject = new ArrayObject($programmingLanguagesArray);
$arrayIterator = $arrObject->getIterator();
while($arrayIterator->valid() )
{
echo $arrayIterator->current() . "<br/>";
$arrayIterator->next();
}



?>
</body>
</html>
