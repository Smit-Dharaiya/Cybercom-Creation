<?php 
$result=$this->getCustomers();
?>

	<div class="container">
        <a class="btn btn-success float-end m-4" href="<?php echo $this->getUrl('form',NULL,NULL,TRUE); ?>">Add Customer</a>
        <br><br> 
        <h2><?php echo $this->getTitle(); ?></h2> 
        <h3><?php if(!$result) { echo "No Record Found"; die();} ?></h3>
         <table class="table table-striped table-inverse table-responsive">
              <thead class="thead-inverse">
                  <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Contact No</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th colspan="2">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  	 <strong>
                      <?php
                      foreach ($result->getData() as $row){
                      ?>
                      </strong>
                      <tr>
                          <td><?php echo $row->firstName ?></td>
                          <td><?php echo $row->lastName ?></td>
                          <td><?php echo $row->email ?></td>
                          <td><?php echo $row->contactNo ?></td>
                          <td><?php
                          	if($row->status)
                               echo "Enable";
                            else
                            	echo "Disable";
                              ?>
                          </td>
                          <td><?php echo $row->createdDate ?></td>
                          <td><?php echo $row->updatedDate ?></td>
                          <td><a href="<?php echo $this->getUrl('form',NULL,['id'=>"$row->id"],TRUE);?>"><i class="fas fa-pencil" aria-hidden="true"></i></a></td>
                          <td><a href="<?php echo $this->getUrl('delete',NULL,['id'=>"$row->id"],TRUE); ?>"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></td> 
                        </tr>

                      <?php
                        }
                      ?>
                  </tbody>
          </table>
      </div>  