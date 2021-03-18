<?php 

namespace Block\Admin\Core;

\Mage::loadFileByClassName("Controller\Admin\Core\Admin");
\Mage::loadFileByClassName("Block\Admin\Core\Template");


class Layout extends Template
{
	public function __construct()
		{
			parent::__construct(); 
			$this->setTemplate('./View/Admin/Core/Layout/threeColumn.php');
			$this->prepareChildren();
		}

	public function prepareChildren()
	{
		$this->addChild(\Mage::getBlock("Block\Admin\Core\Layout\Header"),'header');
		$this->addChild(\Mage::getBlock("Block\Admin\Core\Layout\Content"),'content');
		$this->addChild(\Mage::getBlock("Block\Admin\Core\Layout\Footer"),'footer');
		$this->addChild(\Mage::getBlock("Block\Admin\Core\Layout\Message"),'message');
		$this->addChild(\Mage::getBlock("Block\Admin\Core\Layout\Left"),'left');

	}	

	public function getContent()
	{
		return $this->getChild('content');
	}

	public function getHeader()
	{
		return $this->getChild('header');
	}

	public function getLeft()
	{
		return $this->getChild('left');
	}

}

?>