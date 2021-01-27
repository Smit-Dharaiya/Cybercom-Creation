<?php 

//Loop through assosiative array - 1D
$cars = array("volvo"=>"30" , "audi"=>"40" , "bmw"=>"50");

foreach ($cars as $key => $value) { 
	echo "Key is ".$key." & Value is : ".$value."<br>";
}


//foreach in multi-dimentional Array
$cars = array("sedan"=>array("Verna","HondaCity") , "sports"=>array("AudiR8","BmwI8"));

foreach ($cars as $key => $value) {
	echo "<br>".$key." -";
	               //echo $value; - This is not valid we have to create one more looop
	foreach ($value as $innerArray) {
		echo $innerArray." ";
	}

}

 ?>