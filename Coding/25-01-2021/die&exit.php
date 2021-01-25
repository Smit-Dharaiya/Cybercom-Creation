<?php 

echo "smit";
die(); //exit() - we can also use 
echo "Dharaiya"; // prints only smit

?>

<?php
@mysqli_connect('localhost', 'smit', '') or die('Could not connect to database!'); 

echo("Successfully connected!"); 
 
?>