<!DOCTYPE html>
<html>

<?php echo \Mage::getBlock("Block\Core\Layout\Head")->toHtml(); ?>

<body>

	<table border="1" width="100%">
		<tbody>
			<tr>
				<td colspan="2" height="100px"><?php echo $this->getChild('header')->toHtml();  ?></td>
			</tr>
			<tr width="100%">
				<td style="display: block;width:100%"> <?php echo $this->getChild('message')->toHtml();  ?></td>
				<td style="display: block;width:100%"> <?php echo $this->getChild('content')->toHtml();  ?> </td>
			</tr>
			<tr>
				<td colspan="2" height="100px"> <?php echo $this->getChild('footer')->toHtml(); ?> </td>
			</tr>

		</tbody>
	</table>
</body>

</html>