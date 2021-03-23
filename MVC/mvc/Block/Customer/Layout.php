<?php

namespace Block\Customer;

\Mage::loadFileByClassName('Block\Core\Layout');

class Layout extends \Block\Core\Layout
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('View/Customer/layout/oneColumn.php');
    }

    public function prepareChildren()
    {
        $this->addChild(\Mage::getBlock("Block\Customer\Layout\Header"), 'header');
        $this->addChild(\Mage::getBlock("Block\Customer\Layout\Content"), 'content');
        $this->addChild(\Mage::getBlock("Block\Customer\Layout\Footer"), 'footer');
        $this->addChild(\Mage::getBlock("Block\Customer\Layout\Message"), 'message');
        $this->addChild(\Mage::getBlock("Block\Customer\Layout\Left"), 'left');
    }
}
