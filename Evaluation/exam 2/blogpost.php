<?php 
require('header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Blog Post</h2><hr>
	<button class="btn btn-primary"><a href="addBlog.php">Add Blog Post</a></button>

	<div class="container">
          <table class="table table-striped table-inverse table-responsive">
              <thead class="thead-inverse">
                  <tr>
                      <th>Post Id</th>
                      <th>Category name</th>
                      <th>Title</th>
                      <th>Published</th>
                      <th>Action</th>
                      <th>Image</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                        $result = mysqli_query($con,"select * from `blogpost`");
                        while($row = mysqli_fetch_array($result)){
                    ?>
                      <tr>
                          <td><?php echo $row['id']?></td>
                          <td><?php echo $row['category']?></td>
                          <td><?php echo $row['title']?></td>
                          <td><?php echo $row['published_at']?></td>
                          <td><a href="updateBlog.php?id=<?php echo $row['id']; ?>"><button>Edit</button></a></td>
                          <td><a href="deleteBlog.php?id=<?php echo $row['id']; ?>"><button>Delete</button></a></td>
                      </tr>
                      <?php
                        }
                      ?>
                  </tbody>
          </table>
      </div></center>

</body>
</html>