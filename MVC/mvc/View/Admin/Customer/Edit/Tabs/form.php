<?php
$customer = $this->getCustomer();
?>

<div class="container">
   
    <form method="POST" class="border border-secondary border-1" action='<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>'>
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="customer[firstName]" id="fname" placeholder="FirstName" value="<?php echo  $customer->firstName; ?>">
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="customer[lastName]" id="lname" placeholder="LastName" value="<?php echo  $customer->lastName; ?>">
            </div>
            <div class="col-md-10">
                <input type="email" class="form-control my-4" name="customer[email]" id="email" placeholder="Email" value="<?php echo  $customer->email; ?>">
            </div>
            <div class="col-md-10">
                <input type="password" class="form-control my-4" name="customer[password]" id="password" placeholder="Password" value="<?php echo  $customer->password; ?>">
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="customer[contactNo]" id="number" placeholder="ContactNumber" value="<?php echo  $customer->contactNo; ?>">
            </div>
            <input type="text" name="customer[updatedDate]" value="<?php date_default_timezone_set('Asia/Kolkata'); echo date('Y-m-d H:i:s')?>" hidden>
            <div class="col-md-10">
               <select class="custom-select my-4 form-control" name="customer[status]"> 
                <?php
                foreach ($customer->getStatusOptions() as $key => $value) { ?>
                    <option class="form-control" value="<?php echo $key; ?>"
                        <?php if ($customer->status == $key) echo "selected";?> >
                        <?php echo $value;?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <button name="submit" id="submit" class="btn btn-primary my-4"><?php echo $this->getButton();?></button>
			<br><br>       	
        </form>
    </div>    
