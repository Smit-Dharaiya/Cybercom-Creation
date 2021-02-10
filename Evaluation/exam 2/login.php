<?php 
require('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
	<center>
    <div id="login-form">
    <h1 id="Heading">Login </h1>
    <form method="POST">
    <div class="container">
    <input type="email" placeholder="Enter Email" name="email" id="email">
    <input type="password" placeholder="Enter Password" name="password" id="password">
    <br>
    <button name="submit" id="submit">Login</button>
    </div>
    <div class="container">
    <p class="or"><b> OR </b></p>
    <br>
    <button><a href="register.php">Register Now</a></button>
  </div>

</form>
</div>
</center>
</body>
</html>

<?php 
   
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `user` WHERE `email` == '$email' AND `password` == '$password' ";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res > 0)){
      header('Location:blogpost.php');
    }
    else{
       echo "<script>alert('Failed');</script>"; 
    } 
}


 ?>
