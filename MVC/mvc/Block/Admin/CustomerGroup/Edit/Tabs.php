<?php

namespace Block\Admin\CustomerGroup\Edit;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Tabs extends \Block\Admin\Core\Template
{
	protected $tabs = [];
	protected $defaultTab = null;
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/Admin/CustomerGroup/Edit/tabs.php');
		$this->prepareTabs();
	}

	public function prepareTabs()
	{
		$this->addTabs('customerGroup', ['label' => 'CustomerGroup Information', 'block' => 'Block\Admin\CustomerGroup\Edit\Tabs\Form']);
        $this->setDefaultTab('customerGroup');

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