<?php

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");

class Category extends \Controller\Core\Admin
{

    public function gridAction()
    {

        $layout = $this->getLayout();

        $gridBlock = \Mage::getBlock("Block\Admin\Category\Grid");
        $gridBlock->setController($this);

        $content = $layout->getChild('content');
        $content->addChild($gridBlock, 'grid');

        $this->toHtmlLayout();
    }

    public function formAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $id = $this->getRequest()->getGet('id');

        $edit = \Mage::getBlock("Block\Admin\Category\Edit");
        $edit->setController($this);
        $category = \Mage::getModel("Model\Category");

        if ($id) {
            $category = $category->load($id);
            if (!$category) {
                throw new \Exception("no record");
            }
        }
        $edit->setTableRow($category);

        $content->addChild($edit, 'edit');

        $left = $layout->getChild('left');
        $left->setController(new \Controller\Core\Admin());
        $tabs = \Mage::getBlock("Block\Admin\Category\Edit\Tabs");
        $tabs->setController($this);
        $left->addChild($tabs, 'tabs');
        echo $layout->toHtml();
    }

    public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }
            $category = \Mage::getModel("Model\Category");
            if ((int)$id = $this->getRequest()->getGet("id")) {
                $category = $category->load($id);
                if (!$category) {
                    throw new \Exception("No record.");
                }
            }

            $categoryData = $this->getRequest()->getPost('category');
            $category->setData($categoryData);
            $id = $category->save();

            $categoryPath = $category->path;
            $category->updatePath();
            $category->save();
            $category->updateChildrenPaths($categoryPath);
            $this->redirect('grid');
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
            $category = \Mage::getModel("Model\Category");
            $category->load($id);

            $path = $category->path;
            $parentId = $category->parentId;
            $category->delete($id);
            $category->updateChildrenPaths($path, $parentId);
            if ($category->delete($id)) {
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
        $this->getFilterObject()->clearFilters('category');
        $this->redirect('grid');
    }
}
