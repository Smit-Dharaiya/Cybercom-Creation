<?php

namespace Block\Admin\PaymentMethod;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
	public function prepareCollection()
	{
		$paymentMethod = \Mage::getModel("Model\PaymentMethod");
		if ($this->getFilterObject()->getFilters($this->getTableName())) {
			$collection = $paymentMethod->fetchAll($this->buildFilterQuery($paymentMethod->getTableName()));
		} else {
			$collection = $paymentMethod->fetchAll();
		}

		$this->setCollection($collection);
		$this->getStatus();
		return $this;
	}

	public function prepareColumns()
	{
		$tableName = $this->getTableName();

		$this->addColumns('id', [
			'field' => 'id',
			'label' => 'Id',
			'type' => 'number',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'id'),

		]);
		$this->addColumns('name', [
			'field' => 'name',
			'label' => 'Payment Name',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'name'),

		]);
		$this->addColumns('code', [
			'field' => 'code',
			'label' => 'Payment Code',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'code'),

		]);
		$this->addColumns('description', [
			'field' => 'description',
			'label' => 'Payment Description',
			'type' => 'number',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'description'),

		]);
		$this->addColumns('status', [
			'field' => 'status',
			'label' => 'Payment Status',
			'type' => 'boolian',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'status'),

		]);
		$this->addColumns('createdDate', [
			'field' => 'createdDate',
			'label' => 'Created Date',
			'type' => 'date',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'createdDate'),

		]);
		return $this;
	}

	public function getTitle()
	{
		$this->getTitle = 'Manage Payment Methods';
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
		if ($this->getFilterObject()->getFilters($this->getTableName()) != NULL) {
			$this->addButtons('cleraFilter', [
				'label' => '<i class = "fas fa-times-circle"> Clear Filter</i>',
				'method' => 'getClearFilterAction',
				'ajax' => false,
			]);
			return $this;
		}
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

	public function getTableName()
	{
		return \Mage::getModel("Model\PaymentMethod")->getTableName();
	}
}
