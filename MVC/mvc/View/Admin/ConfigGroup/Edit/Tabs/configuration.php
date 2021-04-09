<?php
$result = $this->getConfigurations();
?>
<script type="text/javascript" src="<?php echo  $this->baseUrl('Skin/Admin/Js/options.js') ?> "> </script>

<div class="container">
    <h2 class="  ">
        <?php //echo $this->getTitle();
        ?>
    </h2>
    <form action="<?php echo $this->getUrlObject()->getUrl('saveConfig', null, null, true) ?>" method="POST">
        <button type="button" class="btn btn-primary float-end" onclick="addRow()">Add Config</button>
        <button type='submit' class="btn btn-primary float-end mx-3">Update</button>
        <table id="existingOption" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Config Id </th>
                    <th>Config Group Id</th>
                    <th>Title</th>
                    <th>Code</th>
                    <th>Value</th>
                    <th>Created Date</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php if ($result) : ?>
                    <?php foreach ($result->getData() as $row) : ?>
                        <tr>
                            <td><?php echo $row->id ?></td>
                            <td><input type="text" value="<?php echo $row->groupId ?>" disabled></td>
                            <td><input type="text" value="<?php echo $row->title ?>" name="config[exist][<?php echo ($row->id) ?>][title]"></td>
                            <td><input type="text" value="<?php echo $row->code ?>" name="config[exist][<?php echo ($row->id) ?>][code]"></td>
                            <td><input type="text" value="<?php echo $row->value ?>" name="config[exist][<?php echo ($row->id) ?>][value]"></td>
                            <td><input type="text" value="<?php echo $row->createdDate ?>" name="config[exist][<?php echo ($row->id) ?>" disabled></td>
                            <td><a <?php if ($row->id) : ?> href="<?php echo $this->getUrlObject()->getUrl('deleteConfig', NULL, ['id' => $row->id], true); ?>" <?php else : ?> onclick="removeRow()" <?php endif; ?>><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </form>
</div>
<div style="display:none">
    <table id="newOption" class="table table-striped table-hover">
        <tbody>
            <tr>
                <td><input type="text" value="<?php echo '*'; ?>" disabled></td>
                <td><input type="text" value="<?php if ($result) {
                                                    echo $result->getData()[0]->groupId;
                                                } ?>" disabled></td>
                <td><input type="text" name="config[new][title][]"></td>
                <td><input type="text" name="config[new][code][]"></td>
                <td><input type="text" name="config[new][value][]"></td>
                <td></td>
                <td><a onclick="removeRow(this)"><i class="fas fa-trash-alt" style="color:tomato"></i></a></td>
            </tr>
        </tbody>
    </table>
</div>