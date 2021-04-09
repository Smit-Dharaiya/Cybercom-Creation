<?php

namespace Block\Admin\ConfigGroup\Edit\Tabs;

\Mage::loadFileByClassName("Block\Core\Edit");

class Information extends \Block\Core\Edit
{

    function __construct()
    {
        parent::__construct();
        $this->setTemplate("./View/Admin/ConfigGroup/Edit/Tabs/information.php");
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
