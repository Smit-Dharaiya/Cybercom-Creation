<table width="100%">
    <tr width=" 100%">
        <td width="10%" class="float-start"><?php echo $this->getTabHtml(); ?></td>
        <td width="90%">
            <form action=" <?php $this->getFormUrl(); ?>" enctype="multipart/form-data">
            </form>
            <h2 class="m-4"><?php $this->getTitle(); ?></h2>
            <hr>
            <?php echo $this->getTabContent()->toHtml();
            ?>
        </td>
    </tr>
</table>