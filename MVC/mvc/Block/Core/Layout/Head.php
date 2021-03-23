<?php

namespace Block\Core\Layout;

\Mage::loadFileByClassName("Block\Core\Template");

class Head extends \Block\Core\Template
{

    function __construct()
    {
        $this->setTemplate("./View/Core/Layout/head.php");
    }
}
