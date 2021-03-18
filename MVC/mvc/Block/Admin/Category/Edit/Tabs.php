<?php

namespace Block\Admin\Category\Edit;

\Mage::loadFileByClassName("Block\Admin\Core\Template");


class Tabs extends \Block\Admin\Core\Template
{
	protected $tabs = [];
	protected $defaultTab = null;
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/Category/Edit/tabs.php');
		$this->prepareTabs();
	}

	public function prepareTabs()
	{
		$this->addTabs('category', ['label' => 'Category Information', 'block' => 'Block\Admin\Category\Edit\Tabs\Form']);
        $this->addTabs('media', ['label' => 'Media Information', 'block' => 'Block\Admin\Category\Edit\Tabs\Media']);
        $this->addTabs('Subcategory', ['label' => 'Sub-Category Information', 'block' =>'Block\Admin\Category\Edit\Tabs\Category']);
        $this->setDefaultTab('category');

	}

	public function setDefaultTab($defaultTab)
	{
		$this->defaultTab = $defaultTab;
		return $this;
	}

	public function getDefaultTab()
	{
		return $this->defaultTab;
	}

	public function setTabs(array $tabs)
	{
		$this->tabs = $tabs;
		return $this;
	}

	public function getTabs()
	{
		return $this->tabs;
	}

	public function addTabs($key,$tab=[])
	{
		$this->tabs[$key] = $tab;
		return $this;
	}

	public function getTab($key)
	{
		if (!array_key_exists($key, $this->tabs)) {
			return null;
		}
		return $this->tabs[$key];
	}

	public function removeTab($key)
	{
		if (!array_key_exists($key, $this->tabs)) {
			return null;
		}
		unset($this->tabs[$key]);
	}
}

?>