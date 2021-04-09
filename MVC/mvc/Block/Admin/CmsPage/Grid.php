<?php

namespace Block\Admin\CmsPage;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
	public function prepareCollection()
	{
		$cmsPage = \Mage::getModel("Model\CmsPage");
		if ($this->getFilterObject()->getFilters($this->getTableName())) {
			$collection = $cmsPage->fetchAll($this->buildFilterQuery($cmsPage->getTableName()));
		} else {
			$collection = $cmsPage->fetchAll();
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
		$this->addColumns('title', [
			'field' => 'title',
			'label' => 'Title',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'title'),

		]);
		$this->addColumns('identifier', [
			'field' => 'identifier',
			'label' => 'Identifier',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'identifier'),

		]);
		$this->addColumns('content', [
			'field' => 'content',
			'label' => 'Content',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'content'),

		]);
		$this->addColumns('status', [
			'field' => 'status',
			'label' => 'Status',
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
		$this->getTitle = 'Manage CMS Page';
		return $this->getTitle;
	}

	// -----> Manage button actions ------

	public function prepareActions()
	{
		$this->addActions('edit', [
			'label' => "<i class='fas fa-pen' title='edit'></i>",
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
		return \Mage::getModel('Model\CmsPage')->getTableName();
	}
}
