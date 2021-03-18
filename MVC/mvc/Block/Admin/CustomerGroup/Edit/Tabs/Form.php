<?php 

namespace Block\Admin\CustomerGroup\Edit\Tabs;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Form extends \Block\Admin\Core\Template
{
	protected $customerGroup = null ;
	function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/Admin/CustomerGroup/Edit/Tabs/form.php");
	}

	public function setCustomerGroup($customerGroup = null)
	{
		try{
			if($customerGroup){
		        $this->customerGroup =$customerGroup;
				return $this;
			}
		    $customerGroup = \Mage::getModel("Model\CustomerGroup");
			if($id = $this->getRequest()->getGet('id'))
			$customerGroup = $customerGroup->load($id);

			if(!$customerGroup){
			throw new Exception("Id Not Found");
			}
			$this->customerGroup=$customerGroup;
			return $this;

		} catch (exception $e) {
    		$message = \Mage::getModel("Model\Admin\Message");
            $message->setFailure($e->getMessage());
            $this->redirect('grid');
		}
	}


	public function getCustomerGroup()
	{
	if(!$this->customerGroup){
		$this->setCustomerGroup();
	}
	return $this->customerGroup;
	}

    public function getButton()
	{
		if($this->getCustomerGroup()->id){
			echo 'Update';
		}
		else{
		echo 'Add';
		}
	}


}

?>