<?php

namespace Block\Admin\Attribute;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
	public function prepareCollection()
	{
		$attribute = \Mage::getModel("Model\Attribute");
		if ($this->getFilterObject()->getFilters($this->getTableName())) {
			$collection = $attribute->fetchAll($this->buildFilterQuery($attribute->getTableName()));
		} else {
			$collection = $attribute->fetchAll();
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
		$this->addColumns('entityTypeId', [
			'field' => 'entityTypeId',
			'label' => 'Entity Type Id',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'entityTypeId'),

		]);
		$this->addColumns('name', [
			'field' => 'name',
			'label' => 'Name',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'name'),

		]);
		$this->addColumns('code', [
			'field' => 'code',
			'label' => 'Code',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'code'),

		]);
		$this->addColumns('inputType', [
			'field' => 'inputType',
			'label' => 'Input Type',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'inputType'),

		]);
		$this->addColumns('backendType', [
			'field' => 'backendType',
			'label' => 'Backend Type',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'id'),

		]);
		$this->addColumns('sortOrder', [
			'field' => 'sortOrder',
			'label' => 'Sort Order',
			'type' => 'number',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'sortOrder'),

		]);
		$this->addColumns('backendModel', [
			'field' => 'backendModel',
			'label' => 'Backend Model',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'backendModel'),

		]);
		return $this;
	}

	public function getTitle()
	{
		$this->getTitle = 'Manage Attribute';
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
		if ($this->getFilterObject()->getFilters($this->getTableName()) != null) {
			$this->addButtons('clearFilter', [
				'label' => '<i class="fas fa-times-circle"> Clear Filters</i>',
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
		return \Mage::getModel('Model\Attribute')->getTableName();
	}
}
