<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
	<div id="registration-box">
        <h2>Add New blog post</h2>        
    
        <form  name='addblog' id="addblog-form" method="POST" enctype="multipart/form-data" required>
            <div class="col-md-12">
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" name="content" id="content" placeholder="Content" required>
            </div>            
            <div class="col-md-12">
            <input type="text" class="form-control" name="url" id="url" placeholder="URL">
            </div>            
            <div class="col-md-12">
            <input type="date" class="form-control" name="published" id="published" placeholder="Published at">
            </div>
            <div class="col-md-12">
            <select name="category" id="category" multiple>
                  <option value="lifecycle">Lifecycle</option>
                  <option value="health">Health</option>
                  <option value="education">Education</option>
                  <option value="music">Music</option>
                  <option value="" selected disabled>Category</option>
                </select>
            </div>            
            <br>
            <div class="col-md-12">
            <input type="file" class="form-control" name="image" id="image" placeholder="open File">
            </div> 
            <button type="submit" name="submit" class="btn">Submit</button>
			<br><br>
            
        	
        </form>
    </div>

</body>
</html>
<script type="text/javascript" src="js/validation.js"></script>

<?php 
// require 'fileUpload.php';
require 'header.php';
require 'connection.php';

if(isset($_POST['submit']) && !empty($_FILES["image"]["name"]) ) 
{

$userid =2;
$title = $_POST['title'];
$content = $_POST['content'];
$url = $_POST['url'];
$createdAt =date('Y-m-d H:i:s');
$publishedAt = $_POST['published'];
$updatedAt = $createdAt;
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
    
        if(!empty($title) && !empty($content) && !empty($url) && !empty($img))
        {   
            $category = $_POST['category'];
            
            $data = implode(',', $category);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
         {

         $sql="INSERT INTO `blogpost` ( `userid`, `title`, `url`, `content`, `image`, `published_at`, `created_at`, `updated_at`) VALUES ($userid,'$title','$url','$content','$target_file','$publishedAt','$createdAt','$updatedAt')";
              mysqli_query($con,$sql);
              $flag = 1;
         }
     else {
        echo '<script>alert("Please Fill Out All The Details");</script>';
          }
        if($flag == 1){
            echo "<script>alert('Sent Successfully');</script>";
            header("blog.php");
        }
        else{
            echo "<script>alert('Someting went wrong :');</script>";    
        }

}
}
}
?>

