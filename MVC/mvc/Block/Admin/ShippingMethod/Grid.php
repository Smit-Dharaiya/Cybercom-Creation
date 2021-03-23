<?php

namespace Block\Admin\ShippingMethod;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
	public function prepareCollection()
	{
		$shippingMethod = \Mage::getModel("Model\ShippingMethod");
		$collection = $shippingMethod->fetchAll();

		$this->setCollection($collection);
		$this->getStatus();
		return $this;
	}

	public function prepareColumns()
	{
		$this->addColumns('id', [
			'field' => 'id',
			'label' => 'Id',
			'type' => 'number',

		]);
		$this->addColumns('name', [
			'field' => 'name',
			'label' => 'Shipping Name',
			'type' => 'text',

		]);
		$this->addColumns('code', [
			'field' => 'code',
			'label' => 'Shipping Code',
			'type' => 'text',

		]);
		$this->addColumns('amount', [
			'field' => 'amount',
			'label' => 'Shipping Amount',
			'type' => 'number',

		]);
		$this->addColumns('description', [
			'field' => 'description',
			'label' => 'Payment Description',
			'type' => 'number',

		]);
		$this->addColumns('status', [
			'field' => 'status',
			'label' => 'Shipping Status',
			'type' => 'boolian',

		]);
		$this->addColumns('createdDate', [
			'field' => 'createdDate',
			'label' => 'Created Date',
			'type' => 'date',

		]);
		return $this;
	}

	public function getTitle()
	{
		$this->getTitle = 'Manage Shipping Methods';
		return $this->getTitle;
	}

	// -----> Manage button actions ------

	public function prepareActions()
	{
		$this->addActions('edit', [
			'label' => "<i class='fas fa-pen'></i>",
			'method' => 'getEditUrl',
			'ajax' => false
		]);
		$this->addActions('delete', [
			'label' => '<i class="fas fa-trash-alt"></i>',
			'method' => 'getDeleteUrl',
			'ajax' => false
		]);
		return $this;
	}

	public function getEditUrl($row)
	{
		return $this->getUrlObject()->getUrl('form', null, ['id' => $row->id], true);
	}

	public function getDeleteUrl($row)
	{
		return $this->getUrlObject()->getUrl('delete', null, ['id' => $row->id], true);
	}

	// -----> Manage buttons ------

	public function prepareButtons()
	{
		$this->addButtons('addnew', [
			'label' => '<i class="fas fa-plus"></i> Add New',
			'method' => 'AddNewUrl',
			'ajax' => false,
		]);
		$this->addButtons('applyFilter', [
			'label' => '<i class="fas fa-filter"></i> Apply Filter',
			'method' => 'getFilterAction',
			'ajax' => false,
		]);
		return $this;
	}

	public function getStatus()
	{
		$collection = $this->getCollection();
		if (!$collection) {
			return \false;
		}
		foreach ($collection->getData() as &$row) {
			if ($row->status) {
				$row->status = 'Enable';
			} else {
				$row->status = 'Disable';
			}
		}
		return;
	}
}
