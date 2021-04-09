<?php

namespace Block\Admin\ConfigGroup\Edit;

\Mage::loadFileByClassName("Block\Core\Edit\Tabs");

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTabs('information', ['label' => 'Information', 'block' => 'Block\Admin\ConfigGroup\Edit\Tabs\Information']);
        if ($this->getRequest()->getGet('id')) :
            $this->addTabs('configuration', ['label' => 'Configuration', 'block' => 'Block\Admin\ConfigGroup\Edit\Tabs\Configuration']);
        endif;
        $this->setDefaultTab('information');
    }
}
