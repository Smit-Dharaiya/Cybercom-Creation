<?php
// $customer = $this->getCustomer();
$collection = $this->getCollection();
$columns = $this->getColumns();
$buttons = $this->getButtons();
$actions = $this->getActions();
$title = $this->getTitle();
$customerList = $this->getCustomerList();
$products = $this->getProduct();
?>
<form method="POST">
    <div class="container my-4">
        <h2 class="my-4">
            <?php if ($title) :
                echo $title;
            endif; ?>
            <?php if ($buttons && $collection) : ?>
                <?php foreach ($buttons as $key => $button) : ?>
                    <?php if ($key != 'checkout') : ?>
                        <button formaction="<?php echo $this->getButtonUrl($collection->getData()[0], $button['method']); ?>" class="btn btn-success float-end ms-2">
                            <?php echo $button['label']; ?>
                        </button>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </h2>
        <hr>
        <div class="column my-4">
            <div class="col-md-10 float-start">
                <select class="form-control my-2" name="activeCustomer">
                    <option value="">Select Customer</option>
                    <?php foreach ($customerList as $Key => $customer) : ?>
                        <option value="<?= $customer->id ?>" <?php if ($this->getActiveCustomerId() == $customer->id) {
                                                                    echo 'selected';
                                                                } ?>><?= $customer->firstName ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2 float-end my-2">
                <button type="submit" class="btn btn-primary mx-2" formaction="<?php echo $this->getActiveCustomerActionUrl(); ?>">Go</button>
            </div>
        </div>
    </div>
    <div class="container my-4" id="gridTable">
        <?php if (!$collection) : ?>
            <h4 class="my-5"> No Items Found</h4>
            <?php die; ?>
        <?php endif; ?>


        <table class="table table-striped table-hover table-inverse table-responsive">
            <thead>
                <?php if ($columns) : ?>
                    <tr>
                        <?php foreach ($columns as $key => $column) : ?>
                            <th><?php echo $column['label'] ?></th>
                        <?php endforeach; ?>
                        <?php if ($actions) : ?>
                            <th colspan="<?= sizeof($actions) ?>">Actions</th>
                        <?php endif; ?>
                    </tr>
                <?php endif; ?>
            </thead>
            <tbody>
                <?php if ($columns) : ?>
                    <tr>
                        <?php foreach ($columns as $key => $column) : ?>
                            <th>
                                <input type="<?php echo $column['type'] ?>" class="filter form-control" name="filter[<?php echo $column['field']; ?>]" value="<?php echo $column['filter']; ?>" placeholder='Filter' />
                            </th>
                        <?php endforeach; ?>
                        <th colspan="<?= sizeof($actions) ?>"> </th>
                    </tr>
                <?php endif; ?>
                <?php if ($collection) : ?>
                    <?php foreach ($collection as $row) : ?>
                        <tr>
                            <?php if ($columns) : ?>
                                <?php foreach ($columns as $key => $column) : ?>
                                    <td><?php echo $this->getFieldValue($row, $column['field']); ?></td>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if ($actions) : ?>
                                <?php foreach ($actions as $key => $action) : ?>
                                    <td>
                                        <a href="<?php echo $this->getMethodUrl($row, $action['method']); ?>" type="button" class="btn btn-primary btn-sm rounded-2"><?php echo $action['label'] ?></a>
                                    </td>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    <!-- <tr>
                        <td colspan="4"></td>
                        <td>Total</td>
                        <td colspan="4">Hi</td>
                    </tr> -->
                <?php endif; ?>
            </tbody>
        </table>
        <button formaction="<?php echo $this->getButtonUrl($collection->getData()[0], $buttons['checkout']['method']); ?>" class="btn btn-success float-end ms-2">
            <?php echo $button['label']; ?>
        </button>
    </div>

</form>