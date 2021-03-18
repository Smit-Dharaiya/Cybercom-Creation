<?php

namespace Block\Admin\CustomerGroup;

\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{

	function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\CustomerGroup\Edit\Tabs'));
	}

	public function getTitle()
	{
		if ($this->getTableRow()->id) {
			echo 'Update customerGroup';
		} else {
			echo 'Add CustomerGroup';
		}
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
