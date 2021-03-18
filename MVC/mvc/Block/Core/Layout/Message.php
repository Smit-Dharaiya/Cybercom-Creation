<?php

namespace Block\Core\Layout;

\Mage::loadFileByClassName("Block\Core\Template");

class Message extends \Block\Core\Template
{

	function __construct()
	{
		$this->setTemplate("./View/Core/Layout/message.php");
	}
}
