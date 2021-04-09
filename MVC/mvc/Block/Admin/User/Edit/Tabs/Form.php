<?php

namespace Block\Admin\User\Edit\Tabs;

\Mage::loadFileByClassName("Block\Core\Edit");

class Form extends \Block\Core\Edit
{
    function __construct()
    {
        parent::__construct();
        $this->setTemplate("./View/Admin/User/Edit/Tabs/form.php");
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
