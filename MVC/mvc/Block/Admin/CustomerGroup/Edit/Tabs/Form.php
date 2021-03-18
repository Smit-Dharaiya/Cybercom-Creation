<?php

namespace Block\Admin\CustomerGroup\Edit\Tabs;

\Mage::loadFileByClassName("Block\Core\Edit");

class Form extends \Block\Core\Edit
{
	function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/Admin/CustomerGroup/Edit/Tabs/form.php");
	}

	public function getButton()
	{
		if ($this->getTableRow()->id) {
			echo 'Update';
		} else {
			echo 'Add';
		}
	}
}
