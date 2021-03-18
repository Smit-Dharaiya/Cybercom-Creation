<?php 

namespace Block\Admin\Customer;

\Mage::loadFileByClassName("Block\Core\Template");

class Grid extends \Block\Core\Template
{
	protected $customers = [];
	
	public function __construct()
	{
    $this->setTemplate('./View/Admin/Customer/grid.php');
	}
	
	public function setCustomers($customers = NULL)
	{
		if(!$customers){
			$customer = \Mage::getModel("Model\Customer");
            $customers = $customer->fetchAll();
		}
		$this->customers=$customers;
		return $this;
	}

	public function getCustomers()
	{
	if(!$this->customers){
		$this->setCustomers();
	}
	return $this->customers;
    }

    public function getTitle()
	{
		$this->getTitle = 'Customers Details';
		return $this->getTitle;
	}

}
