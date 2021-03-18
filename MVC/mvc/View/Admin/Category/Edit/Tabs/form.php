<?php
$category = $this->getCategory();
$categoryOptions =$this->getCategoryOptions();
?>
<div class="container">
    
    <form method="POST" class="border border-secondary border-1" action="<?php echo $this->getUrlObject()->getUrl('save'); ?>">
            <div class="col-md-10">
               <select class="custom-select my-4 form-control" name="category[parentId]">
                <?php if($categoryOptions): ?>
                    <?php foreach ($categoryOptions as $id => $categoryName): ?>
                        <option value="<?php echo $id; ?>"> <?php echo $categoryName; ?>
                        </option>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="category[categoryName]" id="sku" placeholder="CategoryName" value="<?php echo $category->categoryName; ?>">
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="category[description]" id="name" placeholder="Description" value="<?php echo $category->description; ?>">
            </div>            
            <div class="col-md-10">
               <select class="custom-select my-4 form-control" name="category[categoryStatus]">
               <?php
                foreach ($category->getStatusOptions() as $key => $value) { ?>
                    <option class="form-control" value="<?php echo $key; ?>"
                        <?php if ($category->categoryStatus == $key) echo "selected";?> >
                        <?php echo $value;?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <button name="submit" id="submit" class="btn btn-primary my-4"><?php echo $this->getButton();?></button>
      <br><br>        
        </form>
</div>
