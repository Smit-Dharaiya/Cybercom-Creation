<?php 

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Admin\Core\Admin");

class Customer extends Core\Admin
{

public function gridAction()
{
   
    $layout = $this->getLayout();

    $gridBlock = \Mage::getBlock("Block\Admin\Customer\Grid");
    $gridBlock->setController($this);

    $content = $layout->getChild('content');
    $content->addChild($gridBlock,'grid');

    $this->toHtmlLayout();
}

public function formAction()
    {
        $layout = $this->getLayout(); 
        $content = $layout->getChild('content');
        $content->setController(new \Controller\Admin\Core\Admin());

        $edit = \Mage::getBlock("Block\Admin\Customer\Edit");
        $edit->setController($this);
        $content->addChild($edit,'edit');
        
        $left  = $layout->getChild('left');
        $left->setController(new \Controller\Admin\Core\Admin());
        $tabs = \Mage::getBlock("Block\Admin\Customer\Edit\Tabs");
        $tabs->setController($this);
        $left->addChild($tabs,'tabs');
        $this->toHtmlLayout();  
    }

public function editAction()
{
    try {
        $edit = \Mage::getBlock("Block\Admin\Customer\Edit");
        $edit->setController($this);        
        $layout = $this->getLayout();
        $content = $layout->getChild('content')->addChild($edit,'edit');
        $layout->toHtml();
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
}


public function addressAction()
{
    try{
        if(!$this->getRequest()->isPost()) {
            throw new Exception("Invalid Request.");
        }
        $billing = \Mage::getModel("Model\CustomerAddress");
        if ($id = (int)$this->getRequest()->getGet('id')) {
            $billing = $billing->load($id);
            if(!$billing){
                throw new Exception("No record found.");
            }
        }
        $billingData = $this->getRequest()->getPost('billing');
        $billing->addressType = 'billing';
        $billing->setData($billingData);
        $billing->save();
        die();

        $shipping = \Mage::getModel("Model\CustomerAddress");
        if ($id = (int)$this->getRequest()->getGet('id')) {
            $shipping = $shipping->load($id);
            if(!$shipping){
                throw new Exception("No record found.");
            }
        }      
        $shippingData = $this->getRequest()->getPost('shipping');
        $shipping->addressType = 'shipping';
        $shipping->setData($shippingData);
        $shipping->save();
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
}    

public function saveAction(){
        try{
            if(!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request.");
            }
            date_default_timezone_set("Asia/Calcutta");

            $customer = \Mage::getBlock('Block\Admin\Customer\Edit');
            $customer = $customer->getCustomer();
            $customerId = $this->getRequest()->getGet('id');

            if ($customerId) {
                if(!$customer->getData()){
                    throw new Exception("No record found.");
                }
                $customer->updatedDate = date("Y-m-d H:i:s");
            }
            else {
                $customer->createdDate = date("Y-m-d H:i:s");
            }
           
            $tab = $this->getRequest()->getGet('tab');
            if ($tab == 'address') {

                $addressBlock = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs\Address');
                if(!$customerId){
                    throw new Exception("No record found.");
                }

                $address = $addressBlock->getBilling();
                $billingData = $this->getRequest()->getPost('billing');

                $address->customerId = $customerId;
                $address->addressType = 'billing';
                $address->setData($billingData);
                if(!$address->save()){
                    throw new Exception("Error Processing Billing Address.");
                }
                else{
                    $this->getMessage()->setSuccess('Address Stored Successfully !!');
                }
                $address->unsetData();

                $shippingData = $this->getRequest()->getPost('shipping');
                $address->customerId = $customerId;
                $address->addressType = 'shipping';
                $address->setData($shippingData);
                if(!$address->save()){
                    throw new Exception("Error Processing Shipping Address.");
                }
                else{
                    $this->getMessage()->setSuccess('Address Stored Successfully !!');
                }
            }
            else {
                $customerData = $this->getRequest()->getPost('customer');
                $customer->setData($customerData);
                if(!$customer->save()){
                    throw new Exception("Error Processing Data.");
                }
                else{
                    $this->getMessage()->setSuccess('Data Stored Successfully !!');
                }
            }
        }
        catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid', null, null, true);
    }

public function deleteAction()
{
    try {
        $id = (int) $this->getRequest()->getGet('id');
        if (!$id) {
            throw new Exception("Id Required.");
        }
        $customer = \Mage::getModel("Model\Customer");
        $customerData = $this->getRequest()->getPost('customer');
        $customer->load($id);
        if($customer->delete($id)){
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