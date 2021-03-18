<?php 

Mage::loadFileByClassName("Controller_Core_Admin");

class Controller_Product_Group_Price extends Controller_Core_Admin
{
	public function indexAction()
	{
		try{
			$productId = (int)$this->getRequest()->getGet('id');
			$product = Mage::getModel("Model_Product")->load($productId);
			if(!$product){
				throw new Exception("No Record Found", 1);
			}
			$layout = $this->getLayout();
			$grid = Mage::getBlock("Block_Product_Edit_Tabs_GroupPrice")->setProduct($product);
			$content = $layout->getChild('content')->addChild($grid);
			$this->toHtmlLayout();			

		} catch(exception $e) {
				echo "string";			
		}
	}

	public function saveAction()
	{
			$groupData = $this->getRequest()->getPost('groupPrice');
			$productId = $this->getRequest()->getGet('id');
				echo "<pre>";
				print_r($groupData);
				die();
			foreach ($groupData['new'] as $groupId => $price) {
				$query = "SELECT * FROM `product_group_price`
				 WHERE `productId` = '{$productId}' AND `groupId` = '{$groupId}' ";
				$groupPrice = Mage::getModel("Model_Product_Group_Price");
				// $groupPrice->fetchRow($query);
				print_r($query);
				 
			}
	}
}

 ?>