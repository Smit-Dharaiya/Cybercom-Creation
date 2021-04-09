<?php
$result = $this->getOptions();
?>
<script type="text/javascript" src="<?php echo  $this->baseUrl('Skin/Admin/Js/options.js') ?> "> </script>

<div class="container">
    <h2 class="  ">
        <?php //echo $this->getTitle();
        ?>
    </h2>
    <form action="<?php echo $this->getUrlObject()->getUrl('saveOption', null, null, true) ?>" method="POST">
        <button type="button" class="btn btn-primary float-end" onclick="addRow()">Add Option</button>
        <button type='submit' class="btn btn-primary float-end mx-3">Update</button>
        <table id="existingOption" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id </th>
                    <th>Attribute Id </th>
                    <th>Name</th>
                    <th>Sort Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php if ($result) : ?>
                    <?php foreach ($result->getData() as $row) : ?>
                        <tr>
                            <td><?php echo $row->id ?></td>
                            <td><input type="text" value="<?php echo $row->attributeId ?>" disabled></td>
                            <td><input type="text" value="<?php echo $row->name ?>" name="option[<?php echo ($row->id) ? 'exist' : 'new'; ?>][<?php echo $row->id ?>][name]"></td>
                            <td><input type="text" value="<?php echo $row->sortOrder ?>" name="option[<?php echo ($row->id) ? 'exist' : 'new'; ?>][<?php echo $row->id ?>][sortOrder]"></td>
                            <td><a <?php if ($row->id) : ?> href="<?php echo $this->getUrlObject()->getUrl('deleteOption', NULL, ['id' => "$row->id"], true); ?>" <?php else : ?> onclick="removeRow()" <?php endif; ?>><i class="fas fa-trash-alt"></i></a></td>
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
                                                    echo $result->getData()[0]->attributeId;
                                                } ?>" disabled></td>
                <td><input type="text" name="option[new][name][]"></td>
                <td><input type="text" name="option[new][sortOrder][]"></td>
                <td><a onclick="removeRow(this)"><i class="fas fa-trash-alt" style="color:tomato"></i></a></td>
            </tr>
        </tbody>
    </table>
</div>