<?php
$paymentMethod = $this->getPaymentMethod();
?>
<div>
    <center>
    	<h2><?php $this->getTitle();?></h2>
    	<form class="border border-secondary border-1 w-50" method="POST" action="<?php echo $this->getUrl("save", null, ['id'=>$paymentMethod->id]); ?>">
    		<?php $this->getTabContent()->toHtml() ?> 
    	</form>
  	</center>
</div>     