<?php
$row = $this->getMedia();
$id = $this->getRequest()->getGet('id');
?>

<div class="container">
    <form method="POST" enctype="multipart/form-data" action="<?php echo $this->getUrlObject()->getUrl('update', 'productMedia', NULL, TRUE); ?>">
        <input class="btn btn-success float-end m-4" type="submit" value="Update" formaction="<?php echo $this->getUrlObject()->getUrl('update', 'productMedia', ['id' => $id]); ?>">
        <input class="btn btn-success float-end m-4" type="submit" value="Remove" formaction="<?php echo $this->getUrlObject()->getUrl('delete', 'productMedia', ['id' => $id]); ?>">

        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Image</th>
                    <th>Label</th>
                    <th>Small</th>
                    <th>Thumb</th>
                    <th>Base</th>
                    <th>Gallery</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <h3><?php if (!$row) : echo "No Record Found";  ?></h3>
            <?php else : ?>
                <?php foreach ($row->getData() as $key => $value) : ?>
                    <tr>
                        <th><img src="Uploads\Product\<?php echo $value->image ?>" name="img[name]" height="100" width="100"></th>
                        <th><input type="text" name="img[data][<?php echo $value->id ?>][label]" value="<?php echo $value->label ?>"></th>
                        <th><input type="radio" name="img[small]" value="<?php echo $value->id ?>" <?php echo $value->small ? "checked" : "" ?>></th>
                        <th><input type="radio" name="img[thumb]" value="<?php echo $value->id ?>" <?php echo $value->thumb ? "checked" : "" ?>></th>
                        <th><input type="radio" name="img[base]" value="<?php echo $value->id ?>" <?php echo $value->base ? "checked" : "" ?>></th>
                        <th><input type="checkbox" name="img[data][<?php echo $value->id ?>][gallery]" value="1" <?php echo $value->gallery ? "checked" : "" ?>></th>
                        <th><input type="checkbox" name="img[data][<?php echo $value->id ?>][remove]" value="<?php echo $value->id ?>"></th>
                    </tr>
                <?php endforeach; ?>

            <?php endif;  ?>
            </tbody>
        </table>
        <div>
            <div class="col-md-8 float-start">
                <input type="file" class="form-control   " name="image">
            </div>
            <div class="col-md-4 float-end">
                <input class="btn btn-success float-end m-4" type="submit" value="Upload" formaction="<?php echo $this->getUrlObject()->getUrl('save', 'productMedia', ['id' => $id]); ?>">
                <a href="<?php echo $this->getUrlObject()->getUrl('grid', 'product', null, true); ?>" name="back" id="back" class="btn btn-dark float-end my-4"><i class="fas fa-arrow-alt-circle-left fa=sm"></i> Back</a>
            </div>
        </div>
    </form>
</div>