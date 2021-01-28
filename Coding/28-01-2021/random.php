<?php 

    if(isset($_POST['dice'])){

        $rand = rand(1,6);
        echo "You Rolled : ".$rand;
    }
?>

<form action="random.php" method="POST">
    <input type="submit" value="Roll Dice" name="dice">
</form>


