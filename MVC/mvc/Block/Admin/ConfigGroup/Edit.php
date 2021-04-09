<?php

namespace Block\Admin\ConfigGroup;

\Mage::loadFileByClassName("Block\Core\Edit");

class Edit extends \Block\Core\Edit
{

    function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\ConfigGroup\Edit\Tabs'));
    }

    public function getTitle()
    {
        if ($this->getTableRow()->id) {
            echo 'Update Configuration Group Details';
        } else {
            echo 'Add Configuration Group Details';
        }
    }

    public function getFormUrl()
    {
        return $this->getUrl('save');
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
