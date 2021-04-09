<?php
$billing = $this->getBillingAddress();
$cart = $this->getCart();
$shipping = $this->getShippingAddress();
$paymentMethod = $this->getPaymentMethod();
$shippingMethod = $this->getShippingMethod();
$orderDetails = $this->getOrderDetails();
?>
<div class="container">

    <form method="POST">

        <div class="row my-4">
            <div class="col-md-5">
                <h4>Billing Address</h4>
                <hr>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" style="width: 20%"><b>Address</b></span>
                    <input type="text" class="form-control" value="<?php if ($billing) {
                                                                        echo $billing->address;
                                                                    } ?>" name="billing[address]" id="address" placeholder="Customer Address ">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" style="width: 20%"><b>City</b></span>
                    <input type="text" class="form-control" value="<?php if ($billing) {
                                                                        echo $billing->city;
                                                                    } ?>" name="billing[city]" id="city" placeholder="City">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" style="width: 20%"><b>State</b></span>
                    <input type="text" class="form-control" value="<?php if ($billing) {
                                                                        echo $billing->state;
                                                                    } ?>" name="billing[state]" id="state" placeholder="State">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" style="width: 20%"><b>Country</b></span>
                    <input type="text" class="form-control" value="<?php if ($billing) {
                                                                        echo $billing->country;
                                                                    }  ?>" name="billing[country]" id="country" placeholder="Country">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" style="width: 20%"><b>Zipcode</b></span>
                    <input type="text" class="form-control" value="<?php if ($billing) {
                                                                        echo $billing->zipcode;
                                                                    }  ?>" name="billing[zipcode]" id="zipcode" placeholder="Zip-Code">
                </div>
                <div class="form-check my-3">
                    <input type="checkbox" class="form-check-input" name="saveBillingFlag" id="billingSaveFlag">
                    <label for="billingSaveFlag" class="form-check-label">Save To Addressbook</label>
                </div>
            </div>
            <div class="col-md-5">
                <h4>Shipping Address</h4>
                <hr>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" style="width: 20%"><b>Address</b></span>
                    <input type="text" class="form-control" value="<?php if ($shipping) {
                                                                        echo $shipping->address;
                                                                    } ?>" name="shipping[address]" id="address" placeholder="Customer Address">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" style="width: 20%"><b>City</b></span>
                    <input type="text" class="form-control" value="<?php if ($shipping) {
                                                                        echo $shipping->city;
                                                                    } ?>" name="shipping[city]" id="city" placeholder="City">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" style="width: 20%"><b>State</b></span>
                    <input type="text" class="form-control" value="<?php if ($shipping) {
                                                                        echo $shipping->state;
                                                                    } ?>" name="shipping[state]" id="state" placeholder="State">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" style="width: 20%"><b>Country</b></span>
                    <input type="text" class="form-control" value="<?php if ($shipping) {
                                                                        echo $shipping->country;
                                                                    } ?>" name="shipping[country]" id="country" placeholder="Country">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" style="width: 20%"><b>Zipcode</b></span>
                    <input type="text" class="form-control" value="<?php if ($shipping) {
                                                                        echo $shipping->zipcode;
                                                                    } ?>" name="shipping[zipcode]" id="zipcode" placeholder="Zip-Code">
                </div>
                <div class="form-check my-3">
                    <input type="checkbox" class="form-check-input" name="sameFlag" id="sameFlag">
                    <label for="sameFlag" class="form-check-label">Same as billing</label>
                </div>
                <div class="form-check my-3">
                    <input type="checkbox" class="form-check-input" name="saveShippingFlag" id="shippingSaveFlag">
                    <label for="shippingSaveFlag" class="form-check-label">Save To Addressbook</label>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-5">
                <h4>Payment Methods</h4>
                <hr>
                <div class="form-check my-3">
                    <?php foreach ($paymentMethod->getData() as $key => $paymentMethod) : ?>
                        <input type="radio" class="form-check-input " name="paymentMethod" value="<?php echo $paymentMethod->id ?>"> <?php echo $paymentMethod->name ?><br>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-5">
                <h4>Shipping Methods</h4>
                <hr>
                <div class="form-check my-3">
                    <?php foreach ($shippingMethod->getData() as $key => $shippingMethod) : ?>
                        <input type="radio" class="form-check-input" name="shippingMethod" value="<?php echo $shippingMethod->id ?>"> <?php echo $shippingMethod->name ?> - (Amount:<?php echo $shippingMethod->amount ?>)<br>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <a href="<?php echo $this->getUrlObject()->getUrl('grid', 'cart'); ?>" name="back" id="back" class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left fa=sm"></i> Back</a>
        <button name="submit" id="submit" class="btn btn-primary m-3" formaction="<?php echo $this->getUrlObject()->getUrl('save', 'Cart\Checkout', null, true); ?>">Proceed to Next <i class="fas fa-arrow-alt-circle-right fa=sm"></i></button>
    </form>
</div>