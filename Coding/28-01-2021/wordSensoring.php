<?php 

$find = array('alex','billy','dale');
$replace = array('a**x','b***y','d**e');
    
if(isset($_POST['user_input']) && !empty($_POST['user_input'])){
    $user_input = $_POST['user_input'];
    $user_input_new = str_ireplace($find, $replace, $user_input);
    echo $user_input_new;

} 

 ?>

 <hr>

<form action="wordSensoring.php" method = "POST">
<textarea name="user_input" id="" cols="20" rows="5"><?php echo $user_input; ?></textarea>
<br><br>
<input type="submit" value="Submit">
</form>