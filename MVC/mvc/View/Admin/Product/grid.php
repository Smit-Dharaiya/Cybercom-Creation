<?php
$result=$this->getProducts();
?>

	<div class="container">
        <a class="btn btn-success float-end m-4" href="<?php  echo $this->getUrlObject()->getUrl('form',NULL,NULL,TRUE); ?>">Add Product</a><br><br>
        <h2><?php echo $this->getTitle(); ?></h2> 
        <h3><?php if(!$result) { echo "No Record Found"; die();} ?></h3>
         <table class="table table-striped table-inverse table-responsive">
              <thead class="thead-inverse">
              <tr>
                <th>SKU</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="2">Action</th>
              </tr>
              </thead>
              <tbody>
             	    <strong>
                    <?php
                    foreach ($result->getData() as $row) {
                    ?>   </strong>
                      <tr>
                          <td><?php echo $row->SKU ?></td>
                          <td><?php echo $row->name ?></td>
                          <td><?php echo $row->price ?></td>
                          <td><?php echo $row->discount ?></td>
                          <td><?php echo $row->quantity ?></td>
                          <td><?php echo $row->description ?></td>
                          <td><?php
                          	if($row->status)
                               echo "Enable";
                            else
                            	echo "Disable";
                              ?>
                          <td><?php echo $row->createdAt?></td>
                          <td><?php echo $row->updatedAt?></td>
                          </td>
                          <td><a href="<?php  echo $this->getUrlObject()->getUrl('form',NULL,['id'=>"$row->id"],TRUE);?>"><i class="fas fa-pencil" aria-hidden="true"></i></a></td>
                          <td><a href="<?php echo $this->getUrlObject()->getUrl('delete',NULL,['id'=>"$row->id"],TRUE); ?>"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></td> 
                          <td><a href="<?php echo $this->getUrlObject()->getUrl('index','Product\Group\Price',['id'=>"$row->id"],TRUE); ?>"><i class="fas fa-file-invoice-dollar" aria-hidden="true"></i></a></td> 
                        </tr>

                      <?php
                        }
                      ?>
                  </tbody>
          </table>
      </div>   
