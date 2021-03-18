<?php 

namespace Block\Admin\Core;

class Template
{
	
	protected $template = NULL;
	protected $controller = NULL;
	protected $children = [];
    protected $message = null;
	protected $request = NULL;
	protected $urlObject = null;

	public function __construct()
	{
    	$this->setRequest();
        $this->setUrlObject();
	}

    public function setRequest()
    {
        $this->request = \Mage::getModel("Model\Core\Request");
        return $this->request;
    } 

    public function getRequest()
    {
    	if(!$this->request){
    		$this->setRequest();
    	}
        return $this->request;
    }

	public function setTemplate($template)
	{
		$this->template = $template;
		return $this;
	}

	public function getTemplate()
	{
		return $this->template;
	}

	public function toHtml()
	{
		// ob_start();
		// require_once($this->getTemplate());
  //       $content = ob_get_contents();
  //       ob_end_clean();
		require_once($this->getTemplate());
	}

	public function setController(\Controller\Admin\Core\Admin $controller)
	{
		$this->controller = $controller;
    	return $this;
    } 

    public function getController()
	{
		return $this->controller;
    }

    public function setUrlObject($urlObject = null){
        $this->urlObject = \Mage::getBlock("Model\Core\Url");
        return $this->urlObject;
    }

    public function getUrlObject()
    {	
    	if($this->urlObject == null){
    		$this->setUrlObject();
    	}
        return $this->urlObject;
    }

    public function redirect($actionName = null, $controllerName = null, $params = null, $resetParams = false){
        $url = $this->getUrl($actionName, $controllerName, $params, $resetParams);
        header("location: {$url}");
        exit(0);
    }

    public function getUrl($actionName = NULL, $controllerName = NULL, $params = NULL, $resetParams = false)
    {
    	return $this->getController()->getUrl($actionName,$controllerName,$params,$resetParams);
    }

    public function setChildren(array $children = [])
	{
		$this->children = $children;
		return $this;
	}

	public function getChildren()
	{
		return $this->children;
	}

	public function addChild($child,$key = null)
	{
		if(!$key){
			$key = get_class($child);
		}
		$this->children[$key] = $child;
		return $this;
	}

	public function getChild($key)
	{
		if(!array_key_exists($key,$this->children) ){
			return null;
		}
		return $this->children[$key];
	}


	public function removeChild($key)
	{
		if(!array_key_exists($key,$this->children) ){
		   unset($this->children[$key]);
		}
		return $this;
	}

	public function createBlock($className)
	{
		return Mage::getBlock($className);
	}


	public function getMessage()
	{
		if (!$this->message) 
        {
            $this->setMessage();
        }
        return $this->message;

	}

	public function setMessage(\Model\Admin\Message $message = null)
    {
        if (!$message) 
        {
            $message = \Mage::getModel('Model\Admin\Message');
        }
        $this->message = $message;
        return $this;
    }

	public function baseUrl($subUrl=null)
    {
    	return $this->getUrlObject()->baseUrl($subUrl);
    }

}

?>