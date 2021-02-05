<?php 

session_start();

if(isset($_POST['logout']))
	header('Location:sign-in.php');

if(!isset($_SESSION['name']))
	header('Location:sign-in.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	  
	 <h2>Hello <?php echo $_SESSION['name'];?></h2>
	<form method="POST">
	<br><br><button type="submit" name="logout" value="logout">Log-out</button>
	</form>	
</body>
</html>