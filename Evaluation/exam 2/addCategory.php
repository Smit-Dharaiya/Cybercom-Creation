<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
	<div id="registration-box">
        <h2>Add New Category</h2>        
    
        <form  name='registration' id="registration-form" method="POST">
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
            <input type="text" class="form-control" name="metotitle" id="url" placeholder="Meto Title">
            </div>
            <div class="col-md-12">
            <select name="pcategory" id="prefix">
                  <option value="">Parent category</option>
                  <option value="education">Education</option>
                  <option value="sports">Sports</option>
                  <option value=""  placeholder = "Category">prefix</option>
                </select>
            </div>            
            <br>
            <div class="col-md-12">
            <input type="file" class="form-control" name="file" id="file" placeholder="open File">
            </div> 
            <button type="submit" name="submit" class="btn">ADD</button>
			<br><br>
            
        	
        </form>
    </div>

</body>
</html>
<script type="text/javascript" src="js/validation.js"></script>

<?php 
require 'connection.php';
require 'header.php';

// if(isset($_POST['submit']) ) 
// {
//     $pCatagoryId = 1;
//     $title =$_POST['title'];
//     $metaTitle =$_POST['metotitle'];
//     $url =$_POST['url'];
//     $content = $_POST['content'];
//     // $img = file_upload('image');
//     // $category = $_POST['pcatagory'];
//     date_default_timezone_set("Asia/Kolkata");
//     $createdAt =date('Y-m-d H:i:s');
//     $updatedAt = $createdAt;
//     $flag = 0;
    
//     if(!empty($title)  && !empty($url)){
//     $sql="INSERT INTO `category`(`parent_category_id`, `title`, `meta_title`, `url`, `content`, `created_at`, `updated_at`)
//         VALUES ('$pCatagoryId','$title','$metaTitle ','$url','$content','$createdAt','$updatedAt')";
//      $flag = 1;
//          }
//      else {
//         echo '<script>alert("Please Fill Out All The Details");</script>';
//           }
//         if($flag == 1){
//             echo "<script>alert('Sent Successfully');</script>";
//             header("category.php");
//         }
//         else{
//             echo "<script>alert('Someting went wrong :');</script>";
//     }
// }


if(isset($_POST['submit']) && !empty($_FILES["image"]["name"]) ) 
{

$pCatagoryId = 1;
    $title =$_POST['title'];
    $metaTitle =$_POST['metotitle'];
    $url =$_POST['url'];
    $content = $_POST['content'];
    date_default_timezone_set("Asia/Kolkata");
    $createdAt =date('Y-m-d H:i:s');
    $updatedAt = $createdAt;
    $flag = 0;
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
    
        if(!empty($title) && !empty($content) && !empty($url))
        {   
            $category = $_POST['category'];
            
            $data = implode(',', $category);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
         {

        $sql="INSERT INTO `category`(`parent_category_id`, `title`, `meta_title`, `url`, `content`, `created_at`, `updated_at`)
         VALUES ('$pCatagoryId','$title','$metaTitle ','$url','$content','$createdAt','$updatedAt')";
     $flag = 1;
         }
     else {
        echo '<script>alert("Please Fill Out All The Details");</script>';
          }
        if($flag == 1){
            echo "<script>alert('Sent Successfully');</script>";
            header("category.php");
        }
        else{
            echo "<script>alert('Someting went wrong :');</script>";
    }

}
}
}

 ?>

