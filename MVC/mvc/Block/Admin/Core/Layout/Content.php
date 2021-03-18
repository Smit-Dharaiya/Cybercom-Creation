<?php 

namespace Block\Admin\Core\Layout

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Content extends \Block\Admin\Core\Template
{
	
	function __construct()
	{
		$this->setTemplate('./View/Admin/Core/Layout/content.php');
		
	}
}

 ?>