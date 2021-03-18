<?php
$cmsPage = $this->getCmsPage();
?>
<div class="container">
    
    <form method="POST" class="border border-secondary border-1" action="<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>">
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="cmsPage[title]" id="title" placeholder="CMS Page title" value="<?php echo $cmsPage->title; ?>">
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="cmsPage[identifier]" id="identifier" placeholder="CMS Page Identifier" value="<?php echo $cmsPage->identifier; ?>">
            </div>            
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="cmsPage[content]" id="content" placeholder="CMS Page content" value="<?php echo $cmsPage->content; ?>">
            </div>            
            <div class="col-md-10">
               <select class="custom-select my-4 form-control" name="cmsPage[status]">
               <?php
                foreach ($cmsPage->getStatusOptions() as $key => $value) { ?>
                    <option class="form-control" value="<?php echo $key; ?>"
                        <?php if ($cmsPage->status == $key) echo "selected";?> >
                        <?php echo $value;?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <button name="submit" id="submit" class="btn btn-primary my-4"><?php echo $this->getButton();?></button>
      <br><br>        
    </form>
</div>