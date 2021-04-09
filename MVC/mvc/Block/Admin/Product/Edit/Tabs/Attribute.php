<?php

namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Attribute extends \Block\Core\Edit
{
    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/Edit/Tabs/attribute.php');
    }

    public function getAttributes()
    {
        $attributes = \Mage::getModel('Model\Attribute');
        $query = "SELECT * FROM `{$attributes->getTableName()}`
        WHERE `entityTypeId` = '{$this->getTableRow()->getTableName()}'";
        $attributes = $attributes->fetchAll($query);
        return $attributes;
    }

    public function getoptions($id)
    {
        $options = \Mage::getModel('Model\Attribute\Option');
        $query = "SELECT * FROM `{$options->getTableName()}`
        WHERE `attributeId` = '$id'";
        $options = $options->fetchAll($query);
        return $options;
    }


    public function getButton()
    {
        if ($this->getTableRow()->id) {
            echo 'Update';
        } else {
            echo 'Add';
        }
    }
}
