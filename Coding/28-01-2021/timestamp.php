<?php 

    $time = time();
    echo "Current time:<br>";
    $actual_time = date(" l, dS M Y. @ g:i a", $time);
    echo $actual_time;

    echo "<br><br> Modified time:<br>";
    $actual_time = date(" l, dS M Y. @ g:i a", strtotime('+1 week 12 hours 30 seconds'));
    echo $actual_time;

 ?>