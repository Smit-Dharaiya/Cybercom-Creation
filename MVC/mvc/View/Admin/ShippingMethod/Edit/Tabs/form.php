<?php
$shippingMethod = $this->getShippingMethod();
?>
<div class="container">
    
    <form method="POST" class="border border-secondary border-1" action="<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>">
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="shippingMethod[name]" id="name" placeholder="Shipping Method Name" value="<?php echo $shippingMethod->name; ?>">
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="shippingMethod[code]" id="code" placeholder="Shipping Method Code" value="<?php echo $shippingMethod->code; ?>">
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="shippingMethod[amount]" id="code" placeholder="Shipping Method Code" value="<?php echo $shippingMethod->amount; ?>">
            </div>            
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="shippingMethod[description]" id="description" placeholder="Shipping Method Description" value="<?php echo $shippingMethod->description; ?>">
            </div>            
            <div class="col-md-10">
               <select class="custom-select my-4 form-control" name="shippingMethod[status]">
               <?php
                foreach ($shippingMethod->getStatusOptions() as $key => $value) { ?>
                    <option class="form-control" value="<?php echo $key; ?>"
                        <?php if ($shippingMethod->status == $key) echo "selected";?> >
                        <?php echo $value;?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <button name="submit" id="submit" class="btn btn-primary my-4"><?php echo $this->getButton();?></button>
      <br><br>        
    </form>
</div>