<?php 
if(isset($_POST['submit'])){
$name = $_POST['name'];
$password = $_POST['password'];
$address = $_POST['address'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
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
		<center><h1>User Form</h1></center>
	<form name="user" method="POST" action="user2.php" required>
		<div class="group">
		<label><strong>Enter Name :</strong></label> <input type="text" name="name"><br>
		<label><strong>Enter Password : </strong></label><input type="password" name="password"><br>
		<label><strong>Gender:</strong></label>
		<input type="radio" name="gender" value="Male">Male
		<input type="radio" name="gender" value="Female">Female
		<br><br><label><strong>Enter Address : </strong></label><textarea rows="5" cols="30" name="address"></textarea><br>
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
		<label><strong>Select Game :</strong></label>
		<input type="checkbox" name="game[]" value="Hockey">Hockey<br>
		<input type="checkbox" name="game[]" value="Football">Football<br>
		<input type="checkbox" name="game[]" value="Badminton">Badminton<br>
		<input type="checkbox" name="game[]" value="Cricket">Cricket<br>
		<input type="checkbox" name="game[]" value="Voleyball">Voleyball<br>
		<br><label><strong>Marital Status :</strong></label>
		<input type="radio" name="marital" value="married">Married
		<input type="radio" name="marital" value="unmarried">Unmarried
		<br><br><input type="checkbox" name="agree" id="agree" value="check"> I accept this agrement
		<br><br><button type="reset" value="reset" name="reset">Reset</button>
		<button type="submit" value="submit" name="submit" onclick="validation()">Submit</button><br><br>
		</div>
	</form>
	</div>
	<div class="col-md-3">
	</div>
</div>

<?php 

if(isset($submit) && !empty($_POST['game']) && !empty($_POST['gender'] && !empty($_POST['marital']) && !empty($_POST['agree'])))
{
$game = $_POST['game'];
$gender = $_POST['gender'];
$marital = $_POST['marital'];
$agree = $_POST['agree'];
  if(!empty($name) && !empty($password) && !empty($address) && !empty($marital)  && !empty($gender) && !empty($game) && !empty($marital) && !empty($agree)){

  echo "<p>";
	echo "Your Name is :" .$name;
	echo "<br> Password is : ".$password;
	echo "<br> Gender is : ".$gender;
	echo "<br> Address is : ".$address;
	echo "<br> Date of birth is : ".$day." ".$month.",".$year;
	echo "<br> Games are : ";
		foreach($game as $k){
			echo $k." ";
		}
	echo "<br>Marital Status is : ".$marital;
   echo "</p>";
}
}
 ?>
<script type="text/javascript" src="user2.js"></script>

</body>
</html>