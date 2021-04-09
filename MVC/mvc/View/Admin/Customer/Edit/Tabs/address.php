<?php if (!$this->validCustomer()) : ?>
    <h3>Please Register First</h3>
<?php else : ?>

    <?php

    $shipping = $this->getShipping();
    $billing = $this->getBilling();

    ?>
    <div class="container">

        <form method="POST" class=" " action='<?php echo $this->getUrlObject()->getUrl("save", null, ['tab' => 'address'], true); ?>'>
            <div class="row my-4">

                <div class="col-md-5">
                    <center>
                        <h4>Shipping Address</h4>
                        <hr>
                    </center>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" style="width: 20%"><b>Address</b></span>
                        <input type="text" class="form-control" value="<?php echo $shipping->address; ?>" name="shipping[address]" id="address" placeholder="Customer Address">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" style="width: 20%"><b>City</b></span>
                        <input type="text" class="form-control" value="<?php echo $shipping->city; ?>" name="shipping[city]" id="city" placeholder="City">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" style="width: 20%"><b>State</b></span>
                        <input type="text" class="form-control" value="<?php echo $shipping->state; ?>" name="shipping[state]" id="state" placeholder="State">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" style="width: 20%"><b>Country</b></span>
                        <input type="text" class="form-control" value="<?php echo $shipping->country; ?>" name="shipping[country]" id="country" placeholder="Country">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" style="width: 20%"><b>Zipcode</b></span>
                        <input type="text" class="form-control" value="<?php echo $shipping->zipcode; ?>" name="shipping[zipcode]" id="zipcode" placeholder="Zip-Code">
                    </div>
                    <a href="<?php echo $this->getUrlObject()->getUrl('grid'); ?>" name="back" id="back" class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left fa=sm"></i> Back</a>
                    <button name="submit" id="submit" class="btn btn-success mx-2"><?php $this->getButton(); ?></button>
                </div>
                <div class="col-md-5">
                    <center>
                        <h4>Billing Address</h4>
                    </center>
                    <hr>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" style="width: 20%"><b>Address</b></span>
                        <input type="text" class="form-control   " value="<?php echo $billing->address; ?>" name="billing[address]" id="address" placeholder="Customer Address ">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" style="width: 20%"><b>City</b></span>
                        <input type="text" class="form-control   " value="<?php echo $billing->city   ?>" name="billing[city]" id="city" placeholder="City">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" style="width: 20%"><b>State</b></span>
                        <input type="text" class="form-control   " value="<?php echo $billing->state   ?>" name="billing[state]" id="state" placeholder="State">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" style="width: 20%"><b>Country</b></span>
                        <input type="text" class="form-control   " value="<?php echo $billing->country   ?>" name="billing[country]" id="country" placeholder="Country">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" style="width: 20%"><b>Zipcode</b></span>
                        <input type="text" class="form-control   " value="<?php echo $billing->zipcode   ?>" name="billing[zipcode]" id="zipcode" placeholder="Zip-Code">
                    </div>
                </div>
        </form>
    </div>
    </div>
<?php endif; ?>