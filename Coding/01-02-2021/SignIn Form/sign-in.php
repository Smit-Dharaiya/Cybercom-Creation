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
		<center><h1>Contact Us</h1></center>
	<form name="signIn" method="POST" action="sign-in.php" required>
		<div class="group">
		<br><label>E-mail Address </label>
		<input type="email" name="email" placeholder="Enter Email"><br>
		<label>Password :</label>
		<input type="password" name="password" placeholder="Enter Password"><br>
		<br><center><button type="submit" value="submit" name="submit" onclick="validation()">Submit</button></center><br>
		</div>
	</form>
	</div>
	<div class="col-md-5">
	</div>
</div>

<?php 

if(isset($_POST['submit']))
{
$email = $_POST['email'];
$password = $_POST['password'];
$submit = $_POST['submit'];
  if(!empty($password) && !empty($email)){

  echo "<br><p>";
	echo "<br> Email is : ".$email;
	echo "<br> Password is : ".$password;
   echo "</p>";
}
}
 ?>
<script type="text/javascript" src="sign-in.js"></script>

</body>
</html>