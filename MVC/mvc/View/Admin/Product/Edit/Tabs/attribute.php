<?php
$product = $this->getTableRow();
$attributes = $this->getAttributes();
?>
<h4>
    <div class="container">
        <form method="POST" class="w-50" action="<?php echo $this->getUrlObject()->getUrl("save", null, null, true); ?>">
            <hr>
            <?php foreach ($attributes->getData() as $key => $value) : ?>
                <?php if ($value->inputType == "checkbox") : ?>
                    <?php $options = $this->getOptions($value->id) ?>
                    <span class="input-group-text" style="width: 20%"><b><?php echo $value->name; ?></b></span>
                    <?php foreach ($options->getData() as $key1 => $option) : ?>
                        <div class="form-check my-3">
                            <input type="checkbox" class="form-check-input" name="product[<?php echo $value->name; ?>][]" id="<?php echo $value->name; ?>" value="<?php echo $option->name ?>">
                            <span class="input-group-text" style="width: 20%"><b><?php echo $option->name ?></b></span>
                        </div>
                    <?php endforeach; ?>

                <?php elseif ($value->inputType == 'radio') : ?>
                    <?php $options = $this->getOptions($value->id) ?>

                    <span class="input-group-text" style="width: 20%"><b><?php echo $value->name; ?></b></span>
                    <?php foreach ($options->getData() as $key1 => $option) : ?>
                        <div class="form-check my-3">
                            <input type="radio" class="form-check-input" name="product[<?php echo $value->name; ?>]" id="<?php echo $value->name; ?>" value="<?php echo $option->name ?>">
                            <span class="input-group-text" style="width: 20%"><b><?php echo $option->name ?></b></span>
                        </div>
                    <?php endforeach; ?>

                <?php elseif ($value->inputType == 'select') : ?>
                    <?php $options = $this->getOptions($value->id) ?>

                    <span class="input-group-text" style="width: 20%"><b><?php echo $value->name; ?></b></span>
                    <select class="custom-select form-control" name="product[<?php echo $value->name; ?>]" id="<?php echo $value->name; ?>">
                        <option value="0" disabled selected>Select <?php echo $value->name; ?></option>
                        <?php foreach ($options->getData() as $key1 => $option) : ?>
                            <div class="form-check my-3">
                                <option value="<?php echo $option->name ?>"><?php echo $option->name ?></option>
                            </div>
                        <?php endforeach; ?>
                    </select>

                <?php elseif ($value->inputType == 'text') : ?>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" style="width: 20%"><b><?php echo $value->name; ?></b></span>
                        <input type="text" class="form-control" name="product[<?php echo $value->name; ?>]" id="<?php echo $value->name; ?>" placeholder="Enter">
                    </div>

                <?php elseif ($value->inputType == 'textarea') : ?>
                    <?php $options = $this->getOptions($value->id) ?>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" style="width: 20%"><b><?php echo $value->name; ?></b></span>
                        <textarea class="form-control" name="product[<?php echo $value->name; ?>]" id="<?php echo $value->name; ?>" cols="30" rows="5"></textarea>
                    </div>

                <?php endif; ?>
            <?php endforeach; ?>
            <br><br>
            <a href="<?php echo $this->getUrlObject()->getUrl('grid'); ?>" name="back" id="back" class="btn btn-dark"><i class="fas fa-arrow-alt-circle-left fa=sm"></i> Back</a>
            <button name="submit" id="submit" class="btn btn-primary my-3"><?php echo $this->getButton(); ?></button>
        </form>

    </div>