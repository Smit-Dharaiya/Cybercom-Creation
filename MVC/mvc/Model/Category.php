<?php

namespace Model;

\Mage::loadFileByClassName("Model\Core\Table");

class Category extends Core\Table{
 
 const STATUS_ENABLED = 1;
 const STATUS_DISABLED = 0;

    public function __construct()
    {
        $this->setTableName("category");
        $this->setPrimaryKey("id");
    }

    public function getStatusOptions()
    {
        return [
            self::STATUS_DISABLED => "Disable",
            self::STATUS_ENABLED => "Enable"
        ];
    }

    public function updatePath()
    {
        if(!$this->parentId){
            $path = $this->id;
        }
        else {
            $parent = \Mage::getModel('Model\Category');
            $parent->load($this->parentId);
            if(!$parent){
                throw new Exception('Unable to load parent', 1);                
            }
            $path = $parent->path . "=" . $this->id;
        }
        $this->path = $path;
        return $this->save();
    }

    public function updateChildrenPaths($path,$parentId = null)
    {
        $path = $path . "=";
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `path` LIKE '{$path}%' ORDER BY `path` ASC ";
        $categories = $this->fetchAll($query);
        if($categories){
            foreach ($categories->getData() as $row) {
                if($parentId) {
                    $row->parentId = $parentId;
                }
                $row->updatePath();
            }
        }
    }
}
?>