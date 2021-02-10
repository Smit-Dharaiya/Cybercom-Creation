<?php 
require 'connection.php';
require 'fileupload.php';
session_start();
$_SESSION['name']= "smit";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css">
</head>
<body>
    <div class="menu">
        <ul>
            <li style="color: white;font-size: 20px;"><?php echo $_SESSION['name'] ?></li> 
            <li><a href="category.php">Manage Category</a></li>
            <li><a href="">My Profile</a></li>
            <li><a href="login.php">Log Out</a></li>
        </ul>
    </div>
</body>
</html>