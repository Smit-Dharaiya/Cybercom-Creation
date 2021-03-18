<?php
$result = $this->getPaymentMethods();
?>

<div class="container">
  <a class="btn btn-success float-end m-4" href="<?php echo $this->getUrl('form', NULL, NULL, TRUE); ?>">Add Payment Method</a>
  <br><br>
  <h2><?php echo $this->getTitle(); ?></h2>
  <h3><?php if (!$result) {
        echo "No Record Found";
        die();
      } ?></h3>
  <table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
      <tr>
        <th>Id</th>
        <th>Payment Name</th>
        <th>Payment Code</th>
        <th>Payment Description</th>
        <th>Payment Status</th>
        <th>Created Date</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <strong>
        <?php
        foreach ($result->getData() as $row) {
        ?> </strong>
      <tr>
        <td><?php echo $row->id ?></td>
        <td><?php echo $row->name ?></td>
        <td><?php echo $row->code ?></td>
        <td><?php echo $row->description ?></td>
        <td><?php
            if ($row->status)
              echo "Enable";
            else
              echo "Disable";
            ?>
        <td><?php echo $row->createdDate ?></td>
        </td>
        <td><a href="<?php echo $this->getUrl('form', NULL, ['id' => "$row->id"], TRUE); ?>"><i class="fas fa-pencil" aria-hidden="true"></i></a></td>
        <td><a href="<?php echo $this->getUrl('delete', NULL, ['id' => "$row->id"], TRUE); ?>"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></td>
      </tr>

    <?php
        }
    ?>
    </tbody>
  </table>
</div>