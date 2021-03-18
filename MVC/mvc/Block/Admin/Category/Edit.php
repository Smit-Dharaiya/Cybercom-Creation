<?php

namespace Block\Admin\Category;

\Mage::loadFileByClassName('Block\Admin\Core\Template');

class Edit extends \Block\Admin\Core\Template{

	protected $category = NULL;

	function __construct()
	{
		parent:: __construct();
		$this->setTemplate("View/Admin/Category/edit.php");
	}
	
	public function getTabContent()
	{
		$tabBlock = \Mage::getBlock("Block\Admin\Category\Edit\Tabs");
		$tabs= $tabBlock->getTabs();
		$tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)) {
			return null;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block =Mage::getBlock($blockClassName);
		return $block;
	}

	public function setCategory($category = NULL)
	{
		if($category){
			$this->category = $category;
			return $this;
		}
		$category = \Mage::getModel("Model\Category");
		if($id = $this->getController()->getRequest()->getGet('id')){
   			$category = $category->load($id);
     	}
		$this->category = $category;
		return $this->category;
	} 

	public function getCategory()
	{
		if(!$this->category){
			$this->setCategory();
		}
		return $this->category;
    }

    public function getTitle()
    {
    	if($this->getCategory()->id){
			echo 'Update Category';
		}
		else
		{echo 'Add Category';}
    }

    public function getFormUrl()
    {
    	return $this->getUrl('save');
    }

    public function getButton()
	{
		if($this->getCategory()->id){
			echo 'Update';
		}
		else{
		echo 'Add';
		}
	}
}

?>	