<?php

namespace Block\Customer\Layout;

\Mage::loadFileByClassName("Block\Core\Template");

class Header extends \Block\Core\Template
{

	function __construct()
	{
		$this->setTemplate("./View/Customer/Layout/header.php");
	}
}
