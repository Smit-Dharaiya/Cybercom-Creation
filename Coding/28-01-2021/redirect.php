<?php ob_start();
 ?> 

<h1>SMIT</h1>
This is my page. 

<?php
$redirect_page = 'page1.php';
$redirect = false;

if($redirect){
    header('Location: '.$redirect_page);
}

ob_end_flush();
?>