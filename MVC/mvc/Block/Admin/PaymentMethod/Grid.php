<?php

namespace Block\Admin\PaymentMethod;

\Mage::loadFileByClassName("Block\Core\Template");

class Grid extends \Block\Core\Template
{
	protected $paymentMethods = [];

	public function __construct()
	{
		$this->setTemplate('./View/Admin/PaymentMethod/grid.php');
	}

	public function setPaymentMethods($paymentMethods = NULL)
	{
		if (!$paymentMethods) {
			$paymentMethod = \Mage::getModel("Model\PaymentMethod");
			$paymentMethods = $paymentMethod->fetchAll();
		}
		$this->paymentMethods = $paymentMethods;
		return $this;
	}

	public function getPaymentMethods()
	{
		if (!$this->paymentMethods) {
			$this->setPaymentMethods();
		}
		return $this->paymentMethods;
	}

	public function getTitle()
	{
		$this->getTitle = 'Manage Payment Methods';
		return $this->getTitle;
	}
}
