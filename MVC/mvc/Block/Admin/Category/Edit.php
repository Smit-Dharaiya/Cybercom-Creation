<?php

namespace Block\Admin\Category;

\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{

	function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Category\Edit\Tabs'));
	}

	public function getTitle()
	{
		if ($this->getTableRow()->id) {
			echo 'Update Category';
		} else {
			echo 'Add Category';
		}
	}

	public function getFormUrl()
	{
		return $this->getUrl('save');
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
