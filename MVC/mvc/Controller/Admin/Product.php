<?php

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");

class Product extends \Controller\Core\Admin
{

    public function gridAction()
    {

        $layout = $this->getLayout();

        $gridBlock = \Mage::getBlock("Block\Admin\Product\Grid");

        $content = $layout->getContent();
        $content->addChild($gridBlock, 'grid');

        $this->toHtmlLayout();
    }

    // public function testAction()
    // {
    //     $responce = [
    //         'status' => 'success',
    //         'message' => 'hello',
    //         'element' => [ 
    //     header('content-Type: application/json');
    //     echo json\encode($responce);
    // }

    public function formAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $id = $this->getRequest()->getGet('id');

        $edit = \Mage::getBlock("Block\Admin\Product\Edit");
        $edit->setController($this);
        $product = \Mage::getModel("Model\Product");
        if ($id) {
            $product = $product->load($id);
            if (!$product) {
                throw new \Exception("no record");
            }
        }

        $edit->setTableRow($product);
        $content->addChild($edit, 'edit');

        $left = $layout->getChild('left');
        $left->setController(new \Controller\Core\Admin());
        $tabs = \Mage::getBlock("Block\Admin\Product\Edit\Tabs");
        $tabs->setController($this);
        $left->addChild($tabs, 'tabs');
        echo $layout->toHtml();
    }

    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request.");
            }
            $product = \Mage::getModel("Model\Product");
            if ($id = $this->getRequest()->getGet("id")) {
                $product = $product->load($id);
                if (!$product) {
                    throw new \Exception("Record Not Found.");
                }
            }
            // date_default_timezone_set("Asia/Calcutta");
            // $product->createdAt = date("Y-m-d H:i:s");
            $productData = $this->getRequest()->getPost('product');
            $rv = array_filter($productData, 'is_array');

            if (count($rv) > 0) {
                foreach ($productData as $key => $value) {
                    if (\is_array($value)) {
                        $value = \implode(',', $value);
                    }
                    $productData[$key] = $value;
                    $product->setData($productData);
                }
            } else {
                $product->setData($productData);
            }
            // $product->setData($productData);
            if ($product->save()) {
                $this->getMessage()->setSuccess("Record Added Successfully");
            } else {
                $this->getMessage()->setSuccess("Unable to Add Record");
            }
        } catch (\Exception $e) {
            echo $this->getMessage()->setFailure($e->getMessage());
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
            $product = \Mage::getModel("Model\Product");
            $productData = $this->getRequest()->getPost('product');
            $product->load($id);
            if ($product->delete($id)) {
                $this->getMessage()->setSuccess("Record Deleted Successfully");
            } else {
                $this->getMessage()->setSuccess("Unable to Delete Record");
            }
        } catch (\Exception $e) {
            echo $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid');
    }

    public function filterAction()
    {
        $data = $this->getRequest()->getPost('filter');
        $this->getFilterObject()->setFilters($data);
        $this->redirect('grid');
    }

    public function clearFilterAction()
    {
        $this->getFilterObject()->clearFilters('product');
        $this->redirect('grid');
    }
}
