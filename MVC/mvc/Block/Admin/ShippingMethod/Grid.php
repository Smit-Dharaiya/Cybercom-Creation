<?php 

namespace Block\Admin\ShippingMethod;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Grid extends \Block\Admin\Core\Template
{
	protected $shippingMethods = [];

	public function __construct()
	{
    $this->setTemplate('./View/Admin/ShippingMethod/grid.php');
	}
	
	public function setShippingMethods($shippingMethods = NULL)
	{
		if(!$shippingMethods){
			$shipping = \Mage::getModel("Model\ShippingMethod");
            $shippingMethods = $shipping->fetchAll()->getData();
		}
		$this->shippingMethods=$shippingMethods;
		return $this;
	}

	public function getShippingMethods()
	{
	if(!$this->shippingMethods){
		$this->setShippingMethods();
	}
	return $this->shippingMethods;
    }

    public function getTitle()
	{
		$this->getTitle = 'Manage shipping Methods';
		return $this->getTitle;
	}

}

?>