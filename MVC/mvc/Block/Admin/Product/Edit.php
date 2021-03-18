<?php

namespace Block\Admin\Product;

\Mage::loadFileByClassName('Block\Admin\Core\Template');

class Edit extends \Block\Admin\Core\Template{

	protected $product = NULL;

	function __construct()
	{
		parent:: __construct();
		$this->setTemplate("View/Admin/Product/edit.php");
	}
	
	public function getTabContent()
	{
		$tabBlock = \Mage::getBlock("Block\Admin\Product\Edit\Tabs");
		$tabs= $tabBlock->getTabs();
		$tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)) {
			return null;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block =\Mage::getBlock($blockClassName);
		return $block;
	}

	public function setProduct($product = NULL)
	{
		if($product){
			$this->product = $product;
			return $this;
		}
		$product = \Mage::getModel("Model\Product");
		if($id = $this->getController()->getRequest()->getGet('id')){
   			$product = $product->load($id);
     	}
		$this->product = $product;
		return $this->product;
	} 

	public function getProduct()
	{
		if(!$this->product){
			$this->setProduct();
		}
		return $this->product;
    }

    public function getTitle()
    {
    	if($this->getProduct()->id){
			echo 'Update Product';
		}
		else
		{echo 'Add Product';}
    }

    public function getButton()
	{
		if($this->getProduct()->id){
			echo 'Update';
		}
		else{
		echo 'Add';
		}
	}

}

?>