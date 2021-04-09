<?php
$customerGroups = $this->getCustomerGroups();
?>
<form method="POST" action="<?php echo $this->getUrlObject()->getUrl('save', 'product\group\price', null, true); ?>">
	<table class="table table-striped table-inverse table-responsive my-4">
		<tr>
			<th>Group Id</th>
			<th>Group Name</th>
			<th>Group Price</th>
		</tr>
		<?php foreach ($customerGroups->getData() as $key => $value) : ?>
			<?php $rowStatus = ($value->entityId) ? "exist" : "new" ?>
			<tr>
				<td><?php echo $value->id  ?></td>
				<td><?php echo $value->name ?></td>
				<td> <input type="text" name="groupPrice[<?php echo $rowStatus ?>][<?php echo $value->id ?>]" value="<?php echo $value->price ?>"></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<a href="<?php echo $this->getUrlObject()->getUrl('grid'); ?>" name="back" id="back" class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left fa=sm"></i> Back</a>
	<button class="btn btn-success mx-2" type="submit">Update</button>
</form>