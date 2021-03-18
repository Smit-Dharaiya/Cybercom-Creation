<?php

namespace Block\Admin\ShippingMethod;

\Mage::loadFileByClassName('Block\Admin\Core\Template');

class Edit extends \Block\Admin\Core\Template{

	protected $shippingMethod = NULL;

	function __construct()
	{
		parent:: __construct();
		$this->setTemplate("View/Admin/ShippingMethod/edit.php");
	}
	
	public function getTabContent()
	{
		$tabBlock = \Mage::getBlock("Block\Admin\ShippingMethod\Edit\Tabs");
		$tabs= $tabBlock->getTabs();
		$tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)) {
			return null;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block =\Mage::getBlock($blockClassName);
		return $block;
	}

	public function setShippingMethod($shippingMethod = NULL)
	{
		if($shippingMethod){
			$this->shippingMethod = $shippingMethod;
			return $this;
		}
		$shippingMethod = \Mage::getModel("Model\ShippingMethod");
		if($id = $this->getController()->getRequest()->getGet('id')){
   			$shippingMethod = $shippingMethod->load($id);
     	}
		$this->shippingMethod = $shippingMethod;
		return $this->shippingMethod;
	} 

	public function getShippingMethod()
	{
		if(!$this->shippingMethod){
			$this->setShippingMethod();
		}
		return $this->shippingMethod;
    }

    public function getTitle()
    {
    	if($this->getShippingMethod()->id){
			echo 'Update ShippingMethod';
		}
		else
		{echo 'Add ShippingMethod';}
    }

    public function getButton()
	{
		if($this->getShippingMethod()->id){
			echo 'Update';
		}
		else{
		echo 'Add';
		}
	}

}

?>