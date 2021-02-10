<?php 
require 'connection.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
	<div id="registration-box">
        <h2>Registration</h2>        
    
        <form  name='registration' id="registration-form" method="POST">
            <div class="col-md-12">
                <select name="prefix" id="prefix">
                  <option value="mr">Mr.</option>
                  <option value="mrs">Mrs.</option>
                  <option value="" selected placeholder = "prefix">prefix</option>
                </select>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" name="fname" id="fname" placeholder="FirstName" required>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" name="lname" id="lname" placeholder="LastName" required>
            </div>            
            <div class="col-md-12">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
            <div class="col-md-12">
            <input type="phone" class="form-control" name="phone" id="phone" placeholder="MobileNumber">
            </div>            
            <div class="col-md-12">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="col-md-12">
                <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" name="info" id="info" placeholder="Information">
            </div>
            <div class="form-check">
            <input type="checkbox" class="form-check-input" name="checkbox" id="checkbox">
            <label class="form-check-label" for="exampleCheck1"> Hereby, I accept Terms & Conditions</label>
            </div>
            <br>
            <button type="submit" name="register" class="btn" onclick="formValidation()">Register</button>
			<br><br>
            <button type="submit" name="submit" class="btn" ><a href="login.php">Login</a></button>
        	
        </form>
    </div>

</body>
</html>
<script type="text/javascript" src="js/validation.js"></script>

<?php 

if(isset($_POST['register']) && isset($_POST['checkbox']) && $_POST['prefix'] != "")
{
    $prefix = $_POST['prefix'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$info = $_POST['info'];
    $check = $_POST['checkbox'];
    $date = date("d/m/Y");
    date_default_timezone_set("Asia/Kolkata");
    $time=date("h:i:s");
    $created = $date." ".$time;
    $flag = 0;
    
	if(!empty($prefix) && !empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($password) && !empty($info) && $password == $cpassword){
		      
            $result =mysqli_query($con,"select `email` from `user`");
                while($row=mysqli_fetch_array($result)){
                      if($row['email'] == $email){
                        $flag=2;
                        echo "<script>alert('Email already exist !');</script>";
                        break;
                      }
                  }
                  if($flag !== 2){  
            // $sql="INSERT INTO `user`(`prefix`,`firstname`,`lastname`,`mobile`,`email`,`password`,`information`,`created_at`) VALUES ('$prefix','$fname','$lname','$phone','$email','$password','$info','$created')";
                    $sql="INSERT INTO `user`(`prefix`,`firstname`,`lastname`,`mobile`,`password`,`information`,`created_at`,`email`) VALUES ('$prefix','$fname','$lname','$phone','$password','$info','$created','$email')";
              mysqli_query($con,$sql);
              $flag = 1;
              $_SESSION['created'] = $created;
              $_SESSION['name'] = $fname." ".$lname;
              if($flag == 1){
                echo "<script>alert('Data Inserted Successfully !');</script>";
                header('Location:blogpost.php');
              }
              else{
                echo "<script>alert('Something Went Wrong !');</script>";
              }
	}
    else{
        echo "<script>alert('Enter All Data !');</script>";
    }	
}
}

?>