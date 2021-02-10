<?php 
require 'connection.php';
$id = $_GET['id'];
$sql = "DELETE from `blogpost` WHERE `id`='$id'";
mysqli_query($con,$sql);
header('Location:blogpost.php');
?>