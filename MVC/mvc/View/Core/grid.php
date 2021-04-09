<?php
$collection = $this->getCollection();
$columns = $this->getColumns();
$buttons = $this->getButtons();
$actions = $this->getActions();
$title = $this->getTitle();
$tableName = $this->getTableName();
?>
<form method="POST">
    <div class="container">
        <?php if ($buttons) : ?>
            <?php foreach ($buttons as $key => $button) : ?>
                <button formaction="<?php echo $this->getButtonUrl($collection, $button['method']); ?>" class="btn btn-success float-end m-1">
                    <?php echo $button['label']; ?>
                </button>
            <?php endforeach; ?>
        <?php endif; ?>
        <h2 class="my-4">
            <?php if ($title) :
                echo $title;
            endif; ?>
        </h2>
        <hr>
    </div>
    <div class="container" id="gridTable">
        <h4><?php if (!$collection) :
                echo "No Record Found";
                die();
            endif; ?></h4>

        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <?php if ($columns) : ?>
                    <tr>
                        <?php foreach ($columns as $key => $column) : ?>
                            <th><?php echo $column['label'] ?></th>
                        <?php endforeach; ?>
                        <?php if ($actions) : ?>
                            <th colspan="<?php echo sizeof($actions); ?>">Actions</th>
                        <?php endif; ?>
                    </tr>
                <?php endif; ?>
            </thead>
            <tbody>
                <?php if ($columns) : ?>
                    <tr>
                        <?php foreach ($columns as $key => $column) : ?>
                            <th>
                                <input type="text" class="form-control" name="filter[<?= $tableName; ?>][<?php echo $column['field'] ?>]" value="<?php echo $column['filter'];
                                                                                                                                                    ?>" placeholder='Filter' />
                            </th>
                        <?php endforeach; ?>
                        <th colspan="<?php echo sizeof($actions); ?>"> </th>
                    </tr>
                <?php endif; ?>
                <?php if ($collection) : ?>
                    <?php foreach ($collection->getData() as $row) : ?>
                        <tr>
                            <?php if ($columns) : ?>
                                <?php foreach ($columns as $key => $column) : ?>
                                    <td><?php echo $this->getFieldValue($row, $column['field']); ?></td>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if ($actions) : ?>
                                <?php foreach ($actions as $key => $action) : ?>
                                    <td>
                                        <a href="<?php echo $this->getMethodUrl($row, $action['method']); ?>" class="btn btn-primary btn-sm rounded-2"><?php echo $action['label'] ?></a>
                                    </td>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</form>