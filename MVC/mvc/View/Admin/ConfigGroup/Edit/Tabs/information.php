<?php
$configGroup = $this->getTableRow();
?>
<div class="container">

    <form method="POST" class="w-50" action="<?php echo $this->getUrlObject()->getUrl('save', null, null, true); ?>">
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Name</b></span>
            <input type="text" class="form-control" name="ConfigGroup[name]" id="name" placeholder="Name" value="<?php echo $configGroup->name; ?>">
        </div>
        <a href="<?php echo $this->getUrlObject()->getUrl('grid'); ?>" name="back" id="back" class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left fa=sm"></i> Back</a>
        <button name="submit" id="submit" class="btn btn-primary mx-2"><?php echo $this->getButton(); ?></button>
        <br><br>
    </form>
</div>