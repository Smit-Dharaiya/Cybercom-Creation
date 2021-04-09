<?php
$shippingMethod = $this->getTableRow();
?>
<div class="container">

    <form method="POST" class="w-50" action="<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>">
        <hr>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Name</b></span>
            <input type="text" class="form-control   " name="shippingMethod[name]" id="name" placeholder="Shipping Method Name" value="<?php echo $shippingMethod->name; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Code</b></span>
            <input type="text" class="form-control   " name="shippingMethod[code]" id="code" placeholder="Shipping Method Code" value="<?php echo $shippingMethod->code; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Amount</b></span>
            <input type="text" class="form-control   " name="shippingMethod[amount]" id="code" placeholder="Shipping Method Amount" value="<?php echo $shippingMethod->amount; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Description</b></span>
            <input type="text" class="form-control   " name="shippingMethod[description]" id="description" placeholder="Shipping Method Description" value="<?php echo $shippingMethod->description; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Status</b></span>
            <select class="custom-select    form-control" name="shippingMethod[status]">
                <?php
                foreach ($shippingMethod->getStatusOptions() as $key => $value) { ?>
                    <option class="form-control" value="<?php echo $key; ?>" <?php if ($shippingMethod->status == $key) echo "selected"; ?>>
                        <?php echo $value; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <a href="<?php echo $this->getUrlObject()->getUrl('grid'); ?>" name="back" id="back" class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left fa=sm"></i> Back</a>
        <button name="submit" id="submit" class="btn btn-primary btn-rounded mx-2"><?php echo $this->getButton(); ?></button>
        <br><br>
    </form>
</div>