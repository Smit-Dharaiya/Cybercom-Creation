<?php 
require('header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Category</h2><hr>
	<button class="btn btn-primary"><a href="addCategory.php">Add Category</a></button>

	<div class="container">
          <table class="table table-striped table-inverse table-responsive">
              <thead class="thead-inverse">
                  <tr>
                      <th>Category Id</th>
                      <th>Category image</th>
                      <th>Category Name</th>
                      <th>created date</th>
                      <th>Action</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                        $result = mysqli_query($con,"select * from `blogpost`");
                        while($row = mysqli_fetch_array($result)){
                    ?>
                      <tr>
                          <td><?php echo $row['category_id']?></td>
                          <td><?php echo $row['title']?></td>
                          <td><?php echo $row['title']?></td>
                          <td><?php echo $row['created_at']?></td>
                          <td><a href="updateBlog.php?id=<?php echo $row['id']; ?>"><button>Edit</button></a></td>
                          <td><a href=""><button>Delete</button></a></td>
                      </tr>
                      <?php
                        }
                      ?>
                  </tbody>
          </table>
      </div></center>

</body>
</html>?>