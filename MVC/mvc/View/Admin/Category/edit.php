<?php
$category = $this->getCategory();
?>
<div>
<h2><center><?php $this->getTitle(); ?></center></h2>
<center>
   <form class="border border-secondary border-1 w-50" method="POST" action="<?php echo $this->getUrl("save", null, ['id' => $category->id],true); ?>">
    <?php echo $this->getTabContent()->toHtml(); ?> 
   </form>
</center>
</div>    


