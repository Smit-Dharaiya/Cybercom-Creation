<?php 

$tabs = $this->getTabs();
$id = $this->getRequest()->getGet('id');

foreach ($tabs as $key => $tab) { ?>
    <a class="btn btn-primary m-4" href="<?php echo $this->getUrlObject()->getUrl(null,null,['tab' => $key,'id'=>$id]); ?>">
    	<?php echo $tab['label']; ?>
    </a>

<?php } 
?>