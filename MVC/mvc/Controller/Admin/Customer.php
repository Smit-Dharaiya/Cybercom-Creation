<?php

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");

class Customer extends \Controller\Core\Admin
{

	public function gridAction()
	{

		$layout = $this->getLayout();

		$gridBlock = \Mage::getBlock("Block\Admin\Customer\Grid");
		$gridBlock->setController($this);

		$content = $layout->getChild('content');
		$content->addChild($gridBlock, 'grid');

		$this->toHtmlLayout();
	}

	public function formAction()
	{
		$layout = $this->getLayout();
		$content = $layout->getChild('content');
		$content->setController(new \Controller\Core\Admin());
		$id = $this->getRequest()->getGet('id');

		$edit = \Mage::getBlock("Block\Admin\Customer\Edit");
		$edit->setController($this);
		$customer = \Mage::getModel("Model\Customer");

		if ($id) {
			$customer = $customer->load($id);
			if (!$customer) {
				throw new \Exception("no record");
			}
		}
		$edit->setTableRow($customer);
		$content->addChild($edit, 'edit');

		$left = $layout->getChild('left');
		$left->setController(new \Controller\Core\Admin());
		$tabs = \Mage::getBlock("Block\Admin\Customer\Edit\Tabs");
		$tabs->setController($this);
		$left->addChild($tabs, 'tabs');
		$this->toHtmlLayout();
	}

	public function saveAction()
	{

		try {
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid Request.");
			}
			date_default_timezone_set("Asia/Calcutta");
			$customerId = $this->getRequest()->getGet('id');
			$customerModel = \Mage::getModel("Model\Customer");
			$customerModel->load($customerId);

			if ($customerId) {
				if (!$customerModel->getData()) {
					throw new \Exception("No record found.");
				}
				$customerModel->updatedDate = date("Y-m-d H:i:s");
			} else {
				$customerModel->createdDate = date("Y-m-d H:i:s");
			}
			$customer = \Mage::getBlock('Block\Admin\Customer\Edit');

			$tab = $this->getRequest()->getGet('tab');
			if ($tab == 'address') {

				$addressBlock = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs\Address');

				$addressModel = \Mage::getModel("Model\CustomerAddress");

				if (!$customerId) {
					throw new \Exception("No record found.");
				}

				$address = $addressBlock->getBilling();
				$billingData = $this->getRequest()->getPost('billing');

				if (!$address->createdDate) {
					$address->createdDate = date("Y-m-d H:i:s");
				}

				$address->customerId = $customerId;
				$address->addressType = 'billing';
				$address->updatedDate = date("Y-m-d H:i:s");
				$address->setData($billingData);
				if (!$address->save()) {
					throw new \Exception("Error Processing Billing Address.");
				} else {
					$this->getMessage()->setSuccess('Address Stored Successfully !!');
				}

				$address->unsetData();

				$address = $addressBlock->getShipping();
				$shippingData = $this->getRequest()->getPost('shipping');

				if (!$address->createdDate) {
					$address->createdDate = date("Y-m-d H:i:s");
				}

				$address->customerId = $customerId;
				$address->addressType = 'shipping';
				$address->updatedDate = date("Y-m-d H:i:s");
				$address->setData($shippingData);
				if (!$address->save()) {
					throw new \Exception("Error Processing Shipping Address.");
				} else {
					$this->getMessage()->setSuccess('Address Stored Successfully !!');
				}
			} else {
				$customerData = $this->getRequest()->getPost('customer');
				$customerModel->setData($customerData);
				if (!$customerModel->save()) {
					throw new \Exception("Error Processing Data.");
				} else {
					$this->getMessage()->setSuccess('Data Stored Successfully !!');
				}
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$this->redirect('grid', null, null, true);
	}

	public function deleteAction()
	{
		try {
			$id = (int) $this->getRequest()->getGet('id');
			if (!$id) {
				throw new \Exception("Id Required.");
			}
			$customer = \Mage::getModel("Model\Customer");
			$customerData = $this->getRequest()->getPost('customer');
			$customer->load($id);
			if ($customer->delete($id)) {
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
