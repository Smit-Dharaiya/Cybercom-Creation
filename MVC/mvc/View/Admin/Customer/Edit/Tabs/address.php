<?php if (!$this->validCustomer()) : ?>
    <h3>Please Register First</h3>
<?php else : ?>

    <?php

    $shipping = $this->getShipping();
    $billing = $this->getBilling();

    ?>
    <div class="container">

        <form method="POST" class=" " action='<?php echo $this->getUrlObject()->getUrl("save", null, ['tab' => 'address'], true); ?>'>
            <hr>
            <center>
                <h2>Shipping Address</h2>
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


            <div class="mb-3">
                <center>
                    <h2>Billing Address</h2>
                </center>
            </div>

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
            <button name="submit" id="submit" class="btn btn-primary   "><?php $this->getButton(); ?></button>

        </form>
    </div>
<?php endif; ?>