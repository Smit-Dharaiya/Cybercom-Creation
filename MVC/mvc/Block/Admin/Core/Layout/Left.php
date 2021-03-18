<?php 

namespace Block\Admin\Core\Layout;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Left extends \Block_Admin_Core_Template
{
	
	function __construct()
	{
		$this->setTemplate("./View/Admin/Core/Layout/left.php");
	}
}

 ?>