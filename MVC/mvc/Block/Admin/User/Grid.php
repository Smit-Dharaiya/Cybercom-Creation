<?php

namespace Block\Admin\User;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{

    public function prepareCollection()
    {
        $user = \Mage::getModel("Model\User");
        if ($this->getFilterObject()->getFilters($this->getTableName())) {
            $collection = $user->fetchAll($this->buildFilterQuery($user->getTableName()));
        } else {
            $collection = $user->fetchAll();
        }
        $this->setCollection($collection);

        return $this;
    }

    public function prepareColumns()
    {
        $tableName = $this->getTableName();

        $this->addColumns('id', [
            'field' => 'Id',
            'label' => 'Id',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters($tableName, 'id'),
        ]);
        $this->addColumns('name', [
            'field' => 'name',
            'label' => 'name Name',
            'type' => 'text',
            'filter' => $this->getFilterObject()->getFilters($tableName, 'name'),

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
        return $this->getUrlObject()->getUrl('delete', null, ['id' => $row->Id], true);
    }

    // -----> Manage buttons ------

    public function prepareButtons()
    {
        $this->addButtons('addnew', [
            'label' => '<i class="fas fa-plus"></i> Add New',
            'method' => 'AddNewUrl',
            'ajax' => false,
        ]);
        return $this;
    }

    public function getTableName()
    {
        return \Mage::getModel('Model\User')->getTableName();
    }
}
