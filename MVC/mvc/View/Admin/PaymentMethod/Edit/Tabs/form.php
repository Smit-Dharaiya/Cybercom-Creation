<?php
$paymentMethod = $this->getTableRow();
?>
<div class="container">

    <form method="POST" class="w-50" action="<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>">
        <hr>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Name</b></span>
            <input type="text" class="form-control" name="paymentMethod[name]" id="name" placeholder="Payment Method Name" value="<?php echo $paymentMethod->name; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Code</b></span>
            <input type="text" class="form-control" name="paymentMethod[code]" id="code" placeholder="Payment Method Code" value="<?php echo $paymentMethod->code; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Description</b></span>
            <input type="text" class="form-control" name="paymentMethod[description]" id="description" placeholder="Payment Method Description" value="<?php echo $paymentMethod->description; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Status</b></span>
            <select class="custom-select form-control" name="paymentMethod[status]">
                <?php
                foreach ($paymentMethod->getStatusOptions() as $key => $value) {
                ?>
                    <option class="form-control" value="<?php echo $key; ?>" <?php if ($paymentMethod->status == $key) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>
                        <?php echo $value; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <a href="<?php echo $this->getUrlObject()->getUrl('grid'); ?>" name="back" id="back" class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left fa=sm"></i> Back</a>
        <button name="submit" id="submit" class="btn btn-primary mx-2"><?php echo $this->getButton(); ?></button>
        <br><br>
    </form>
</div>