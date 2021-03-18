<?php

namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName("Block\Core\Edit");

class Media extends \Block\Core\Edit
{
	function __construct()
	{
		$this->setTemplate("./View/Admin/Category/Edit/Tabs/media.php");
	}
}
