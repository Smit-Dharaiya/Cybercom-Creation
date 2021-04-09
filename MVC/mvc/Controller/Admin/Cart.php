<?php

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");

class Cart extends \Controller\Core\Admin
{

    public function gridAction()
    {

        $layout = $this->getLayout();
        $gridBlock = \Mage::getBlock("Block\Admin\Cart\Grid");
        $content = $layout->getChild('content');
        $content->addChild($gridBlock, 'grid');
        $session = \Mage::getModel('Model\Admin\session');
        $cart = \Mage::getModel('Model\Cart');
        $cart->getCart();

        $this->toHtmlLayout();
    }


    public function filterAction()
    {
        $data = $this->getRequest()->getPost('filter');
        $this->getFilterObject()->setFilters($data);
        $this->redirect('grid');
    }

    public function clearFilterAction()
    {
        $this->getFilterObject()->clearFilters();
        $this->redirect('grid');
    }


    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request.");
            }
            $cart = \Mage::getModel("Model\Cart");
            if ($id = $this->getRequest()->getGet("id")) {
                $cart = $cart->load($id);
                if (!$cart) {
                    throw new \Exception("Record Not Found.");
                }
            }
            $cartItemQuantity = $this->getRequest()->getPost('cartQuantity');
            $changedPrice = $this->getRequest()->getPost('changedPrice');
            // $newPrice = $this->getRequest()->getPost('newPrice');
            $postData = $_POST;
            echo '<pre>';
            print_r($postData);
            die();
            // foreach ($cartItemQuantity as $key => $quantity) {
            //     $cartItem = \Mage::getModel('Model\Cart\Item')->load($key);
            //     $cartItem->quantity = $quantity;
            //     if ($cartItem->save()) {
            //         $this->getMessage()->setSuccess("Quantity updated Successfully");
            //     } else {
            //         $this->getMessage()->setFailure("unable to update quantity");
            //     }
            // }
            foreach ($postData as $key => $value) {
                if (\is_numeric($key)) {
                    $cartItem = \Mage::getModel('Model\Cart\Item')->load($key);
                    $productDiscount = \Mage::getModel('Model\Product')->load($cartItem->productId)->discount;
                    $cartItem->quantity = $value['quantity'];
                    $cartItem->discount = $value['quantity'] * $productDiscount;
                    $cartItem->changedPrice = $value['changedPrice'];
                    if ($cartItem->save()) {
                        $this->getMessage()->setSuccess("Data updated Successfully");
                    } else {
                        $this->getMessage()->setFailure("unable to update Data");
                    }
                }
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid');
        }
        $this->redirect('grid', null, null, false);
    }

    public function deleteAction()
    {
        try {
            $id = (int) $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception("Id Required.");
            }
            $cartItem = \Mage::getModel("Model\Cart\Item");
            $cartItem->load($id);
            if ($cartItem->delete($id)) {
                $this->getMessage()->setSuccess("Record Deleted Successfully");
            } else {
                $this->getMessage()->setSuccess("Unable to Delete Record");
            }
        } catch (\Exception $e) {
            echo $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid');
    }

    public function addToCartAction()
    {
        try {
            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception('Item not found !!');
            }
            $cartItem = \Mage::getModel('Model\Product')->load($id);
            if (!$cartItem) {
                throw new \Exception('{Product not found !!');
            }
            $cart = \Mage::getModel("Model\Cart");
            $cart = $cart->getCart()->addItem($cartItem, 1, true);
            $cart->save();
            // die;

            // if ($cart->save()) {
            //     $this->getMessage()->setSuccess("Record Added Successfully");
            // } else {
            //     $this->getMessage()->setFailure("Unable to Add Record");
            // }
        } catch (\Exception $e) {
            $this->getMessage()->setFailre($e->getMessage());
        }
        $this->redirect('grid');
    }


    public function setActiveCustomerCartAction()
    {
        $customerId = (int)$this->getRequest()->getPost('activeCustomer');
        if ($customerId) {
            $session = \Mage::getModel('Model\Admin\session');
            $session->activeCustomerId = $customerId;
            $this->getMessage()->setSuccess('Active Customer set.');
            $this->redirect('grid', null, null, true);
            return;
        }
    }

    public function getActiveCustomerId()
    {
        $session = \Mage::getModel('Model\Admin\Session');
        $activeCustomerId = $session->activeCustomerId;
        if ($activeCustomerId) {
            return $activeCustomerId;
        }
        return null;
    }
}
