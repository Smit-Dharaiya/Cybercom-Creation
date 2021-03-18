<?php 

namespace Block\Admin\Admin\Edit\Tabs;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Form extends \Block\Admin\Core\Template
{
	protected $admin = null ;
	function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/Admin/Admin/Edit/Tabs/form.php");
	}

	public function setAdmin($admin = null)
	{
		try{
			if($admin){
		        $this->admin =$admin;
				return $this;
			}
		    $admin = \Mage::getModel("Model\Admin");
			if($id = $this->getRequest()->getGet('id'))
			$admin = $admin->load($id);

			if(!$admin){
			throw new Exception("Id Not Found");
			}
			$this->admin=$admin;
			return $this;

		} catch (exception $e) {
    		$message = \Mage::getModel("Model\Admin\Message");
            $message->setFailure($e->getMessage());
            $this->redirect('grid');
		}
	}


	public function getAdmin()
	{
	if(!$this->admin){
		$this->setAdmin();
	}
	return $this->admin;
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