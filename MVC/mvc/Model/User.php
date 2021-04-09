<?php

namespace Model;

\Mage::loadFileByClassName("Model\Core\Table");

class User extends Core\Table
{
    public function __construct()
    {
        $this->setTableName("user");
        $this->setPrimaryKey("Id");
    }
}
