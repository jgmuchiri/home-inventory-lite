<div class="input-group inventory-form"></div>

<div class="spacer"></div>

<div class="spacer"></div>
<table class="table table-bordered table-responsive">
    <th>#</th>
    <th>Item</th>
    <th><a href="?sort=location">Location<span class="glyphicon glyphicon glyphicon-chevron-down"></span></a></th>
    <th>Manf/Model</th>
    <th>Serial #</th>
    <th><a href="?sort=price">Price<span class="glyphicon glyphicon glyphicon-chevron-down"></span></a></th>
    <th><a href="?sort=value">Value<span class="glyphicon glyphicon glyphicon-chevron-down"></span></a></th>
    <th class="alert-success">
        <a href="#" class="new-item label label-danger"><span class="glyphicon glyphicon-new-window"></span> new item
        </a>
    </th>
    <?php
    $counter = 1;
    foreach ($items->result() as $row): ?>
        <tr>
            <td style="width:10px"><?php echo $counter++; ?></td>
            <td style="width:250px"><a href="#" class="item-img"
                                       id="<?php echo $row->id; ?>"><?php echo $row->item; ?></a></td>
            <td style="width:140px"><a href="?location=<?php echo $row->location; ?>"><?php echo $row->location; ?></a>
            </td>
            <td style="width:120px"><?php echo $row->model; ?></td>
            <td style="width:100px"><?php echo $row->serial; ?></td>
            <td style="width:65px"><?php echo $row->price; ?></td>
            <td style="width:65px"><?php echo $row->value; ?></td>
            <td style="width:50px">
                <a class="edit-inventory" href="#" id="<?php echo $row->id; ?>"><span
                        class="glyphicon glyphicon-pencil"></span></a>
                &nbsp;&nbsp;
                <a href="#" class="callConfirm" id="<?php echo $row->id; ?>"><span
                        class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="imgViewer modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>

            </div>
            <div class="modal-body">
                <p class="imgView"></p>
            </div>
            <div class="modal-footer">
                <p class="uploader"></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    var inventoryEditor = '<?php echo site_url("inventory/edit_form"); ?>/';
    var createForm = '<?php echo site_url("inventory/create"); ?>';
    var viewImg = '<?php echo site_url("upload/view"); ?>/';
    var imgUploader = '<?php echo site_url("upload/index"); ?>/';

    $(document).ready(function () {
        //$('.inventory-form').load(createForm);
        $('.inventory-form').load(createForm);
        $('.edit-inventory').click(function () {
            var inventoryID = $(this).attr('id');
            $('.inventory-form').load(inventoryEditor + inventoryID);
        });
        $('.new-item').click(function () {
            $('.inventory-form').load(createForm);
        });
        $('.item-img').click(function () {
            var itemID = $(this).attr('id');
            $('.imgViewer').modal('show');
            $('.imgView').load(viewImg + itemID);
            $('.uploader').load(imgUploader + itemID);
        });

        $(".callConfirm").on("click", function (e) {
            e.preventDefault();
            var myID = $(this).attr('id');
            confirm('This will delete all files associated. Are you sure?');
            window.location.href = "<?php echo site_url('inventory/delete'); ?>/" + myID;
        });
    });


</script>