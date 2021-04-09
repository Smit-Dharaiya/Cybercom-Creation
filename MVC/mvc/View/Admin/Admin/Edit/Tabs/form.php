<?php
$admin = $this->getTableRow();
?>
<div class="container">

    <form method="POST" class="w-50" action="<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>">
        <hr>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>UserName</b></span>
            <input type="text" class="form-control   " name="admin[username]" id="name" placeholder="UserName" value="<?php echo $admin->username; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Password</b></span>
            <input type="password" class="form-control   " name="admin[password]" id="price" placeholder="Password" value="<?php echo $admin->password; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Status</b></span>
            <select class="custom-select form-control" name="admin[status]">
                <?php
                foreach ($admin->getStatusOptions() as $key => $value) { ?>
                    <option class="form-control" value="<?php echo $key; ?>" <?php if ($admin->status == $key) echo "selected"; ?>>
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