<?php

namespace Block\Core\Layout;

\Mage::loadFileByClassName("Block\Core\Template");

class Content extends \Block\Core\Template
{

	function __construct()
	{
		$this->setTemplate('./View/Core/Layout/content.php');
	}
}
