<?php

namespace Controller;

\Mage::loadFileByClassName('Controller\Core\Customer');

class Home extends Core\Customer
{
    public function testAction()
    {
        $layout = $this->getLayout();
        $grid = \Mage::getBlock('Block\Home\Index');
        // $content = $this->getContent();
        $content = $layout->getChild('content');
        $content->addChild($grid, 'grid');
        // echo "<pre>";
        // print_r($content);
        // die;
        $this->toHtmlLayout();
        // echo $layout->toHtml();
    }
}
