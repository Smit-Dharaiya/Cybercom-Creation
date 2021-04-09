<?php

namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName("Block\Core\Edit");

class GroupPrice extends \Block\Core\Edit
{
	protected $product = null;
	protected $customerGroups = null;

	function __construct()
	{
		$this->setTemplate('./View/Admin/Product/Edit/Tabs/groupPrice.php');
	}

	public function setProduct(\Model\Product $product = null)
	{
		$this->product = $product;
		return $this;
	}

	public function getProduct()
	{
		if (!$this->product) {
			$this->setProduct();
		}
		return $this->product;
	}

	public function getCustomerGroups()
	{
		$product = $this->getTableRow();
		$productId = $product->id;
		$query = "SELECT cg.*,pgp.productId,pgp.entityId,pgp.price
				FROM `customergroup` as cg
				LEFT JOIN `product_group_price` as pgp
					ON pgp.customerGroupId = cg.id AND pgp.productID = '{$productId}'
				LEFT JOIN `product` p
					ON pgp.productId = p.id";
		$customerGroups = \Mage::getModel("Model\CustomerGroup");
		$this->customerGroups = $customerGroups->fetchAll($query);

		return $this->customerGroups;
	}
}
