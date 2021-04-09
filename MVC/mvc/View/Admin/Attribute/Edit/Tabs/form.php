<?php
$attribute = $this->getTableRow();
$BackendTypeOptions = $this->getBackendTypeOptions();
$inputTypeOptions = $this->getinputTypeOptions();
$entityTypeOptions = $this->getEntityTypeOptions();
?>
<div class="container">

    <form method="POST" class="w-50" action="<?php echo $this->getUrlObject()->getUrl('save', null, null, true); ?>">
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>EntityTypeId</b></span>
            <select class="custom-select form-control" name="attribute[entityTypeId]" id='entityTypeId'>
                <?php foreach ($entityTypeOptions as $key => $value) : ?>
                    <option class="form-control" value="<?php echo $key; ?>" <?php if ($attribute->entityTypeId == $key) echo "selected"; ?>>
                        <?php echo $value; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Name</b></span>
            <input type="text" class="form-control" name="attribute[name]" id="name" placeholder="Attribute Name" value="<?php echo $attribute->name; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>Code</b></span>
            <input type="text" class="form-control" name="attribute[code]" id="code" placeholder="Code" value="<?php echo $attribute->code; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>InputType</b></span>
            <select class="custom-select form-control" name="attribute[inputType]" id='inputType'>
                <?php foreach ($inputTypeOptions as $key => $value) : ?>
                    <option class="form-control" value="<?php echo $key; ?>" <?php if ($attribute->inputType == $key) echo "selected"; ?>>
                        <?php echo $value; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>BackendType</b></span>
            <select class="custom-select form-control   " name="attribute[backendType]" id='backendType'>
                <?php foreach ($BackendTypeOptions as $key => $value) : ?>
                    <option class="form-control" value="<?php echo $key; ?>" <?php if ($attribute->backendType == $key) : echo "selected";
                                                                                endif; ?>>
                        <?php echo $value; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>BackendModel</b></span>
            <input type="text" class="form-control   " name="attribute[backendModel]" id="backendModel" placeholder="backendModel" value="<?php echo $attribute->backendModel; ?>">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" style="width: 20%"><b>SortOrder</b></span>
            <input type="text" class="form-control   " name="attribute[sortOrder]" id="sortOrder" placeholder="sortOrder" value="<?php echo $attribute->sortOrder; ?>">
        </div>
        <a href="<?php echo $this->getUrlObject()->getUrl('grid'); ?>" name="back" id="back" class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left fa=sm"></i> Back</a>
        <button name="submit" id="submit" class="btn btn-primary mx-2"><?php echo $this->getButton(); ?></button>
        <br><br>
    </form>
</div>