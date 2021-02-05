<?php 

require('connection.php');
session_start();

if(isset($_REQUEST['submit']))
{
$email = $_POST['email'];
$password = $_POST['password'];
$submit = $_POST['submit'];
$flag=0;

  if(!empty($password) && !empty($email)){
 	
     $sql="SELECT * FROM `signup`";
     $result=mysqli_query($con,$sql);

	 while ($row = mysqli_fetch_array($result)) {
	 
		if( $email === $row['email'] && $password === $row['password']){
            $name = $row['name'];
			$_SESSION['name'] = $name;
			$flag = 1;
			echo "<script>alert('user found !');</script>";
			header('Location:home.php');
		}
	}
	if($flag==0){
		echo "<script>alert('No user found !');</script>";
	}
    
}
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">

		.group input{
			display: flex;
			width: 100%;
		}
		input[type=checkbox], input[type=radio]{
			display: inline-block;
			width: 100%;
		} 

		p{
			background-color: yellow;
			text-align: center;

		}
	</style>

<div class="row">
	<div class="col-md-5">
	</div>
	<div class="col-md-2" style="background-color: silver">
		<center><h1>Sign In</h1></center>
	<form name="signIn" method="POST" action="" required>
		<div class="group">
		<br><label>E-mail Address </label>
		<input type="email" name="email" placeholder="Enter Email"><br>
		<label>Password :</label>
		<input type="password" name="password" placeholder="Enter Password"><br>
		<br><center><button type="submit" value="submit" name="submit" onclick="validation()">Log-in</button></center><br>
		</div>
	</form>
	</div>
	<div class="col-md-5">
	</div>
</div>
<script type="text/javascript" src="sign-in.js"></script>

</body>
</html>
