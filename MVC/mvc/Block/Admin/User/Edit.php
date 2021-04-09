<?php

namespace Block\Admin\User;

\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{

    function __construct()
    {
        parent::__construct();
        $this->setTabClass(\Mage::getBlock('Block\Admin\User\Edit\Tabs'));
    }

    public function getTitle()
    {
        if ($this->getTableRow()->id) {
            echo 'Update User';
        } else {
            echo 'Add User';
        }
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
