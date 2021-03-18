<?php 

namespace Block\Admin\ShippingMethod\Edit\Tabs;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Form extends \Block\Admin\Core\Template
{
	protected $shippingMethod = null ;
	function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/Admin/ShippingMethod/Edit/Tabs/form.php");
	}

	public function setShippingMethod($shippingMethod = null)
	{
		try{
			if($shippingMethod){
		        $this->shippingMethod =$shippingMethod;
				return $this;
			}
		    $shippingMethod = \Mage::getModel("Model\ShippingMethod");
			if($id = $this->getRequest()->getGet('id'))
			$shippingMethod = $shippingMethod->load($id);

			if(!$shippingMethod){
			throw new Exception("Id Not Found");
			}
			$this->shippingMethod=$shippingMethod;
			return $this;

		} catch (exception $e) {
    		$message = \Mage::getModel("Model\Admin\Message");
            $message->setFailure($e->getMessage());
            $this->redirect('grid');
		}
	}


	public function getShippingMethod()
	{
	if(!$this->shippingMethod){
		$this->setShippingMethod();
	}
	return $this->shippingMethod;
	}

    public function getButton()
	{
		if($this->getShippingMethod()->id){
			echo 'Update';
		}
		else{
		echo 'Add';
		}
	}


}

?>