<?php
$product = $this->getTableRow();
?>
<div class="container">
    <center>
        <form method="POST" class="w-50" action="<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>">
            <hr>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" style="width: 20%"><b>SKU</b></span>
                <input type="text" class="form-control" name="product[sku]" id="sku" placeholder="SKU" value="<?php echo $product->SKU; ?>">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" style="width: 20%"><b>Name</b></span>
                <input type="text" class="form-control" name="product[name]" id="name" placeholder="Name" value="<?php echo $product->name; ?>">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" style="width: 20%"><b>Price</b></span>
                <input type="text" class="form-control" name="product[price]" id="price" placeholder="Price" value="<?php echo $product->price; ?>">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" style="width: 20%"><b>Discount</b></span>
                <input type="text" class="form-control" name="product[discount]" id="discount" placeholder="Discount" value="<?php echo $product->discount; ?>">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" style="width: 20%"><b>Description</b></span>
                <input type="text" class="form-control" name="product[description]" id="description" placeholder="Description" value="<?php echo $product->description; ?>">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" style="width: 20%"><b>Quantity</b></span>
                <input type="number" class="form-control" name="product[quantity]" id="quantity" placeholder="Quantity" value="<?php echo $product->quantity; ?>">
            </div>
            <input type="text" name="product[updatedAt]" value="<?php date_default_timezone_set("Asia/Kolkata");
                                                                echo date('Y-m-d H:i:s') ?>" hidden>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" style="width: 20%"><b>Status</b></span>
                <select class="custom-select form-control " name="product[status]">
                    <?php
                    foreach ($product->getStatusOptions() as $key => $value) { ?>
                        <option class="form-control" value="<?php echo $key; ?>" <?php if ($product->status == $key) echo "selected"; ?>>
                            <?php echo $value; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <button name="submit" id="submit" class="btn btn-primary my-3"><?php echo $this->getButton(); ?></button>
            <br><br>
        </form>
    </center>
</div>