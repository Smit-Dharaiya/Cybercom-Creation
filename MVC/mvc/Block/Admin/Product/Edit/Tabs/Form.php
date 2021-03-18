<?php 

namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Form extends \Block\Admin\Core\Template
{
	protected $product = null ;
	function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/Admin/Product/Edit/Tabs/form.php");
	}

	public function setProduct($product = null)
	{
		try{
			if($product){
		        $this->product =$product;
				return $this;
			}
		    $product = \Mage::getModel("Model\Product");
			if($id = $this->getRequest()->getGet('id'))
			$product = $product->load($id);

			if(!$product){
			throw new Exception("Id Not Found");
			}
			$this->product=$product;
			return $this;

		} catch (exception $e) {
    		$message = \Mage::getModel("Model\Admin\Message");
            $message->setFailure($e->getMessage());
            $this->redirect('grid');
		}
	}


	public function getProduct()
	{
	if(!$this->product){
		$this->setProduct();
	}
	return $this->product;
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