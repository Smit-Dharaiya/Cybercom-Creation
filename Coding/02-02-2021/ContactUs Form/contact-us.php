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

		button{
			width: 100%;
			height: 50px;
		}
	</style>

<div class="row">
	<div class="col-md-4">
	</div>
	<div class="col-md-4" style="background-color: silver">
		<center><h1>Contact Us</h1></center>
	<form name="contact" method="POST" action="contact-us.php" required>
		<div class="group">
		<input type="text" name="name" placeholder="Name..."><br>
		<input type="email" name="email" placeholder="Email..."><br>
		<input type="text" name="subject" placeholder="Subject..."><br>
		<textarea rows="5" cols="85" name="message" placeholder="Message..."></textarea><br>
		<br><button type="submit" value="submit" name="submit" onclick="validation()">Send Message</button><br><br>
		
		</div>
	</form>
	</div>
	<div class="col-md-4">
	</div>
</div>

<?php 

require('connection.php');

if(isset($_POST['submit']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$msg = $_POST['message'];
$submit = $_POST['submit'];
$flag = 0;

  if(!empty($name) && !empty($email) && !empty($subject) && !empty($msg) ){

$sql="INSERT INTO `contactus`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$msg')";
    mysqli_query($con,$sql);
    $flag=1;

    if($flag==1){
    	echo "<script>alert('Data Submitted')</script>";
    	header('Location:viewContactUs.php');}
    else
    	echo "<script>alert('Data Not Submitted')</script>";
}
}
 ?>
<script type="text/javascript" src="contact-us.js"></script>

</body>
</html>