<?php 

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Admin\Core\Admin");

class Attribute extends Core_Admin
{
	public function gridAction()
	{
		$layout = $this->getLayout();
		$grid=\Mage::getBlock("Block\Admin\Attribute\Grid");
		$layout->getContent()->addChild($grid);
		$this->toHtmlLayout();
	}


}

 ?>