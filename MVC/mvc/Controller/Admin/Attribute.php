<?php

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");

class Attribute extends \Controller\Core\Admin
{
	public function gridAction()
	{
		$grid = \Mage::getBlock('Block\Admin\Attribute\Grid');
		$layout = $this->getLayout();
		$layout->getContent()->addChild($grid);
		echo $layout->toHtml();
	}

	public function formAction()
	{
		$layout = $this->getLayout();
		$content = $layout->getChild('content');
		$id = $this->getRequest()->getGet('id');

		$edit = \Mage::getBlock("Block\Admin\Attribute\Edit");
		$edit->setController($this);
		$attribute = \Mage::getModel("Model\Attribute");

		if ($id) {
			$attribute = $attribute->load($id);
			if (!$attribute) {
				throw new \Exception("No record");
			}
		}
		$edit->setTableRow($attribute);
		$content->addChild($edit, 'edit');

		$left = $layout->getChild('left');
		$left->setController(new \Controller\Core\Admin());
		$tabs = \Mage::getBlock("Block\Admin\Attribute\Edit\Tabs");
		$tabs->setController($this);
		$left->addChild($tabs, 'tabs');
		echo $layout->toHtml();
	}

	public function saveAction()
	{
		if ($this->getRequest()->getGet('tab') != 'option') {
			try {
				if (!$this->getRequest()->isPost()) {
					throw new \Exception("invalid Request");
				}
				$attribute = \Mage::getModel("Model\Attribute");
				if ((int) $id = $this->getRequest()->getGet("id")) {
					$attribute = $attribute->load($id);
					if (!$attribute) {
						throw new \Exception("No record.");
					}
				}
				$attributeData = $this->getRequest()->getPost('attribute');
				$attribute->setData($attributeData);
				$attribute->save();
				$this->redirect('grid');
			} catch (\Exception $e) {
				echo $e->getMessage();
				die();
			}
		} else {
			$this->updateOptions();
		}
	}

	public function optionAction()
	{
		try {
			$option = \Mage::getBlock("Block\Admin\Attribute\Edit\Tabs");
			$option->setController($this);
			$layout = $this->getLayout();
			$layout->getChild('content')->addChild($option);
			echo $layout->toHtml();
		} catch (\Exception $e) {
			echo $e->getMessage();
			die();
		}
	}

	public function updateOptions()
	{
		$optionData = $this->getRequest()->getPost('option');
		try {
			if (!$optionData) {
				throw new \Exception("invalid Request");
			}
			foreach ($optionData['exist'] as $optionId => $optionValues) {
				$option = \Mage::getModel('Model\Attribute\Option');
				$option->setData($optionValues);
				$option->save();
			}
			foreach ($optionData['new'] as $optionId => $optionValues) {
				$option = \Mage::getModel('Model\Attribute\Option');
				$option->setData($optionValues);
				$option->save();
			}

			$this->redirect('grid');
		} catch (\Exception $e) {
			echo $e->getMessage();
			die();
		}
	}

	public function deleteAction()
	{
		try {
			$id = (int) $this->getRequest()->getGet('id');
			if (!$id) {
				throw new \Exception("Id Required.");
			}
			$attribute = \Mage::getModel("Model\Attribute");
			$attribute->load($id);
			if ($attribute->delete($id)) {
				$this->getMessage()->setSuccess("Record Deleted Successfully");
			} else {
				$this->getMessage()->setSuccess("Unable to Delete Record");
			}
		} catch (\Exception $e) {
			echo $this->getMessage()->setFailure($e->getMessage());
		}
		$this->redirect('grid');
	}

	public function deleteOptionAction()
	{
		try {
			$id = (int) $this->getRequest()->getGet('id');
			if (!$id) {
				throw new \Exception("Id Required.");
			}
			$option = \Mage::getModel("Model\Attribute\Option");
			$option->load($id);
			if ($option->delete($id)) {
				$this->getMessage()->setSuccess("Record Deleted Successfully");
			} else {
				$this->getMessage()->setSuccess("Unable to Delete Record");
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$this->redirect('form', null, ['id' => $option->attributeId], true);
	}
}
