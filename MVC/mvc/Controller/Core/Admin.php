<?php

namespace Controller\Core;

\Mage::loadFileByClassName('Controller\Core\Abstracts');

class Admin extends Abstracts
{
    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if (!$layout) {
            $layout = \Mage::getBlock("Block\Admin\Layout");
        }
        $this->layout = $layout;
        return $this;
    }

    public function setMessage(\Model\Admin\Message $message = null)
    {
        if (!$message) {
            $message = \Mage::getModel('Model\Admin\Message');
        }
        $this->message = $message;
        return $this;
    }
}
