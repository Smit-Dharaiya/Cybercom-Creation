<?php

namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName("Block\Core\Edit");

class Category extends \Block\Core\Edit
{

	function __construct()
	{
		$this->setTemplate("./View/Admin/Product/Edit/Tabs/category.php");
	}
}
