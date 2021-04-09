<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class User extends \Controller\Core\Admin
{
    public function gridAction()
    {
        $layout = $this->getLayout();
        $grid = \Mage::getBlock('Block\Admin\User\Grid');
        $content = $layout->getContent()->addChild($grid);
        $this->toHtmlLayout();
    }

    public function formAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $id = $this->getRequest()->getGet('id');


        $edit = \Mage::getBlock("Block\Admin\User\Edit");
        $edit->setController($this);
        $user = \Mage::getModel("Model\User");

        if ($id) {
            $user = $user->load($id);
            if (!$user) {
                throw new \Exception("no record");
            }
        }
        $edit->setTableRow($user);
        $content->addChild($edit, 'edit');

        $left = $layout->getChild('left');
        $left->setController(new \Controller\Core\Admin());
        $tabs = \Mage::getBlock("Block\Admin\User\Edit\Tabs");
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
            $admin = \Mage::getModel("Model\Admin");
            if ($id = $this->getRequest()->getGet("id")) {
                $admin = $admin->load($id);
                if (!$admin) {
                    throw new \Exception("Record Not Found.");
                }
            }
            date_default_timezone_set("Asia/Calcutta");
            $admin->createdDate = date("Y-m-d H:i:s");
            $adminData = $this->getRequest()->getPost('admin');
            $admin->setData($adminData);
            if ($admin->save()) {
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
            $user = \Mage::getModel("Model\User");
            $userData = $this->getRequest()->getPost('user');
            $user->load($id);
            if ($user->delete($id)) {
                $this->getMessage()->setSuccess("Record Deleted Successfully");
            } else {
                $this->getMessage()->setSuccess("Unable to Delete Record");
            }
        } catch (\Exception $e) {
            echo "hi";
        }
        $this->redirect('grid');
    }
}
