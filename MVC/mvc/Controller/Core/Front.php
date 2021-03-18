<?php 

namespace Controller\Core;

class Front{

    public function init()
    {
    	$controllerName = $_GET['c'];
    	$controllerName="Controller\Admin\\".ucfirst($_GET['c']);
    	$actionName = $_GET['a'];
    	$className = "Controller\Admin\\".$_GET['c'];
    	$methodName = $_GET['a']."Action";
		\Mage::loadFileByClassName($className);
		$controller = \Mage::getController($controllerName);
    	$controller->$methodName();
    }
}
