<?php

namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName("Block\Core\Edit");

class Form extends \Block\Core\Edit
{

	function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/Admin/Customer/Edit/Tabs/form.php");
	}

	public function getbutton()
	{
		if ($this->getTableRow()->id) {
			echo 'Update';
		} else {
			echo 'Add';
		}
	}
}
