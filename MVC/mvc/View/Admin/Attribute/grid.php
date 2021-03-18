<?php 
$result=$this->getAttributes();
// echo "<pre>";
// print_r($result);
?>

<div class="container">
        <a class="btn btn-success float-end m-4" href="<?php // echo $this->getUrlObject()->getUrl('form',NULL,NULL,TRUE); ?>">Add Attribute</a><br><br>
        <h2><?php echo $this->getTitle(); ?></h2> 
        <h3><?php if(!$result) { echo "No Record Found"; die();} ?></h3>
         <table class="table table-striped table-inverse table-responsive">
              <thead class="thead-inverse">
              <tr>
                <th>Attribute Id</th>
                <th>Entity Type Id</th>
                <th>Name</th>
                <th>Code</th>
                <th>Input Type</th>
                <th>Backend Type</th>
                <th>Sort Order</th>
                <th>backend Model</th>
                <th colspan="2">Action</th>
              </tr>
              <?php foreach($result as $key=>$attribute): ?>
              	<tr>
              		<td><?php echo $attribute->id ?></td>
              		<td><?php echo $attribute->entityTypeId ?></td>
              		<td><?php echo $attribute->name ?></td>
              		<td><?php echo $attribute->code ?></td>
              		<td><?php echo $attribute->inputType?></td>
              		<td><?php echo $attribute->backendType ?></td>
              		<td><?php echo $attribute->sortOrder ?></td>
              		<td><?php echo $attribute->backendModel ?></td>
              		<td><a href="<?php // echo $this->getUrlObject()->getUrl('form',NULL,['id'=>"$row->id"],TRUE);?>"><i class="fas fa-pencil" aria-hidden="true"></i></a></td>
                    <td><a href="<?php // echo $this->getUrlObject()->getUrl('delete',NULL,['id'=>"$row->id"],TRUE); ?>"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></td> 
              	</tr>
              <?php endforeach; ?>
              </thead>