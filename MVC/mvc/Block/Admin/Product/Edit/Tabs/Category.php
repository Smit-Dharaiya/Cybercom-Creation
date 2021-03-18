<?php 

namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Category extends \Block\Admin\Core\Template
{
	
	function __construct()
	{
		$this->setTemplate("./View/Admin/Product/Edit/Tabs/category.php");
	}
}

?>