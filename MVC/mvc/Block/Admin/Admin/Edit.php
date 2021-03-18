<?php

namespace Block\Admin\Admin;

\Mage::loadFileByClassName('Block\Admin\Core\Template');

class Edit extends \Block\Admin\Core\Template{

	protected $admin = NULL;

	function __construct()
	{
		parent:: __construct();
		$this->setTemplate("View/Admin/Admin/edit.php");
	}
	
	public function getTabContent()
	{
		$tabBlock = \Mage::getBlock("Block\Admin\Admin\Edit\Tabs");
		$tabs= $tabBlock->getTabs();
		$tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)) {
			return null;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block =Mage::getBlock($blockClassName);
		return $block;
	}

	public function setAdmin($admin = NULL)
	{
		if($admin){
			$this->admin = $admin;
			return $this;
		}
		$admin = \Mage::getModel("Model\Admin");
		if($id = $this->getController()->getRequest()->getGet('id')){
   			$admin = $admin->load($id);
     	}
		$this->admin = $admin;
		return $this->admin;
	} 

	public function getAdmin()
	{
		if(!$this->admin){
			$this->setAdmin();
		}
		return $this->admin;
    }

    public function getTitle()
    {
    	if($this->getAdmin()->id){
			echo 'Update Admin';
		}
		else
		{echo 'Add Admin';}
    }

    public function getButton()
	{
		if($this->getAdmin()->id){
			echo 'Update';
		}
		else{
		echo 'Add';
		}
	}

}

?>