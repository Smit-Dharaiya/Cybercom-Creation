<?php

namespace Block\Admin\ConfigGroup;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
    public function prepareCollection()
    {
        $configuration = \Mage::getModel("Model\ConfigGroup");
        if ($this->getFilterObject()->getFilters($this->getTableName())) {
            $collection = $configuration->fetchAll($this->buildFilterQuery($configuration->getTableName()));
        } else {
            $collection = $configuration->fetchAll();
        }

        $this->setCollection($collection);
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
            'label' => 'Name',
            'type' => 'text',
            'filter' => $this->getFilterObject()->getFilters($tableName, 'name'),

        ]);
        $this->addColumns('createdDate', [
            'field' => 'createdDate',
            'label' => 'Created Date',
            'type' => 'text',
            'filter' => $this->getFilterObject()->getFilters($tableName, 'createdDate'),

        ]);
        return $this;
    }

    public function getTitle()
    {
        $this->getTitle = 'Manage Configuration Group';
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

    public function getTableName()
    {
        return \Mage::getModel('Model\Attribute')->getTableName();
    }
}
