<?php
$category = $this->getTableRow();
$categoryOptions = $this->getCategoryOptions();
?>
<div class="container">

    <form method="POST" class="w-50" action="<?php echo $this->getUrlObject()->getUrl('save', null, null, true); ?>">
        <hr>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Root Category</b></span>
            <select class="custom-select form-control" name="category[parentId]">
                <?php if ($categoryOptions) : ?>
                    <?php foreach ($categoryOptions as $id => $categoryName) : ?>
                        <option value="<?php echo $id; ?>" <?php if ($category->parentId == $id) {
                                                                echo "selected";
                                                            }
                                                            ?>> <?php echo $categoryName; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Category Name</b></span>
            <input type="text" class="form-control" name="category[categoryName]" id="sku" placeholder="CategoryName" value="<?php echo $category->categoryName; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Description</b></span>
            <input type="text" class="form-control" name="category[description]" id="name" placeholder="Description" value="<?php echo $category->description; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Status</b></span>
            <select class="custom-select    form-control" name="category[categoryStatus]">
                <?php
                foreach ($category->getStatusOptions() as $key => $value) {
                ?>
                    <option class="form-control" value="<?php echo $key; ?>" <?php if ($category->categoryStatus == $key) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>>
                        <?php echo $value; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <button name="submit" id="submit" class="btn btn-primary   "><?php echo $this->getButton(); ?></button>
        <br><br>
    </form>
</div>