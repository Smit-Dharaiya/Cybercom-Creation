<?php

namespace Model\ConfigGroup;

\Mage::loadFileByClassName("Model\Core\Table");

class Config extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setTableName("config");
        $this->setPrimaryKey("id");
    }
}
