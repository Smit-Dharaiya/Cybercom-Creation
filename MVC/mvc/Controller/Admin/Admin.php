<?php 

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Admin\Core\Admin");

class Admin extends Core\Admin
{

public function gridAction()
{
   
    $layout = $this->getLayout();

    $gridBlock = \Mage::getBlock("Block\Admin\Admin\Grid");
    $gridBlock->setController($this);

    $content = $layout->getChild('content');
    $content->addChild($gridBlock,'grid');

    $this->toHtmlLayout();
}

public function formAction()
    { 
        $layout = $this->getLayout(); 
        $content = $layout->getChild('content');

        $edit = \Mage::getBlock("Block\Admin\Admin\Edit");
        $edit->setController($this);
        $content->addChild($edit,'edit');
        
        $left = $layout->getChild('left');
        $left->setController(new Controller_Admin_Core_Admin());
        $tabs = \Mage::getBlock("Block\Admin\Admin\Edit\Tabs");
        $tabs->setController($this);
        $left->addChild($tabs,'tabs');
        $layout->toHtml();  
    }

public function editAction()
{
	try {
        $edit = \Mage::getBlock("Block\Admin\Admin\Edit");
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
    $admin = \Mage::getModel("Model\Admin");
    if ($id = $this->getRequest()->getGet("id")) {
        $admin = $admin->load($id);
        if (!$admin) {
        	throw new Exception("Record Not Found.");
        }
    }
    date_default_timezone_set("Asia/Calcutta");
    $admin->createdDate = date("Y-m-d H:i:s");
    $adminData = $this->getRequest()->getPost('admin');
    $admin->setData($adminData);
    if($admin->save()){
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
        $admin = \Mage::getModel("Model\Admin");
        $adminData = $this->getRequest()->getPost('admin');
        $admin->load($id);
        if($admin->delete($id)){
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