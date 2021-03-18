<?php

namespace Model;

\Mage::loadFileByClassName("Model\Core\Table");

class CustomerGroup extends Core\Table{
 
 const STATUS_ENABLED = 1;
 const STATUS_DISABLED = 0;
 const WHOLESELLER = 1;
 const RETAILER = 0;


    public function __construct()
    {
        $this->setTableName("customergroup");
        $this->setPrimaryKey("id");
    }

    public function getStatusOptions()
     {
        return [
            self::STATUS_DISABLED => "Disable",
            self::STATUS_ENABLED => "Enable"
        ];
    }

    public function getNameOptions()
    {
        return [
            self::WHOLESELLER => "Wholseller",
            self::RETAILER => "Retailer"
        ];
    }

}
?>