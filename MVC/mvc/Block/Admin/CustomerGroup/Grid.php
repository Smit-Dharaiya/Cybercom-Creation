<?php 

namespace Block\Admin\CustomerGroup; 

\Mage::loadFileByClassName("Block\Core\Template");

class Grid extends \Block\Core\Template
{
	protected $customerGroups = [];

	public function __construct()
	{
    $this->setTemplate('./View/Admin/CustomerGroup/grid.php');
	}
	
	public function setCustomerGroups($customerGroups = NULL)
	{
		if(!$customerGroups){
			$customerGroup = \Mage::getModel("Model\CustomerGroup");
            $customerGroups = $customerGroup->fetchAll();
		}
		$this->customerGroups=$customerGroups;
		return $this;
	}

	public function getCustomerGroups()
	{
	if(!$this->customerGroups){
		$this->setCustomerGroups();
	}
	return $this->customerGroups;
    }

    public function getTitle()
	{
		$this->getTitle = 'Customer Groups Details';
		return $this->getTitle;
	}

}
