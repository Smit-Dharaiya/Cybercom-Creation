<?php

namespace Model;

\Mage::loadFileByClassName("Model\Core\Table");

class ConfigGroup extends Core\Table
{
    public function __construct()
    {
        $this->setTableName("config_group");
        $this->setPrimaryKey("id");
    }
}
