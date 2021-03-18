<?php 

namespace Block\Admin\CmsPage\Edit\Tabs;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Form extends \Block\Admin\Core\Template
{
	protected $cmsPage = null ;
	function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/Admin/CmsPage/Edit/Tabs/form.php");
	}

	public function setCmsPage($cmsPage = null)
	{
		try{
			if($cmsPage){
		        $this->cmsPage =$cmsPage;
				return $this;
			}
		    $cmsPage = \Mage::getModel("Model\CmsPage");
			if($id = $this->getRequest()->getGet('id'))
			$cmsPage = $cmsPage->load($id);

			if(!$cmsPage){
			throw new Exception("Id Not Found");
			}
			$this->cmsPage=$cmsPage;
			return $this;

		} catch (exception $e) {
    		$message = \Mage::getModel("Model\Admin\Message");
            $message->setFailure($e->getMessage());
            $this->redirect('grid');
		}
	}


	public function getCmsPage()
	{
	if(!$this->cmsPage){
		$this->setCmsPage();
	}
	return $this->cmsPage;
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