<?php 

namespace Controller\Admin\Core;

\Mage::loadFileByClassName("Model\Core\Request");
\Mage::loadFileByClassName("Model\Core\Message");
\Mage::loadFileByClassName("Block\Admin\Core\Layout");

class Admin {

    protected $request = Null;
    protected $layout = null;
    protected $message = null;

    public function __construct()
    {
        $this->setRequest();
        $this->setLayout();
    }

    public function setLayout(\Block\Admin\Core\Layout $layout = null)
    {
        if(!$layout){
            $layout = \Mage::getBlock("Block\Admin\Core\Layout");
        }
        $this->layout = $layout;
        return $this;
    }

    public function getLayout()
    {
        if(!$this->layout){
            $this->setLayout();
        }
        return $this->layout;
    }

    public function toHtmlLayout()
    {
        $this->getLayout()->toHtml();
    }

    public function setRequest()
    {
        $this->request =\Mage::getModel("Model\Core\Request");
        return $this;
    }

    public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest();
        }
        return $this->request;
    }
	
    public function redirect($actionName = NULL, $controllerName = NULL, $params = NULL, $resetParams = false)
    {
        header("location:" . $this->getUrl($actionName, $controllerName, $params, $resetParams));
        exit(0);
    }

    public function getUrl($actionName = NULL, $controllerName = NULL, $params = NULL, $resetParams = false)
    {
        $final = $this->getRequest()->getGet();
        if (!$resetParams) {
            $final = [];
        }
        if ($actionName == NULL) {
            $actionName = $this->getRequest()->getGet('a');
        }
        if ($controllerName == NULL) {
            $controllerName = $this->getRequest()->getGet('c');;
        }
        $final['c'] = $controllerName;
        $final['a'] = $actionName;
        if (is_array($params)) {
            $final = array_merge($final, $params);
        }
        $queryString = http_build_query($final);
        return "http://localhost:7882/training/mvc/?{$queryString}";
    }

    public function setMessage(\Model_Admin_Message $message = null)
    {
        if (!$message) 
        {
            $message = \Mage::getModel('Model\Admin\Message');
        }
        $this->message = $message;
        return $this;
    }

    public function getMessage()
    {
        if (!$this->message) 
        {
            $this->setMessage();
        }
        return $this->message;
    }

}

 ?>