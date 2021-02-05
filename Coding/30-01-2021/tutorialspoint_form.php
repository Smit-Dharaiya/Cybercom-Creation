<?php

$errName = "";
$errEmail ="";
$errTime = "";
$errClasses = "";
$errGender = "";
$errSubject = "";
$errAgree = "";

    function check($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

if(!isset($_POST['agree'])){
	$errAgree = "You must agree to terms";
}
if(isset($_REQUEST['submit'])){
	if(!empty($_POST['name'])){
		$name = check($_POST['name']); 
	}
	else{
		$errName = "Name is Required.";
	}
	if(!empty($_POST['email'])){
		$email = check($_POST['email']);
	}
	else{
		$errEmail = "Email is Required.";
	}
	if(!empty($_POST['classes'])){
		$classes = check($_POST['classes']);
	}
	else{
		$errClasses = "Classes is Required.";
	}
	if(!empty($_POST['time'])){
		$time = check($_POST['time']);
	}
	else{
		$errTime = "Time is Required.";
	}
	if(!empty($_POST['gender'])){
		$gender = $_POST['gender'];
	}
	else{
		$errGender = "Gender is Required.";
	}
	if(!empty($_POST['subject'])){
		$subject = $_POST['subject'];
	}
	else{
		$errSubject = "Subject is Required.";
	}
}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<style type="text/css">
 		.error{
 			color: red;
 		}
 	</style>


 	<form action="tutorialspoint_form.php" method="POST">

 		<h1>Absolute Class Registration</h1>

 		<table>
 			<tr>
 				<td>Name :</td>
 				<td><input type="text" name="name">
 				<span class="error"><?php echo $errName; ?></span>
 				</td>
 			</tr>
 			<tr>
 				<td>E-mail :</td>
 				<td><input type="email" name="email">
 				<span class="error"><?php echo $errEmail; ?></span>
 				</td>
 			</tr>
 			<tr>
 				<td>Time :</td>
 				<td><input type="time" name="time">
 				<span class="error"><?php echo $errTime; ?></span>
 				</td>
 			</tr>
 			<tr>
 				<td>Classes :</td>
 				<td><textarea rows="10" cols="20" name="classes"></textarea>
 				<span class="error"><?php echo $errClasses; ?></span>
 				</td>
 			</tr>
 			<tr>
 				<td>Gender :</td>
 				<td>
 					<input type="radio" name="gender" value="male">Male
 					<input type="radio" name="gender" value="female">Female
 				<span class="error"><?php echo $errGender; ?></span>
 				</td>
 			</tr>
 			<tr>
 				<td>Select :</td>
 				<td>
 					<select name="subject[]" size="4" multiple>
 					<option value="android">Android</option>
 					<option value="java">Java</option>
 					<option value="c">C#</option>
 					<option value="database">Data Base</option>
 					</select>
 				<span class="error"><?php echo $errSubject; ?></span>
 				</td>
 			</tr>
 			<tr>
 				<td>Agree :</td>
 				<td><input type="checkbox" name="agree">
 				<span class="error"><?php echo $errAgree; ?></span>
 				</td>
 			</tr>
 			<tr>
 				<td><input type="submit" name="submit"></td>
 			</tr>
 		
 		</table>
 		
 	</form><br>
 
 </body>
 </html>

 <?php

if(isset($_POST['submit'])){
	if(empty($errAgree) && empty($errName) && empty($errEmail) && empty($errSubject) && empty($errGender) && empty($errClasses)){
		echo "Your name is : " .$name;
		echo "<br>Your Email is : ".$email;
		echo "<br>Your Time is : ".$time;
		echo "<br>Your class is : ".$classes;
		echo "<br>Your Gender is : ".$gender;
		echo "<br>Your Subjects are :";
		for($i=0;$i<count($subject);$i++){
			echo $subject[$i]." ";
		}
		
	}
}

 ?>