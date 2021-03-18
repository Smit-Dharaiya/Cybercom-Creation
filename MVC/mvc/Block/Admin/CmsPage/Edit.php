<?php

namespace Block\Admin\CmsPage;

\Mage::loadFileByClassName('Block\Admin\Core\Template');

class Edit extends \Block\Admin\Core\Template{

	protected $cmsPage = NULL;

	function __construct()
	{
		parent:: __construct();
		$this->setTemplate("View/Admin/CmsPage/edit.php");
	}
	
	public function getTabContent()
	{
		$tabBlock = \Mage::getBlock("Block\Admin\CmsPage\Edit\Tabs");
		$tabs= $tabBlock->getTabs();
		$tab=$this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		if(!array_key_exists($tab, $tabs)) {
			return null;
		}
		$blockClassName = $tabs[$tab]['block'];
		$block =Mage::getBlock($blockClassName);
		return $block;
	}

	public function setCmsPage($cmsPage = NULL)
	{
		if($cmsPage){
			$this->cmsPage = $cmsPage;
			return $this;
		}
		$cmsPage = \Mage::getModel("Model\CmsPage");
		if($id = $this->getController()->getRequest()->getGet('id')){
   			$cmsPage = $cmsPage->load($id);
     	}
		$this->cmsPage = $cmsPage;
		return $this->cmsPage;
	} 

	public function getCmsPage()
	{
		if(!$this->cmsPage){
			$this->setCmsPage();
		}
		return $this->cmsPage;
    }

    public function getTitle()
    {
    	if($this->getCmsPage()->id){
			echo 'Update CmsPage';
		}
		else
		{echo 'Add CmsPage';}
    }

    public function getButton()
	{
		if($this->getCmsPage()->id){
			echo 'Update';
		}
		else{
		echo 'Add';
		}
	}

}

?>