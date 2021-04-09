<?php

namespace Block\Admin\ConfigGroup\Edit\Tabs;

\Mage::loadFileByClassName("Block\Core\Edit");

class Configuration extends \Block\Core\Edit
{

    function __construct()
    {
        parent::__construct();
        $this->setTemplate("./View/Admin/ConfigGroup/Edit/Tabs/configuration.php");
    }

    public function getButton()
    {
        if ($this->getTableRow()->id) {
            echo 'Update';
        } else {
            echo 'Add';
        }
    }

    public function getConfigurations()
    {
        $id = $this->getRequest()->getGet('id');
        $config = \Mage::getModel('Model\ConfigGroup\Config');
        if (!$id) {
            return false;
        }
        $query = "SELECT * FROM `{$config->getTableName()}`
        WHERE `groupId` = {$id}";
        $config = $config->fetchAll($query);
        return $config;
    }
}
