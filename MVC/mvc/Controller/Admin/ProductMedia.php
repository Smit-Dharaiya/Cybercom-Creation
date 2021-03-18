<?php 

namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Admin\Core\Admin");

class ProductMedia extends Core\Admin
{
	
	public function gridAction()
	{
		$layout = $this->getLayout();
		$grid = \Mage::getBlock("Block\Admin\Product\Edit\Tabs\Media");
		$layout->getContent()->addChild($grid,'grid');
		$this->toHtmlLayout();
	}

	public function formAction()    
    {   
        try 
        {
            $edit = \Mage::getBLock("Block\Admin\Product\Edit");
        	$edit->setController($this);
            $layout = $this->getLayout();
            $content = $layout->getContent()->addChild($edit);
            $this->toHtmlLayout();
            
            if ($this->getRequest()->getGet('id')) 
            {	
            	$left = $layout->getChild('left');
		        $left->setController(new Controller\Admin\Core\Admin());
                $tabs = \Mage::getBlock("Block\Admin\Product\Edit\Tabs");
		        $tabs->setController($this);
		        $left->addChild($tabs,'tabs');
            }
            $this->tohtmlLayout();   
        } 
        catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
    }

	 public function saveAction()
    {
        $this->_imageUpload();
    }

    protected function _imageUpload()
    {
		$productMedia = \Mage::getModel("Model\ProductMedia");
		$photo = $_FILES['image']['name'];
		$tempName = $_FILES['image']['tmp_name'];
		$path = $productMedia->getImagePath($photo);
		move_uploaded_file($tempName,$path.$photo);
		$productMedia->productId = $this->getRequest()->getGet('id');
		$productMedia->image = $photo;
		$productMedia->save();
		$this->getMessage()->setSuccess("File Uploaded Successfully");
      	$this->redirect('form',null,['tab'=>'media'],true);
        
    }

    public function updateAction()
    {
        $data = $this->getRequest()->getPost('img');
        $productMedia = \Mage::getModel('model\ProductMedia');

        foreach ($data['data'] as $key => $value) 
        {

            $productMedia->load($key);
            
	        $productMedia->small = 0;
	        $productMedia->thumb = 0;
	        $productMedia->base = 0;
	        $productMedia->gallery = 0;

            $productMedia->setData($value);
		    $productMedia->save();
		}
		    
        foreach ($data as $key => $value) 
        {

            if ($value != []) {
            	if($key != 'data'){
                $productMedia->load($value);
                $productMedia->$key = 1;
                $productMedia->save();
            	}
        	}
        }
	  $this->getMessage()->setSuccess("File Updated Successfully");
      $this->redirect('form',null,['tab'=>'media'],true);

	}

	public function deleteAction($id=null)
    {   
        try{

            if(!$removeData = $this->getRequest()->getPost()['img']['data']){
                throw new Exception("Please Select Data.");
            }
            $media = \Mage::getModel('Model\ProductMedia');
            foreach ($removeData as $key => $value) {
            	if(array_key_exists('remove', $value)){
                if ($media->load($key)) {
                    $imageName = $media->image;
                    if(!$media->delete()){
                        throw new Exception("Error Processing Data.");
                    }
                    else{
                        unlink("./Uploads/Product/{$imageName}");
                        $this->getMessage()->setSuccess('Record Successfully Deleted !!');
                    }  
                }
            	}
        	}
    	}
        catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
      $this->redirect('form',null,['tab'=>'media'],true);
        
    }
}

 ?>