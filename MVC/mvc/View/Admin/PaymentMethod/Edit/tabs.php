<?php 

$tabs = $this->getTabs();

foreach ($tabs as $key => $tab) { ?>
    <a class="btn btn-primary m-4" href="<?php echo $this->getUrlObject()->getUrl(null,null,['tab' => $key]); ?>">
    	<?php echo $tab['label']; ?>
    </a>
<?php } ?>