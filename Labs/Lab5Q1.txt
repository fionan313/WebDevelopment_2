<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Question 5</title> 
<?php 
$cities = array("Tokyo", "Mexico City", "New York City", "Mumbai", "Seoul", "Shanghai", "Lagos", "Buenos Aires", "Cairo", "London");

foreach ($cities as $value) {
    echo "$value", ", ";
}

sort($cities);

echo "<br/>";

echo '<ul>';
echo '<li>' . implode( '</li><li>', $cities) . '</li>';
echo '</ul>';

array_push($cities, "Los Angeles", "Calcutta", "Osaka", "Beijing");

echo '<ul>';
echo '<li>' . implode( '</li><li>', $cities) . '</li>';
echo '</ul>';


?>
</head>

<body>

	
</body>
</html>