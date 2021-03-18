<?php

namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName("Block\Core\Edit");

class Form extends \Block\Core\Edit
{
	protected $categoryOptions = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/Admin/Category/Edit/Tabs/form.php");
	}

	public function getButton()
	{
		if ($this->getTableRow()->id) {
			echo 'Update';
		} else {
			echo 'Add';
		}
	}

	public function getCategoryOptions()
	{
		if (!$this->categoryOptions) {
			$query = "SELECT `id`,`categoryName` FROM `{$this->getTableRow()->getTableName()}`";
			$this->categoryOptions = $this->getTableRow()->getAdapter()->fetchPairs($query);

			$this->categoryOptions = ["" => "Root Category"] + $this->categoryOptions;
		}

		return $this->categoryOptions;
	}
}
