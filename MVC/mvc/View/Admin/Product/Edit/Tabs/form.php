<?php
$product = $this->getProduct();
?>
<div class="container">
    
    <form method="POST" class="border border-secondary border-1" action="<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>">
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="product[sku]" id="sku" placeholder="SKU" value="<?php echo $product->SKU; ?>">
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="product[name]" id="name" placeholder="Name" value="<?php echo $product->name; ?>">
            </div>            
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="product[price]" id="price" placeholder="Price" value="<?php echo $product->price; ?>">
            </div>            
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="product[discount]" id="discount" placeholder="Discount" value="<?php echo $product->discount; ?>">
            </div>            
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="product[description]" id="description" placeholder="Description" value="<?php echo $product->description; ?>">
            </div>            
            <div class="col-md-10">
                <input type="number" class="form-control my-4" name="product[quantity]" id="quantity" placeholder="Quantity" value="<?php echo $product->quantity; ?>">
            </div>            
            <input type="text" name="product[updatedAt]" value="<?php date_default_timezone_set("Asia/Kolkata");echo date('Y-m-d H:i:s')?>" hidden>
            <div class="col-md-10">
               <select class="custom-select my-4 form-control" name="product[status]">
               <?php
                foreach ($product->getStatusOptions() as $key => $value) { ?>
                    <option class="form-control" value="<?php echo $key; ?>"
                        <?php if ($product->status == $key) echo "selected";?> >
                        <?php echo $value;?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <button name="submit" id="submit" class="btn btn-primary my-4"><?php echo $this->getButton();?></button>
      <br><br>        
    </form>
</div>