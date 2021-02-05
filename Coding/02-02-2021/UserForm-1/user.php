<?php 
require('connection.php');

if(isset($_POST['submit']) && !empty($_FILES["image"]["name"]) && !empty($_POST["age"])) 
{

$name = $_POST['name'];
$password = $_POST['password'];
$address = $_POST['address'];
$age = $_POST['age'];
$submit = $_POST['submit'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$flag = 0;

// Check if image file is a actual image or fake image
	$uploadOk = 1;
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
if(basename($_FILES["image"]["name"])=="")
{
 echo '<script>alert("choose image");</script>.';
}
if (file_exists($target_file) && $target_file!="uploads/") {
    echo '<script>alert("Sorry, Image File already exists");</script>.';
    $uploadOk = 0;
}
if ($_FILES["image"]["size"] > 5000000) {
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
}

if ($uploadOk === 0) {
    echo '<script>alert("Sorry, your file was not uploaded");</script>.';
} 
else 
    {
    
        if(!empty($name) && !empty($password) && !empty($address) && !empty($target_file)  && !empty($_POST['gender']) && !empty($_POST['game']))
        {   
        	$game = $_POST['game'];
        	
        	$data = implode(',', $game);

			$gender = $_POST['gender'];
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
         {

         $sql="INSERT INTO `userform`(`Name`, `password`, `address`, `game`, `gender`, `age`, `image`) VALUES ('$name','$password','$address','$data','$gender','$age','$target_file')";
              mysqli_query($con,$sql);
              $flag = 1;
         }
        }
     else {
        echo '<script>alert("Please Fill Out All The Details");</script>';
          }
    	if($flag == 1){
    		echo "<script>alert('Sent Successfully');</script>";
    		header("Location:userView.php");
    	}
    	else{
    		echo "<script>alert('Someting went wrong :');</script>";	
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
		button,button a{
			display: inline;
			float: left;
		}
	</style>

<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-6" style="background-color: silver">
		<center><h1>User Form</h1></center>
	<form name="user" method="POST" action="" enctype="multipart/form-data" required>
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
		<button type="submit" value="View" name="view"><a href="userView.php">View Users</a></button><br><br>
		</div>
	</form>
	</div>
	<div class="col-md-3">
	</div>
</div>

<script type="text/javascript" src="user.js"></script>

</body>
</html>