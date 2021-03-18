<?php

namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Edit');


class Edit extends \Block\Core\Edit
{

	public function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Customer\Edit\Tabs'));
	}

	public function getTitle()
	{
		if ($this->getTableRow()->id) {
			echo 'Update customer';
		} else {
			echo 'Add customer';
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
