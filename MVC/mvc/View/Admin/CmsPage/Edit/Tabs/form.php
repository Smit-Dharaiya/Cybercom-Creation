<?php
$cmsPage = $this->getTableRow();
?>
<div class="container">

    <form method="POST" class="w-50" action="<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>">
        <hr>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Title</b></span>
            <input type="text" class="form-control   " name="cmsPage[title]" id="title" placeholder="CMS Page title" value="<?php echo $cmsPage->title; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Identifier</b></span>
            <input type="text" class="form-control   " name="cmsPage[identifier]" id="identifier" placeholder="CMS Page Identifier" value="<?php echo $cmsPage->identifier; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Content</b></span>
            <textarea id="editor" name="cmsPage[content]"><?php echo $cmsPage->content; ?></textarea>
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Status</b></span>
            <select class="custom-select    form-control" name="cmsPage[status]">
                <?php
                foreach ($cmsPage->getStatusOptions() as $key => $value) { ?>
                    <option class="form-control" value="<?php echo $key; ?>" <?php if ($cmsPage->status == $key) echo "selected"; ?>>
                        <?php echo $value; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <button name="submit" id="submit" class="btn btn-primary   "><?php echo $this->getButton(); ?></button>
        <br><br>
    </form>
</div>