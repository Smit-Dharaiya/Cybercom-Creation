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
		<button type="submit" value="submit" name="submit" onclick="validation()">Submit</button>
		<button type="submit" value="view" name="view">VIEW</button><br><br>
		</div>
	</form>
	</div>
	<div class="col-md-3">
	</div>
</div>

<script type="text/javascript" src="user2.js"></script>

</body>
</html>

<?php 

require('connection.php');

if(isset($_REQUEST['view']))
	header('Location:viewUser2.php');

if(isset($_REQUEST['submit']) && $_POST['day'] != "" && $_POST['month'] != "" && $_POST['year'] != ""){
$name = $_POST['name'];
$password = $_POST['password'];
$address = $_POST['address'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$submit = $_POST['submit'];
$date = $day." ".$month.",".$year;
$flag = 0;

  if(!empty($_POST['game']) && !empty($_POST['gender'] && !empty($_POST['marital']) && !empty($_POST['agree'])) && !empty($name) && !empty($password) && !empty($address) )
  {
	$game = $_POST['game'];
    $gender = $_POST['gender'];
    $marital = $_POST['marital'];
    $agree = $_POST['agree'];
    $data = implode(',', $game);
    $flag = 1;

    $sql="INSERT INTO `userform2`(`name`, `password`, `gender`, `address`, `dob`, `game`, `marital status`) VALUES ('$name','$password','$gender','$address','$date','$data','$marital')";
    mysqli_query($con,$sql);

    if($flag==1){
    	echo "<script>alert('Data Submitted')</script>";
    	header('Location:viewUser2.php');}
    else
    	echo "<script>alert('Data Not Submitted')</script>";

}
else{
	echo "<script>alert('Something went Wrong !')</script>";
}

}
?>