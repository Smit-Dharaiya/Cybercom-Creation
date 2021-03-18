<?php 

namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Form extends \Block\Admin\Core\Template
{
	protected $category = null ;
	protected $categoryOptions = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/Admin/Category/Edit/Tabs/form.php");
	}

	public function setCategory($category = null)
	{
		try{
			if($category){
		        $this->category =$category;
				return $this;
			}
		    $category = \Mage::getModel("Model_Category");
			if($id = $this->getRequest()->getGet('id'))
			$category = $category->load($id);

			if(!$category){
			throw new Exception("Id Not Found");
			}
			$this->category=$category;
			return $this;

		} catch (exception $e) {
    		$message = \Mage::getModel("Model_Admin_Message");
            $message->setFailure($e->getMessage());
            $this->redirect('grid');
		}
	}


	public function getCategory()
	{
	if(!$this->category){
		$this->setCategory();
	}
	return $this->category;
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

	public function getCategoryOptions()
	{
		if(!$this->categoryOptions) {
			$query = "SELECT `id`,`categoryName` FROM `{$this->getCategory()->getTableName()}`";
			$this->categoryOptions = $this->getCategory()->getAdapter()->fetchPairs($query);

			$this->categoryOptions = ["" => "Root Category"] + $this->categoryOptions;
		}

		return $this->categoryOptions ;

	}

}
?>