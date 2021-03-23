<?php

namespace Block\Admin\Category;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
	protected $categoriesOptions = [];

	public function prepareCollection()
	{
		$category = \Mage::getModel("Model\Category");
		if ($this->getFilterObject()->getFilters($this->getTableName())) {
			$collection = $category->fetchAll($this->buildFilterQuery($this->getTableName()));
		} else {
			$collection = $category->fetchAll();
		}

		$this->setCollection($collection);

		$this->getStatus();
		$this->getName();
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
		$this->addColumns('categoryName', [
			'field' => 'categoryName',
			'label' => 'Category Name',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'categoryName'),

		]);
		$this->addColumns('description', [
			'field' => 'description',
			'label' => 'Description',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'description'),


		]);
		$this->addColumns('parentId', [
			'field' => 'parentId',
			'label' => 'Parent ID',
			'type' => 'number',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'parentId'),


		]);
		$this->addColumns('path', [
			'field' => 'path',
			'label' => 'Path',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'path'),


		]);
		$this->addColumns('categoryStatus', [
			'field' => 'categoryStatus',
			'label' => 'Status',
			'type' => 'boolian',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'categoryStatus'),


		]);
		return $this;
	}

	public function getTitle()
	{
		$this->getTitle = 'Manage Customers';
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
				'label' => '<i class="fas fa-times-circle"></i> Clear Filters',
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

	public function getFeatured()
	{
		$collection = $this->getCollection();
		if (!$collection) {
			return \false;
		}
		foreach ($collection->getData() as &$row) {
			if ($row->featured) {
				$row->featured = 'Yes';
			} else {
				$row->featured = 'No';
			}
		}
		return;
	}


	public function getName()
	{
		$category = $this->getCollection();
		if (!$category) {
			return \false;
		}
		foreach ($category->getData() as &$row) {
			$categoryModel = \Mage::getModel("Model\Category");
			if (!$this->categoriesOptions) {
				$query = "SELECT `id`,`categoryName` FROM `{$categoryModel->getTableName()}`";
				$this->categoriesOptions = $categoryModel->getAdapter()->fetchPairs($query);
			}

			$paths = explode("=", $row->path);
			foreach ($paths as $key => &$id) {
				if (array_key_exists($id, $this->categoriesOptions)) {
					$id = $this->categoriesOptions[$id];
				}
			}
			$name = implode("/", $paths);
			$row->categoryName = $name;
		}
		return;
	}

	public function getTableName()
	{
		return \Mage::getModel('Model\Category')->getTableName();
	}
}
