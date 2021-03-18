<?php if (!$this->validCustomer()) : ?>
	<h3>Please Register First</h3>
<?php else: ?>
<div class="container">
   
    <form method="POST" class="border border-secondary border-1" action='<?php echo $this->getUrlObject()->getUrl("address", null,['tab'=>'address'],true); ?>'>
    		<h2>Shipping Address</h2>
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="shipping[address]" id="address" placeholder="Customer Address
                ">
            </div>	
             <div class="col-md-10">
                <input type="text" class="form-control my-4" name="shipping[city]" id="city" placeholder="City">
            </div>	
             <div class="col-md-10">
                <input type="text" class="form-control my-4" name="shipping[state]" id="state" placeholder="State">
            </div>	
             <div class="col-md-10">
                <input type="text" class="form-control my-4" name="shipping[country]" id="country" placeholder="Country">
            </div>	
 			<div class="col-md-10">
                <input type="text" class="form-control my-4" name="shipping[zipcode]" id="zipcode" placeholder="Zip-Code">
            </div>

            <div class="col-md-10">
            	<h2>Billing Address</h2>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="billing[address]" id="address" placeholder="Customer Address
                ">
            </div>  
             <div class="col-md-10">
                <input type="text" class="form-control my-4" name="billing[city]" id="city" placeholder="City">
            </div>  
             <div class="col-md-10">
                <input type="text" class="form-control my-4" name="billing[state]" id="state" placeholder="State">
            </div>  
             <div class="col-md-10">
                <input type="text" class="form-control my-4" name="billing[country]" id="country" placeholder="Country">
            </div>  
            <div class="col-md-10">
                <input type="text" class="form-control my-4" name="billing[zipcode]" id="zipcode" placeholder="Zip-Code">
            </div>
            <button name="submit" id="submit" class="btn btn-primary my-4"><?php echo $this->getButton();?></button>

	</form>
</div>
<?php endif; ?>

