<?php

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");

class CmsPage extends \Controller\Core\Admin
{

	public function gridAction()
	{

		$layout = $this->getLayout();

		$gridBlock = \Mage::getBlock("Block\Admin\CmsPage\Grid");
		$gridBlock->setController($this);

		$content = $layout->getChild('content');
		$content->addChild($gridBlock, 'grid');

		$this->toHtmlLayout();
	}

	public function formAction()
	{
		$layout = $this->getLayout();
		$content = $layout->getChild('content');
		$id = $this->getRequest()->getGet('id');

		$edit = \Mage::getBlock("Block\Admin\CmsPage\Edit");
		$edit->setController($this);
		$cmsPage = \Mage::getModel("Model\CmsPage");

		if ($id) {
			$cmsPage = $cmsPage->load($id);
			if (!$cmsPage) {
				throw new \Exception("no record");
			}
		}
		$edit->setTableRow($cmsPage);
		$content->addChild($edit, 'edit');

		$left = $layout->getChild('left');
		$left->setController(new \Controller\Core\Admin());
		$tabs = \Mage::getBlock("Block\Admin\CmsPage\Edit\Tabs");
		$tabs->setController($this);
		$left->addChild($tabs, 'tabs');
		echo $layout->toHtml();
	}

	public function saveAction()
	{
		try {
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid Request.");
			}
			$cmsPage = \Mage::getModel("Model\CmsPage");
			if ($id = $this->getRequest()->getGet("id")) {
				$cmsPage = $cmsPage->load($id);
				if (!$cmsPage) {
					throw new \Exception("Record Not Found.");
				}
			}
			date_default_timezone_set("Asia/Calcutta");
			$cmsPage->createdDate = date("Y-m-d H:i:s");
			$cmsPageData = $this->getRequest()->getPost('cmsPage');
			$cmsPage->setData($cmsPageData);
			if ($cmsPage->save()) {
				$this->getMessage()->setSuccess("Record Added Successfully");
			} else {
				$this->getMessage()->setSuccess("Unable to Add Record");
			}
		} catch (\Exception $e) {
			echo $this->getMessage()->setFailure($e->getMessage());
			$this->redirect('grid');
		}
		$this->redirect('grid', null, null, false);
	}

	public function deleteAction()
	{
		try {
			$id = (int) $this->getRequest()->getGet('id');
			if (!$id) {
				throw new \Exception("Id Required.");
			}
			$cmsPage = \Mage::getModel("Model\CmsPage");
			$cmsPageData = $this->getRequest()->getPost('cmsPage');
			$cmsPage->load($id);
			if ($cmsPage->delete($id)) {
				$this->getMessage()->setSuccess("Record Deleted Successfully");
			} else {
				$this->getMessage()->setSuccess("Unable to Delete Record");
			}
		} catch (\Exception $e) {
			echo $this->getMessage()->setFailure($e->getMessage());
		}
		$this->redirect('grid');
	}
}
