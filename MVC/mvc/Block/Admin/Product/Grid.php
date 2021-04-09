<?php

namespace Block\Admin\Product;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
	public function prepareCollection()
	{
		$product = \Mage::getModel("Model\Product");
		if ($this->getFilterObject()->getFilters($this->getTableName())) {
			$collection = $product->fetchAll($this->buildFilterQuery($product->getTableName()));
		} else {
			$collection = $product->fetchAll();
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
		$this->addColumns('SKU', [
			'field' => 'SKU',
			'label' => 'SKU',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'SKU'),
		]);
		$this->addColumns('name', [
			'field' => 'name',
			'label' => 'Name',
			'type' => 'text',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'name'),
		]);
		$this->addColumns('price', [
			'field' => 'price',
			'label' => 'Price',
			'type' => 'number',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'price'),
		]);
		$this->addColumns('discount', [
			'field' => 'discount',
			'label' => 'Discount',
			'type' => 'number',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'discount'),
		]);
		$this->addColumns('quantity', [
			'field' => 'quantity',
			'label' => 'Quantity',
			'type' => 'number',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'quantity'),
		]);
		$this->addColumns('description', [
			'field' => 'description',
			'label' => 'Description',
			'type' => 'number',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'description'),
		]);
		$this->addColumns('status', [
			'field' => 'status',
			'label' => 'Status',
			'type' => 'boolian',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'status'),
		]);
		$this->addColumns('createdAt', [
			'field' => 'createdAt',
			'label' => 'Created Date',
			'type' => 'date',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'createdAt'),
		]);
		$this->addColumns('updatedAt', [
			'field' => 'updatedAt',
			'label' => 'Updated Date',
			'type' => 'date',
			'filter' => $this->getFilterObject()->getFilters($tableName, 'updatedAt'),
		]);

		return $this;
	}

	public function getTitle()
	{
		$this->getTitle = 'Manage Products';
		return $this->getTitle;
	}

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
		$this->addActions('addToCart', [
			'label' => "<i class='fas fa-cart-plus'></i>",
			'method' => 'getAddToCartUrl',
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

	public function getAddToCartUrl($row)
	{
		return $this->getUrlObject()->getUrl('addToCart', 'cart', ['id' => $row->id], true);
	}

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
		return \Mage::getModel('Model\Product')->getTableName();
	}
}
