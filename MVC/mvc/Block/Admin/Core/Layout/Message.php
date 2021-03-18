<?php 

namespace Block\Admin\Core\Layout;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Message extends \Block\Admin\Core\Template
{
	
	function __construct()
	{
		$this->setTemplate("./View/Admin/Core/Layout/message.php");
	}
}

 ?>