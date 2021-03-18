<?php 

namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Category extends \Block\Admin\Core\Template
{
	
	function __construct()
	{
		$this->setTemplate("./View/Admin/Category/Edit/Tabs/category.php");
	}
}

?>