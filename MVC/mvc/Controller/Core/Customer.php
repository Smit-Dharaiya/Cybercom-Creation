<?php

namespace Controller\Core;

\Mage::loadFileByClassName('Controller\Core\Abstracts');
\Mage::loadFileByClassName('Block\Customer\Layout');

class Customer extends Abstracts
{
    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if (!$layout) {
            $layout = \Mage::getBlock('Block\Customer\Layout');
        }
        if (!$layout instanceof \Block\Customer\Layout) {
            throw new \Exception('Must Be Instance Of Block\Customer\Layout', 1);
        }
        if (!$layout) {
            $layout = \Mage::getBlock("Block\Customer\Layout");
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
