<?php

namespace Block\Core\Layout;

\Mage::loadFileByClassName("Block\Core\Template");

class Footer extends \Block\Core\Template
{

	function __construct()
	{
		$this->setTemplate("./View/Core/Layout/footer.php");
	}
}
