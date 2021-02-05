<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		.group input , label {
			display: flex;
		}
		input[type=checkbox], input[type=radio]{
			display: inline-block;
		} 

		button{
			margin-right: 30px;
		}

		p{
			background-color: yellow;
			text-align: center;

		}
	</style>

<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-6" style="background-color: silver">
		<center><h1>Sign Up</h1></center>
	<form name="user" method="POST" action="signUp.php" required>
		<div class="group">
		<label><strong>First Name :</strong></label> <input type="text" name="fname" placeholder="Enter First Name"><br>
		<label><strong>Last Name :</strong></label> <input type="text" name="lname" placeholder="Enter Last Name"><br>
		<label><strong>D.O.B</strong></label>
		<select name="day">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="" selected="">Day</option>
		</select>
		<select name="month">
			<option value="january">January</option>
			<option value="february">February</option>
			<option value="" selected="">Month</option>
		</select>
		<select name="year">
			<option value="1999">1999</option>
			<option value="2000">2000</option>
			<option value="" selected="">Year</option>
		</select><br><br>
		<label><strong>Gender:</strong></label>
		<input type="radio" name="gender" value="Male">Male
		<input type="radio" name="gender" value="Female">Female
		<br><br><label><strong>Country</strong></label>
		<select name="country">
			<option value="india">INDIA</option>
			<option value="usa">USA</option>
			<option value="canada">CANADA</option>
			<option value="" selected="">Country</option>
		</select><br><br>
		<label><strong>Email</strong></label>
		<input type="email" name="email" id="email" placeholder="Enter E-mail">
		<br><label><strong>Phone</strong></label>
		<input type="tel" name="phone" id="phone" pattern="[0-9]{10}" placeholder="Enter Mobile no.">
		<br><label><strong>Password : </strong></label><input type="password" name="password"><br>
		<label><strong>Confirm Password : </strong></label><input type="password" name="cpassword"><br>
		<input type="checkbox" name="agree" id="agree" value="check"> I accept this agrement
		<br><br><button type="reset" value="reset" name="reset">Reset</button>
		<button type="submit" value="submit" name="submit" onclick="validation()">Submit</button>
		<button type="submit" value="view" name="view">VIEW</button><br><br>
		</div>
	</form>
	</div>
	<div class="col-md-3">
	</div>
</div>

<?php 

if(isset($_REQUEST['view']))
	header('Location:view.php');

require('connection.php');
if(isset($_REQUEST['submit']) && !empty($_POST['gender']))
{
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$country = $_POST['country'];
$email = $_POST['email'];
$phone =$_POST['phone'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$submit = $_POST['submit'];
$date = $day." ".$month.",".$year;
$agree = $_POST['agree'];
$gender = $_POST['gender'];
$flag = 0;
  if(!empty($fname) && !empty($lname) && !empty($gender) && !empty($email) && !empty($phone) && !empty($agree) && !empty($password) && !empty($cpassword) && $password === $cpassword && $day != "" && $month != "" && $year != ""){

  	$sql="INSERT INTO `signup`(`first name`,`last name`,`dob`, `gender`, `country`, `email`, `phone`, `password`) VALUES ('$fname','$lname','$date','$gender','$country','$email','$phone','$password')";
    mysqli_query($con,$sql);
    $flag=1;
  }
  if($flag==1){
  	echo "<script>alert('Successfully submited :')</script>";
  	header('Location:view.php');}
  else
  	echo "<script>alert('Somthing Went Wrong !')</script>";
}
 ?>
<script type="text/javascript" src="signUp.js"></script>

</body>
</html>