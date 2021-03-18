<?php 
$product = $this->getproduct();
$customerGroups =$this->getCustomerGroups()->getData();
 ?>
 <form method="POST" action="<?php 	echo $this->getUrlObject()->getUrl('save',null,'[id] = $product->id'); ?>">	
 <button class="btn btn-primary" type="submit">Update</button>
 <table class="table table-striped table-inverse table-responsive">
 	<tr>
 		<th>Group Id</th>
 		<th>Group Name</th>
 		<th>Price</th>
 		<th>Group Price</th>
 	</tr>
 		<?php foreach ($customerGroups as $key => $value): ?>
			<?php $rowStatus = ($value->entityId) ? "exist" : "new" ?> 			
 			<tr>
 			<td><?php echo $value->id  ?></td>
 			<td><?php echo $value->name ?></td>
 			<td><?php  ?></td>
 			<td> <input type="text" name="groupPrice[<?php echo $rowStatus ?>][<?php echo $value->id ?>]"></td>
 			</tr>
 		<?php endforeach; ?>

 </table>
</form>