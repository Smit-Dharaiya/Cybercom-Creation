<?php

namespace Block\Admin\Admin;

\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
	function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Admin\Edit\Tabs'));
	}

	public function getTitle()
	{
		if ($this->getTableRow()->id) {
			echo 'Update Admin';
		} else {
			echo 'Add Admin';
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
