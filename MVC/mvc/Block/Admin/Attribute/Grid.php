<?php 


class Block_Attribute_Grid extends Block_Core_Template
{
	protected $attributes = [];

	public function __construct()
	{
    $this->setTemplate('./View/Attribute/grid.php');
	}
	
	public function setAttributes($attributes = NULL)
	{
		if(!$attributes){
			$attribute = Mage::getModel("Model_Attribute");
            $attributes = $attribute->fetchAll()->getData();
		}
		$this->attributes=$attributes;
		return $this;
	}

	public function getAttributes()
	{
	if(!$this->attributes){
		$this->setAttributes();
	}
	return $this->attributes;
    }

    public function getTitle()
	{
		$this->getTitle = 'Manage Attributes';
		return $this->getTitle;
	}

}
 ?>