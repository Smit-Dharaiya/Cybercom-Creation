<?php

namespace Block\Admin\Admin\Edit\Tabs;

\Mage::loadFileByClassName("Block\Core\Edit");

class Form extends \Block\Core\Edit
{
	protected $admin = null;
	function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/Admin/Admin/Edit/Tabs/form.php");
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
