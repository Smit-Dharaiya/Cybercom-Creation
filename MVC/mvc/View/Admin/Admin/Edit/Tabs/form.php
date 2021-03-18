<?php
$admin = $this->getAdmin();
?>
<div class="container">
    
    <form method="POST" class="border border-secondary border-1" action="<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>">
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="admin[username]" id="name" placeholder="UserName" value="<?php echo $admin->username; ?>">
            </div>            
            <div class="col-md-10">
                <input type="password" class="form-control my-4" name="admin[password]" id="price" placeholder="Password" value="<?php echo $admin->password; ?>">
            </div>                        
            <div class="col-md-10">
               <select class="custom-select my-4 form-control" name="admin[status]">
               <?php
                foreach ($admin->getStatusOptions() as $key => $value) { ?>
                    <option class="form-control" value="<?php echo $key; ?>"
                        <?php if ($admin->status == $key) echo "selected";?> >
                        <?php echo $value;?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <button name="submit" id="submit" class="btn btn-primary my-4"><?php echo $this->getButton();?></button>
      <br><br>        
    </form>
</div>