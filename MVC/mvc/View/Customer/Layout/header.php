<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-size: 40px ; font-feature-settings: 'smcp' on"><b>QuesteCom</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link float-end" href="<?php echo $this->getUrlObject()->getUrl('grid', 'product'); ?>">Products</a>
        <a class="nav-link float-end" href="<?php echo $this->getUrlObject()->getUrl('grid', 'category'); ?>">Category</a>
        <a class="nav-link float-end" href="<?php echo $this->getUrlObject()->getUrl('grid', 'customer'); ?>">Customer</a>
        <a class="nav-link float-end" href="<?php echo $this->getUrlObject()->getUrl('grid', 'customergroup'); ?>">CustomerGroup</a>
        <a class="nav-link float-end" href="<?php echo $this->getUrlObject()->getUrl('grid', 'paymentmethod'); ?>">PaymentMethod</a>
        <a class="nav-link float-end" href="<?php echo $this->getUrlObject()->getUrl('grid', 'shippingmethod'); ?>">ShippingMethod</a>
        <a class="nav-link float-end" href="<?php echo $this->getUrlObject()->getUrl('grid', 'cmsPage'); ?>">CMS Page</a>
        <a class="nav-link float-end" href="<?php echo $this->getUrlObject()->getUrl('grid', 'attribute'); ?>">Attribute</a>
        <!-- <a class="nav-link float-end" href="<?php// echo $this->getUrlObject()->getUrl('grid','admin'); ?>">Admin</a> -->
      </div>
    </div>
  </div>
</nav>