<?php
$customer = $this->getTableRow();
$customerGroup = $this->getCustomerGroup();
?>

<div class="container">

    <form method="POST" class="w-50" action='<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>'>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>First Name</b></span>
            <input type="text" class="form-control   " name="customer[firstName]" id="fname" placeholder="FirstName" value="<?php echo  $customer->firstName; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Last Name</b></span>
            <input type="text" class="form-control   " name="customer[lastName]" id="lname" placeholder="LastName" value="<?php echo  $customer->lastName; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Email</b></span>
            <input type="email" class="form-control   " name="customer[email]" id="email" placeholder="Email" value="<?php echo  $customer->email; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Password</b></span>
            <input type="password" class="form-control   " name="customer[password]" id="password" placeholder="Password" value="<?php echo  $customer->password; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Contact Number</b></span>
            <input type="text" class="form-control   " name="customer[contactNo]" id="number" placeholder="ContactNumber" value="<?php echo  $customer->contactNo; ?>">
        </div>
        <input type="text" name="customer[updatedDate]" value="<?php date_default_timezone_set('Asia/Kolkata');
                                                                echo date('Y-m-d H:i:s') ?>" hidden>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Status</b></span>
            <select class="custom-select    form-control" name="customer[status]">
                <?php
                foreach ($customer->getStatusOptions() as $key => $value) { ?>
                    <option class="form-control" value="<?php echo $key; ?>" <?php if ($customer->status == $key) echo "selected"; ?>>
                        <?php echo $value; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <?php if ($customerGroup) : ?>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" style="width: 20%"><b>Customer Group</b></span>
                <select class="custom-select form-control" name="customer[customerGroup]">
                    <option value="" disabled selected>Select</option>
                    <?php
                    foreach ($customerGroup->getData() as $key => $value) { ?>
                        <option class="form-control" value="<?php echo $value->name; ?>" <?php if ($customer->getOriginalData()) {
                                                                                                if ($customer->getOriginalData()['customerGroup'] == $value->name) echo "selected";
                                                                                            } ?>>
                            <?php echo $value->name; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        <?php endif; ?>
        <a href="<?php echo $this->getUrlObject()->getUrl('grid'); ?>" name="back" id="back" class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left fa=sm"></i> Back</a>
        <button name="submit" id="submit" class="btn btn-primary mx-2"><?php echo $this->getButton(); ?></button>
        <br><br>
    </form>
</div>