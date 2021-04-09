<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Data extends \Controller\Core\Admin
{
    public function testAction()
    {
        $query = "SELECT * FROM `product`
        WHERE `id` = '165'
        ORDER BY `id` DESC";
        $product = \Mage::getModel('Model\Product')->fetchRow($query);
        $product->id = 'new';
        $product->name = 'new name';

        echo '<pre>';
        print_r($product);
        die();
    }
}
