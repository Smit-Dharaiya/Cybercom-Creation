<?php
session_start();
$_SESSION['username'] = 'Smit';

echo $_SESSION['username'];


if(isset($_GET['day']) && isset($_GET['month']) && isset($_GET['year'])){
    $day = htmlentities($_GET['day']);
    $month =htmlentities( $_GET['month']);
    $year = htmlentities( $_GET['year']);

    if(!empty($day) && !empty($month) && !empty($year)){
        echo $day." ".$month.",".$year.".";
    }else{
        echo "fill all fields.";
    }
}
?>

<form action="get.php" method="GET">
    Day:<br><input type="text" name="day"><br>
    Month:<br><input type="text" name="month"><br>
    Year:<br><input type="text" name="year"><br><br>
    <input type="submit" value="submit">
</form>