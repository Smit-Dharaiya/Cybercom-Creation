<?php 

namespace Block\Admin\Customer; 

\\Mage::loadFileByClassName('Block\Admin\Core\Template');


class Edit extends \Block\Admin\Core\Template{

	protected $customer = NULL;

	public function __construct()
	{
		parent:: __construct();
		$this->setTemplate("View/Admin/Customer/edit.php");
	}

	public function getTabContent()
	{

		$tabBlock = \Mage::getBlock("Block\Admin\Customer\Edit\Tabs");
		$tabs= $tabBlock->getTabs();
		$tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs))
			return null;
		$blockClassName = $tabs[$tab]['block'];
		$block =\Mage::getBlock($blockClassName);
		return $block;
		// return $this;
	}	

	public function setCustomer($customer = NULL)
	{
		if($customer){
			$this->customer = $customer;
			return $this;
		}
		$customer = \Mage::getModel("Model\Customer");
		if($id = $this->getRequest()->getGet('id')){
   			$customer = $customer->load($id);
     	}
		$this->customer = $customer;
	} 

	public function getCustomer()
	{
		if(!$this->customer){
			$this->setCustomer();
		}
		return $this->customer;
    }
 
    public function getTitle()
    {
    	if($this->getCustomer()->id){
			echo 'Update customer';
		}
		else
		{echo 'Add customer';}
    }

    public function getButton()
	{
		if($this->getCustomer()->id){
			echo 'Update';
		}
		else{
		echo 'Add';
		}
	}
}

?>