<?php 

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Admin\Core\Admin");

class PaymentMethod extends Core\Admin
{

public function gridAction()
{
   
    $layout = $this->getLayout();

    $gridBlock = \Mage::getBlock("Block\Admin\PaymentMethod\Grid");
    $gridBlock->setController($this);

    $content = $layout->getChild('content');
    $content->addChild($gridBlock,'grid');

    $this->toHtmlLayout();
}

public function formAction()
    { 
        $layout = $this->getLayout(); 
        $content = $layout->getChild('content');

        $edit = \Mage::getBlock("Block\Admin\PaymentMethod\Edit");
        $edit->setController($this);
        $content->addChild($edit,'edit');
        
        $left = $layout->getChild('left');
        $left->setController(new \Controller\Admin\Core\Admin());
        $tabs = \Mage::getBlock("Block\Admin\PaymentMethod\Edit\Tabs");
        $tabs->setController($this);
        $left->addChild($tabs,'tabs');
        $layout->toHtml();  
    }

public function editAction()
{
	try {
        $edit = \Mage::getBlock("Block\Admin\PaymentMethod\Edit");
        $edit->setController($this);        
        $layout = $this->getLayout();
        $content = $layout->getChild('content')->addChild($edit,'edit');
        $layout->toHtml();

    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
}

public function saveAction()
{
	try {
        if (!$this->getRequest()->isPost()) {
            throw new Exception("Invalid Request.");
    }
    $paymentMethod = \Mage::getModel("Model\PaymentMethod");
    if ($id = $this->getRequest()->getGet("id")) {
        $paymentMethod = $paymentMethod->load($id);
        if (!$paymentMethod) {
        	throw new Exception("Record Not Found.");
        }
    }
    date_default_timezone_set("Asia/Calcutta");
    $paymentMethod->createdDate = date("Y-m-d H:i:s");
    $paymentMethodData = $this->getRequest()->getPost('paymentMethod');
    $paymentMethod->setData($paymentMethodData);
    if($paymentMethod->save()){
            $this->getMessage()->setSuccess("Record Added Successfully");
        }
        else {
            $this->getMessage()->setSuccess("Unable to Add Record");
    }
    } catch (Exception $e) {
        echo $e->getMessage()->setFailure($e->getMessage());
        $this->redirect('grid');
    } 
	$this->redirect('grid',null,null,false);
}

public function deleteAction()
{
    try {
        $id = (int) $this->getRequest()->getGet('id');
        if (!$id) {
            throw new Exception("Id Required.");
        }
        $paymentMethod = \Mage::getModel("Model\PaymentMethod");
        $paymentMethodData = $this->getRequest()->getPost('paymentMethod');
        $paymentMethod->load($id);
        if($paymentMethod->delete($id)){
            $this->getMessage()->setSuccess("Record Deleted Successfully");
        }
        else {
            $this->getMessage()->setSuccess("Unable to Delete Record");
        }
    } catch (Exception $e) {
        echo $e->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect('grid');
}

}

?>