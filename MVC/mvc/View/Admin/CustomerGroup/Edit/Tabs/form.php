<?php
$customerGroup = $this->getTableRow();
?>
<div class="container">

    <form method="POST" class="w-50" action="<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>">
        <hr>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Name</b></span>
            <input type="text" class="form-control    " name="customerGroup[name]" id="name" placeholder="CustomerGroup Name" value="<?php echo  $customerGroup->name; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Status</b></span>
            <select class="custom-select    form-control" name="customerGroup[status]">
                <?php
                foreach ($customerGroup->getStatusOptions() as $key => $value) { ?>
                    <option class="form-control" value="<?php echo $key; ?>" <?php if ($customerGroup->status == $key) echo "selected"; ?>>
                        <?php echo $value; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <button name="submit" id="submit" class="btn btn-primary   "><?php echo $this->getButton(); ?></button>
        <br><br>
    </form>
</div>