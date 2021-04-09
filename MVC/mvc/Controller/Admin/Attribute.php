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

			if ($attribute->save() && !$id) {
				$attributeName = strtolower($attribute->name);
				$name = 'Model\\' . $attribute->entityTypeId;
				$model = \Mage::getModel($name);
				$query = "ALTER TABLE `{$model->getTableName()}`
				ADD `{$attributeName}` {$attribute->backendType} NOT NULL";
				if (!$model->alterTable($query)) {
					throw new \Exception("Error Processing Request", 1);
				}
				$this->getMessage()->setSuccess("Alter Table Successfully");
				$this->redirect('grid');
			}
			$this->getMessage()->setSuccess("Data Updated Successfully");
			$this->redirect('grid');
		} catch (\Exception $e) {
			echo $e->getMessage();
			die();
		}
	}

	public function saveOptionAction()
	{
		try {
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("invalid Request");
			}
			$optionData = $this->getRequest()->getPost('option');
			$id = $this->getRequest()->getGet("id");
			foreach ($optionData['exist'] as $optionId => $optionValues) {
				$option = \Mage::getModel('Model\Attribute\Option')->load($optionId);
				$option->name = $optionValues['name'];
				$option->sortOrder = $optionValues['sortOrder'];
				$option->save();
			}
			$i = 0;
			foreach ($optionData['new'] as $optionId => $optionValues) {
				if (\array_key_exists($i, $optionData['new']['name'])) {
					$option = \Mage::getModel('Model\Attribute\Option');
					$option->name = $optionData['new']['name'][$i];
					$option->sortOrder = $optionData['new']['sortOrder'][$i];
					$option->attributeId = $id;
					$option->save();
					$i++;
				}
			}
			$this->redirect('form', null, null, true);
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
			$attribute = $attribute->load($id);
			if ($attribute->delete()) {
				$attributeName = strtolower($attribute->name);
				$name = 'Model\\' . $attribute->entityTypeId;
				$model = \Mage::getModel($name);
				$query = "ALTER TABLE `{$model->getTableName()}`
				DROP COLUMN `{$attributeName}` ";
				if (!$model->alterTable($query)) {
					throw new \Exception("Error Processing Request", 1);
				}
				$this->getMessage()->setSuccess("Record Deleted and Alter Table Successfully");
			} else {
				$this->getMessage()->setFailure("Unable to Delete Record");
			}
		} catch (\Exception $e) {
			echo $this->getMessage()->setFailure($e->getMessage());
			die;
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
