<?php

namespace Block\Admin\CmsPage\Edit;

\Mage::loadFileByClassName("Block\Core\Edit\Tabs");

class Tabs extends \Block\Core\Edit\Tabs
{
	public function prepareTabs()
	{
		parent::prepareTabs();
		$this->addTabs('cmsPage', ['label' => 'CMS Page', 'block' => 'Block\Admin\CmsPage\Edit\Tabs\Form']);
		$this->setDefaultTab('cmsPage');
		return $this;
	}
}
