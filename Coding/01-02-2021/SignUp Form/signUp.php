<?php 

if(isset($_POST['submit'])){
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
		.group input , label {
			display: flex;
		}
		input[type=checkbox], input[type=radio]{
			display: inline-block;
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
			<option value="default" selected="">Day</option>
		</select>
		<select name="month">
			<option value="january">January</option>
			<option value="february">February</option>
			<option value="default" selected="">Month</option>
		</select>
		<select name="year">
			<option value="1999">1999</option>
			<option value="2000">2000</option>
			<option value="default" selected="">Year</option>
		</select><br><br>
		<label><strong>Gender:</strong></label>
		<input type="radio" name="gender" value="Male">Male
		<input type="radio" name="gender" value="Female">Female
		<br><br><label><strong>Country</strong></label>
		<select name="country">
			<option value="india">INDIA</option>
			<option value="usa">USA</option>
			<option value="canada">CANADA</option>
			<option value="default" selected="">Country</option>
		</select><br><br>
		<label><strong>Email</strong></label>
		<input type="email" name="email" id="email" placeholder="Enter E-mail">
		<br><label><strong>Phone</strong></label>
		<input type="tel" name="phone" id="phone" pattern="[0-9]{10}" placeholder="Enter Mobile no.">
		<br><label><strong>Password : </strong></label><input type="password" name="password"><br>
		<label><strong>Confirm Password : </strong></label><input type="password" name="cpassword"><br>
		<input type="checkbox" name="agree" id="agree" value="check"> I accept this agrement
		<br><br><button type="reset" value="reset" name="reset">Reset</button>
		<button type="submit" value="submit" name="submit" onclick="validation()">Submit</button><br><br>
		</div>
	</form>
	</div>
	<div class="col-md-3">
	</div>
</div>

<?php 

if(isset($submit) && !empty($_POST['gender']))
{
$agree = $_POST['agree'];
$gender = $_POST['gender'];
  if(!empty($fname) && !empty($lname) && !empty($gender) && !empty($email) && !empty($phone) && !empty($agree) && !empty($password) && !empty($cpassword) ){

  echo "<p>";
	echo "Your Full Name is : " .$fname." ".$lname;
	echo "<br> Date of birth is : ".$day." ".$month.",".$year;
	echo "<br> Gender is : ".$gender;
	echo "<br> Country is : ".$country;
	echo "<br> Email is : ".$email;
	echo "<br> Phone Number is : ".$phone;
	echo "<br> Password is : ".$password;
	echo "<br> Confirm Passwword is : ".$cpassword;
   echo "</p>";
 }
}
 ?>
<script type="text/javascript" src="signUp.js"></script>

</body>
</html>