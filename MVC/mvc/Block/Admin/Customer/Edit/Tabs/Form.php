<?php 

namespace Block\Admin\Customer\Edit\Tabs; 

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Form extends \Block\Admin\Core\Template
{
	protected $customer = null ;
	function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/Admin/Customer/Edit/Tabs/form.php");
	}

	public function setCustomer($customer = null)
	{
		try{
			if($customer){
		        $this->customer =$customer;
				return $this;
			}
		    $customer = \Mage::getModel("Model\Customer");
			if($id = $this->getRequest()->getGet('id'))
			$customer = $customer->load($id);

			if(!$customer){
			throw new Exception("Id Not Found");
			}
			$this->customer=$customer;
			return $this;

		} catch (exception $e) {
    		$message = \Mage::getModel("Model\Admin\Message");
            $message->setFailure($e->getMessage());
            $this->redirect('grid');
		}
	}

	public function getCustomer()
	{
	if(!$this->customer){
		$this->setCustomer($this->customer);
	}
	return $this->customer;
	}

    public function getbutton()
	{
		if($this->getCustomer()->id){
			echo 'Update';
		}
		else{
		echo 'Add';
		}
	}


}

?>