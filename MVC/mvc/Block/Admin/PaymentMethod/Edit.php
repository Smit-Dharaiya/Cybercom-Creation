<?php

namespace Block\Admin\PaymentMethod;

\Mage::loadFileByClassName('Block\Admin\Core\Template');

class Edit extends \Block\Admin\Core\Template{

	protected $paymentMethod = NULL;

	function __construct()
	{
		parent:: __construct();
		$this->setTemplate("View/Admin/PaymentMethod/edit.php");
	}
	
	public function getTabContent()
	{
		$tabBlock = \Mage::getBlock("Block\Admin\PaymentMethod\Edit\Tabs");
		$tabs= $tabBlock->getTabs();
		$tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)) {
			return null;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block =\Mage::getBlock($blockClassName);
		return $block;
	}

	public function setPaymentMethod($paymentMethod = NULL)
	{
		if($paymentMethod){
			$this->paymentMethod = $paymentMethod;
			return $this;
		}
		$paymentMethod = \Mage::getModel("Model\PaymentMethod");
		if($id = $this->getController()->getRequest()->getGet('id')){
   			$paymentMethod = $paymentMethod->load($id);
     	}
		$this->paymentMethod = $paymentMethod;
		return $this->paymentMethod;
	} 

	public function getPaymentMethod()
	{
		if(!$this->paymentMethod){
			$this->setPaymentMethod();
		}
		return $this->paymentMethod;
    }

    public function getTitle()
    {
    	if($this->getPaymentMethod()->id){
			echo 'Update paymentMethod';
		}
		else
		{echo 'Add paymentMethod';}
    }

    public function getButton()
	{
		if($this->getPaymentMethod()->id){
			echo 'Update';
		}
		else{
		echo 'Add';
		}
	}

}

?>