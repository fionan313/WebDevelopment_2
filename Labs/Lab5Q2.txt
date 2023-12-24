<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=is0-8859-1" /> 
<title>Question 5</title> 
<?php 

$cac = array( "Japan"=>"Tokyo", "Mexico"=>"Mexico City", "USA"=> "New York City", "India"=>"Mumbai", "Korea"=>"Seoul", "China" => "Shanghai", "Nigeria"=>"Lagos", "rgentina"=>"ABuenos Aires", "Egypt" => "Cairo", "England" => "London");


$countries = array_keys($cac);
$cities = array_values($cac);

$i = 0;
echo "<ul>";
while($i < count($cac)) {
    //echo  $cities[$i]. " is in " . $countries[$i] . "<br>";
    echo "<li><p>" .$cities[$i]. " is in " . $countries[$i]. "</p></li>";
    $i++;
}
echo "</ul>";


?>
</head>

<body>

	
</body>
</html>


