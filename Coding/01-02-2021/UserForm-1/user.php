<?php 

if(isset($_POST['submit'])){


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
	<form name="user" method="POST" action="user.php" required>
		<div class="group">
		<label><strong>Enter Name :</strong></label> <input type="text" name="name"><br>
		<label><strong>Enter Password : </strong></label><input type="password" name="password"><br>
		<label><strong>Enter Address : </strong></label><textarea rows="5" cols="30" name="address"></textarea><br>
		<label><strong>Select Game :</strong></label>
		<input type="checkbox" name="game[]" value="Hockey">Hockey<br>
		<input type="checkbox" name="game[]" value="Football">Football<br>
		<input type="checkbox" name="game[]" value="Badminton">Badminton<br>
		<input type="checkbox" name="game[]" value="Cricket">Cricket<br>
		<input type="checkbox" name="game[]" value="Voleyball">Voleyball<br>
		<label><strong>Gender:</strong></label>
		<input type="radio" name="gender" value="Male">Male
		<input type="radio" name="gender" value="Female">Female
		<label><strong>Select Age :</strong></label>
		<select name="age" id="age">
			<option value="10-20">10</option>
			<option value="above 20">Above 20</option>
			<option value="select" selected>Select</option>
		</select><br>
		<label><strong>Select Image :</strong></label>
		<input type="file" name="image" id="image">
		<br><button type="reset" value="reset" name="reset">Reset</button>
		<button type="submit" value="submit" name="submit" onclick="validation()">Submit</button><br><br>
		</div>
	</form>
	</div>
	<div class="col-md-3">
	</div>
</div>

<?php 

if(isset($_REQUEST['submit']) && !empty($_POST['game']) && !empty($_POST['gender']))
{
	$name = $_POST['name'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $submit = $_POST['submit'];
    $image = $_POST['image'];
	$game=$_POST['game'];
	$gender=$_POST['gender'];

  if(!empty($name) && !empty($password) && !empty($address) && !empty($image)){
  echo "<p>";
	echo "Your Name is :" .$name;
	echo "<br> Your Password is : ".$password;
	echo "<br> Your Address is : ".$address;
	echo "<br> Games are : ";
		foreach($game as $k){
			echo $k." ";
		}
	echo "<br> Gender is : ".$gender;
	echo "<br> Age is : ".$age;
	echo "<br> Image is : ".$image;

 echo "</p>";
}
}
 ?>
<script type="text/javascript" src="user.js"></script>

</body>
</html>