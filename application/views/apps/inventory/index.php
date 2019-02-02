<?php
//return location name
function locationName($locID){
    $CI = & get_instance();
    $CI->db->where('id',$locID);
    $q = $CI->db->get('inventory_locations')->result();
    foreach($q as $r){
        return $r->loc;
    }
}

$counter = 1;
?>
<div class="input-group inventory-form"></div>

<div class="spacer"></div>

<div class="spacer"></div>
<table class="table table-bordered table-responsive">
    <th>#</th>
    <th>Item</th>
    <th>
        <a href="?sort=location">Location<span class="glyphicon glyphicon glyphicon-chevron-down"></span></a>
        &nbsp;
        <span class="glyphicon glyphicon-pencil loc-edit" data-toggle="tooltip" title="edit locations"></span>
    </th>
    <th>Manf/Model</th>
    <th>Serial #</th>
    <th><a href="?sort=price">Price<span class="glyphicon glyphicon glyphicon-chevron-down"></span></a></th>
    <th><a href="?sort=value">Value<span class="glyphicon glyphicon glyphicon-chevron-down"></span></a></th>
    <th class="alert-success">
        <a href="#" class="new-item label label-danger"><span class="glyphicon glyphicon-new-window"></span> new item
        </a>
    </th>

    <?php
    foreach ($items->result() as $row): ?>
        <tr>
            <td style="width:10px"><?php echo $counter++; ?></td>
            <td style="width:250px"><a href="#" class="item-img"
                                       id="<?php echo $row->id; ?>"><?php echo $row->item; ?></a></td>
            <td style="width:140px"><a href="?location=<?php echo $row->location; ?>"><?php echo locationName($row->location); ?></a>
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

<div class="modal fade myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>

            </div>
            <div class="modal-body">
                <p class="imgView"></p>
                <p class="locEditor"></p>
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
    //declare variables
    var inventoryEditor = '<?php echo site_url("inventory/edit_form"); ?>/';
    var createForm = '<?php echo site_url("inventory/create"); ?>';
    var viewImg = '<?php echo site_url("upload/view"); ?>/';
    var imgUploader = '<?php echo site_url("upload/index"); ?>/';
    var locEdit = '<?php echo site_url("inventory/locEdit"); ?>/';

    $(document).ready(function () {
        //load create item form by default
        $('.inventory-form').load(createForm);

        //create item form onclick
        $('.new-item').click(function () {
            $('.inventory-form').load(createForm);
        });

        //edit item form onclick
        $('.edit-inventory').click(function () {
            var inventoryID = $(this).attr('id');
            $('.inventory-form').load(inventoryEditor + inventoryID);
        });

        //view item images
        $('.item-img').click(function () {
            var itemID = $(this).attr('id');
            $('.myModal').modal('show');//activate modal window
            $('.locEditor').empty();
            $('.imgView').load(viewImg + itemID);
            $('.uploader').load(imgUploader + itemID);
        });

        //confirm delete
        $(".callConfirm").on("click", function (e) {
            e.preventDefault();
            var myID = $(this).attr('id');
            var msg = 'This will delete all files associated. Are you sure?';
            $(".delAlert").alert().modal('show');

            $('.deleteYes').click(function(){
                window.location.href = "<?php echo site_url('inventory/delete'); ?>/" + myID;
            });
            /*
            if(confirm(msg)){
                window.location.href = "<?php echo site_url('inventory/delete'); ?>/" + myID;
            }else{
                return false;
            }
            */

        });

        //edit locations tooltip
        $('.loc-edit').tooltip('hide');
        //edit locations form
        $('.loc-edit').click(function(){
            $('.myModal').modal('show');//activate modal window
            $('.imgView').empty();
            $('.locEditor').load(locEdit);
        });
    });


</script>

<div class="modal delAlert">
<div class="alert alert-danger fade in" role="alert" style="width:400px; margin:0 auto">
    <h4>Warning!</h4>
    <p>This will delete all files associated. Are you sure?</p>
    <p>
        <button type="button" class="btn btn-danger deleteYes">delete</button>
        <button type="button" data-dismiss="modal" class="btn btn-default">cancel</button>

    </p>
</div></div>