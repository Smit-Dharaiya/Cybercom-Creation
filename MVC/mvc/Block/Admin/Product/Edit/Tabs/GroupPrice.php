<?php 

namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName("Block\Core\Template");

class GroupPrice extends \Block\Core\Template
{
	protected $product = null;
	protected $customerGroups = null;
	
	function __construct()
	{
		$this->setTemplate('./View/Admin/Product/Edit/Tabs/groupPrice.php');
	}

	public function setProduct(\Model\Product $product)
	{
		$this->product = $product;
		return $this;
	} 

	public function getProduct()
	{
		return $this->product;
    }

    public function getCustomerGroups()
    {
    	$query = "SELECT cg.*,pgp.productId,pgp.entityId,pgp.price
    	FROM customergroup as cg
    	LEFT JOIN product_group_price as pgp
    		ON pgp.customerGroupId = cg.id";
    	$customerGroups = \Mage::getModel("Model\CustomerGroup");
    	$this->customerGroups = $customerGroups->fetchAll($query);
    	
    	return $this->customerGroups;
    }

}
