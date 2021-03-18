<?php

namespace Block\Admin\Product\Edit;

\Mage::loadFileByClassName("Block\Core\Edit\Tabs");

class Tabs extends \Block\Core\Edit\Tabs
{
	public function prepareTabs()
	{
		parent::prepareTabs();
		$this->addTabs('product', ['label' => 'Product Information', 'block' => 'Block\Admin\Product\Edit\Tabs\Form']);
		$this->addTabs('media', ['label' => 'Media Information', 'block' => 'Block\Admin\Product\Edit\Tabs\Media']);
		$this->addTabs('category', ['label' => 'Category Information', 'block' => 'Block\Admin\Product\Edit\Tabs\Category']);
		$this->setDefaultTab('product');
		return $this;
	}
}
