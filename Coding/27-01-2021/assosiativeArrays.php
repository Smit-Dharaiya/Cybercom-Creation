<?php 

$cars = array("volvo"=>"30" , "audi"=>"40" , "bmw"=>"50");

echo $cars["volvo"]."<br>";

foreach ($cars as $key => $value) { //Loop through assosiative array
	echo "Key is ".$key." & Value is : ".$value."<br>";
}

?>