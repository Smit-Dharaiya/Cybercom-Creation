<?php
      require('connection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Register Users</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <button><a href="user.php">Back</a></button>
          <br><br><h1>Users Details:</h1><center>
          <table class="table table-striped table-inverse table-responsive">
              <thead class="thead-inverse">
                  <tr>
                      <th>UserName</th>
                      <th>Password</th>
                      <th>Address</th>
                      <th>Games</th>
                      <th>Gender</th>
                      <th>Image</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                        $result = mysqli_query($con,"select * from userform");
                        while($row = mysqli_fetch_array($result)){
                    ?>
                      <tr>
                          <td><?php echo $row['name']?></td>
                          <td><?php echo $row['password']?></td>
                          <td><?php echo $row['address']?></td>
                          <td><?php echo $row['game']?></td>
                          <td><?php echo $row['gender']?></td>
                          <td><img height="200" width="200" src="<?php echo $row['image']?>" alt="Error.."></td>
                      </tr>

                      <?php
                        }
                      ?>
                  </tbody>
          </table>
      </div></center>
    <!-- Optional JavaScript -->

  </body>
</html>
