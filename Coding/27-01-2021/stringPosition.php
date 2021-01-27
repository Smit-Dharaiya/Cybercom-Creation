<?php 

$str = 'this is a pen and this is a marker.';
$offset = 0 ;
$search = 'is';
$search_length = strlen($search);

while ($position = strpos($str,$search,$offset)) {

echo "<strong>".$search."</strong> Found at :".$position."<br>";
$offset = $position + $search_length;

}

?>