<?php

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");

class ConfigGroup extends \Controller\Core\Admin
{
    public function gridAction()
    {
        $grid = \Mage::getBlock('Block\Admin\ConfigGroup\Grid');
        $layout = $this->getLayout();
        $layout->getContent()->addChild($grid);
        echo $layout->toHtml();
    }

    public function formAction()
    {
        try {
            $layout = $this->getLayout();
            $content = $layout->getChild('content');
            $id = $this->getRequest()->getGet('id');

            $edit = \Mage::getBlock("Block\Admin\ConfigGroup\Edit");
            $edit->setController($this);
            $configGroup = \Mage::getModel("Model\ConfigGroup");

            if ($id) {
                $configGroup = $configGroup->load($id);
                if (!$configGroup) {
                    $this->getMessage()->setFailure("Invalid Request");
                    $this->redirect('grid');
                }
            }
            $edit->setTableRow($configGroup);
            $content->addChild($edit, 'edit');

            $left = $layout->getChild('left');
            $left->setController(new \Controller\Core\Admin());
            $tabs = \Mage::getBlock("Block\Admin\ConfigGroup\Edit\Tabs");
            $tabs->setController($this);
            $left->addChild($tabs, 'tabs');
            echo $layout->toHtml();
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }
            $configGroup = \Mage::getModel("Model\ConfigGroup");
            if ((int) $id = $this->getRequest()->getGet("id")) {
                $configGroup = $configGroup->load($id);
                if (!$configGroup) {
                    throw new \Exception("No record.");
                }
            }
            $configGroupData = $this->getRequest()->getPost('ConfigGroup');
            $configGroup->setData($configGroupData);
            $configGroup->save();
            $this->redirect('grid');
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function saveConfigAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }
            $id = $this->getRequest()->getGet("id");
            $configData = $this->getRequest()->getPost('config');

            foreach ($configData['exist'] as $key => $value) {
                $config = \Mage::getModel('Model\ConfigGroup\Config')->load($key);
                $config->title = $value['title'];
                $config->code = $value['code'];
                $config->value = $value['value'];
                $config->save();
            }
            $i = 0;
            foreach ($configData['new'] as $key => $value) {
                if (array_key_exists($i, $configData['new']['title'])) {
                    $config = \Mage::getModel('Model\ConfigGroup\Config');
                    $config->title = $configData['new']['title'][$i];
                    $config->code = $configData['new']['code'][$i];
                    $config->value = $configData['new']['value'][$i];
                    $config->groupId = $id;
                    $config->save();
                    $i++;
                }
            }
            $this->redirect('form', null, null, true);
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function deleteAction()
    {
        try {
            $id = (int) $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception("Id Required.");
            }
            $attribute = \Mage::getModel("Model\ConfigGroup");
            $attribute->load($id);
            if ($attribute->delete()) {
                $this->getMessage()->setSuccess("Record Deleted Successfully");
            } else {
                $this->getMessage()->setSuccess("Unable to Delete Record");
            }
        } catch (\Exception $e) {
            echo $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid');
    }

    public function deleteConfigAction()
    {
        try {
            $id = (int) $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception("Id Required.");
            }
            $config = \Mage::getModel("Model\ConfigGroup\Config");
            $config->load($id);
            if ($config->delete()) {
                $this->getMessage()->setSuccess("Record Deleted Successfully");
            } else {
                $this->getMessage()->setSuccess("Unable to Delete Record");
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('form', null, ['id' => $config->groupId], true);
    }
}
