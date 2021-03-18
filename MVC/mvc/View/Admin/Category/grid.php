<?php
$result=$this->getCategories();
?>

  <div class="container">
        <a class="btn btn-success float-end m-4" href="<?php echo $this->getUrl('form',NULL,NULL,TRUE); ?>">Add Category</a>
         <br><br> 
        <h2><?php echo $this->getTitle(); ?></h2> 
        <center><h3><?php if(!$result) { echo "No Record Found"; die();} ?></h3></center>
<table class="table table-striped table-inverse table-responsive">
              <thead class="thead-inverse">
                  <tr>
                      <th>Id</th>
                      <th>Category Name</th>
                      <th>Description</th>
                      <th>Parent ID</th>
                      <th>Path</th>
                      <th>Status</th>
                      <th colspan="2">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  	<center><strong>
                      <?php if(!$result): ?>
                        <tr>
                          <td>No Records Found</td>
                        </tr>
                    </center></strong>
                      <?php else: ?>  
                    <?php foreach ($result->getData() as $row): ?>
                      <tr>
                          <td><?php echo $row->id ;?></td>
                          <td><?php echo $this->getName($row) ;?></td>
                          <td><?php echo $row->description ;?></td>
                          <td><?php echo $row->parentId ;?></td>
                          <td><?php echo $row->path ;?></td>
                          <td>
                            <?php if($row->categoryStatus): echo "Enable"; ?>
                            <?php else: echo "Disable"; ?>  
                            <?php endif; ?>
                          </td>
                          <td><a href="<?php echo $this->getUrl('form',NULL,['id'=>"$row->id"],TRUE);?>"><i class="fas fa-pencil" aria-hidden="true"></i></a></td>
                          <td><a href="<?php echo $this->getUrl('delete',NULL,['id'=>"$row->id"],TRUE); ?>"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></td> 
                        </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
</table>