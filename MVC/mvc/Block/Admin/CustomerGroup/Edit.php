<?php

namespace Block\Admin\CustomerGroup;

\Mage::loadFileByClassName('Block\Admin\Core\Template');

class Edit extends \Block\Admin\Core\Template {

	protected $customerGroup = NULL;

	function __construct()
	{
		parent:: __construct();
		$this->setTemplate("View/Admin/CustomerGroup/edit.php");
	}
	
	public function getTabContent()
	{
		$tabBlock = \Mage::getBlock("Block\Admin\CustomerGroup\Edit\Tabs");
		$tabs= $tabBlock->getTabs();
		$tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)) {
			return null;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block =\Mage::getBlock($blockClassName);
		return $block;
	}

	public function setCustomerGroup($customerGroup = NULL)
	{
		if($customerGroup){
			$this->customerGroup = $customerGroup;
			return $this;
		}
		$customerGroup = \Mage::getModel("Model\CustomerGroup");
		if($id = $this->getController()->getRequest()->getGet('id')){
   			$customerGroup = $customerGroup->load($id);
     	}
		$this->customerGroup = $customerGroup;
		return $this->customerGroup;
	} 

	public function getCustomerGroup()
	{
		if(!$this->customerGroup){
			$this->setCustomerGroup();
		}
		return $this->customerGroup;
    }

    public function getTitle()
    {
    	if($this->getCustomerGroup()->id){
			echo 'Update customerGroup';
		}
		else
		{echo 'Add Product';}
    }

    public function getButton()
	{
		if($this->getCustomerGroup()->id){
			echo 'Update';
		}
		else{
		echo 'Add';
		}
	}

}

?>