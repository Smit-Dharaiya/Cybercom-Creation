<?php

namespace Block\Admin\Attribute\Edit\Tabs;

\Mage::loadFileByClassName("Block\Core\Edit");

class Form extends \Block\Core\Edit
{
	protected $attribute = null;

	function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/Admin/Attribute/Edit/Tabs/form.php");
	}

	public function getButton()
	{
		if ($this->getTableRow()->id) {
			echo 'Update';
		} else {
			echo 'Add';
		}
	}

	public function getBackendTypeOptions()
	{
		return [
			'varchar(255)' => 'Varchar',
			'int' => 'Int',
			'decimal' => 'Decimal',
			'text' => 'Text',
		];
	}

	public function getInputTypeOptions()
	{
		return [
			'text' => 'Text Box',
			'textarea' => 'Text Area',
			'select' => 'Select',
			'checkbox' => 'Checkbox',
			'radio' => 'Radio',
		];
	}

	public function getEntityTypeOptions()
	{
		return [
			'product' => 'Product',
			'category' => 'Category',
		];
	}
}
