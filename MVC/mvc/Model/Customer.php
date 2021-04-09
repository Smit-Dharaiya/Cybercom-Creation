<?php

namespace Model;

\Mage::loadFileByClassName("Model\Core\Table");

class Customer extends Core\Table
{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function __construct()
    {
        $this->setTableName("customer");
        $this->setPrimaryKey("id");
    }

    public function getStatusOptions()
    {
        return [
            self::STATUS_DISABLED => "Disable",
            self::STATUS_ENABLED => "Enable"
        ];
    }

    public function getBillingAddress()
    {
        $billing = \Mage::getModel('Model\CustomerAddress');
        $query = "SELECT *
            FROM `customeraddress` 
            WHERE `customerId` = '{$this->id}'
                AND `addressType` = 'billing'";
        $billing = $billing->fetchRow($query);
        if ($billing) {
            return $billing;
        }
        return null;
    }

    public function getShippingAddress()
    {
        $shipping = \Mage::getModel('Model\CustomerAddress');
        $query = "SELECT *
            FROM `customeraddress` 
            WHERE `customerId` = '{$this->id}'
                AND `addressType` = 'shipping'";
        $shipping = $shipping->fetchRow($query);
        if ($shipping) {
            return $shipping;
        }
        return null;
    }
}
