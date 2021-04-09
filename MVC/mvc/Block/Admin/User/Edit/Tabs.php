<?php

namespace Block\Admin\User\Edit;

\Mage::loadFileByClassName("Block\Core\Edit\Tabs");

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTabs('form', ['label' => 'Users', 'block' => 'Block\Admin\User\Edit\Tabs\Form']);
        $this->setDefaultTab('form');
        return $this;
    }
}
