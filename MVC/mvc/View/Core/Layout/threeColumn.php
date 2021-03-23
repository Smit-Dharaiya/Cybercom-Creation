<!DOCTYPE html>
<html>
<?php echo \Mage::getBlock("Block\Core\Layout\Head")->toHtml(); ?>

<body>

	<table border="1" width="100%">
		<tbody>
			<tr>
				<td colspan="3">
					<?php echo $this->getChild('header')->toHtml();  ?>
				</td>
			</tr>
			<tr>
				<td class="align-top" width="10%"> <?php echo $this->getChild('left')->toHtml(); ?></td>
				<td width="80%">
					<?php echo  $this->getChild('message')->toHtml(); ?>
					<?php echo $this->getChild('content')->toHtml(); ?>
				</td>
				<td width="10%"> </td>
			<tr>
				<td colspan="3"> <?php echo $this->getChild('footer')->toHtml(); ?> </td>
			</tr>
		</tbody>
	</table>

</body>

</html>