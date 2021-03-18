<?php
$paymentMethod = $this->getPaymentMethod();
?>
<div class="container">
    
    <form method="POST" class="border border-secondary border-1" action="<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>">
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="paymentMethod[name]" id="name" placeholder="Payment Method Name" value="<?php echo $paymentMethod->name; ?>">
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="paymentMethod[code]" id="code" placeholder="Payment Method Code" value="<?php echo $paymentMethod->code; ?>">
            </div>            
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="paymentMethod[description]" id="description" placeholder="Payment Method Description" value="<?php echo $paymentMethod->description; ?>">
            </div>            
            <div class="col-md-10">
               <select class="custom-select my-4 form-control" name="paymentMethod[status]">
               <?php
                foreach ($paymentMethod->getStatusOptions() as $key => $value) { ?>
                    <option class="form-control" value="<?php echo $key; ?>"
                        <?php if ($paymentMethod->status == $key) echo "selected";?> >
                        <?php echo $value;?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <button name="submit" id="submit" class="btn btn-primary my-4"><?php echo $this->getButton();?></button>
      <br><br>        
    </form>
</div>