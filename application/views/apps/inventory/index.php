<table class="table">
    <form class="form-control" method="post" action="<?php echo site_url('inventory/add'); ?>">
        <tr>
            <td><input class="form-control" type="text" name="item" placeholder="Item name"/></td>
            <td style="width:140px">
                <select  name="location" class="form-control">
                    <option value="Other">--Location--</option>
                    <?php
                    $locations = $this->config->item('location');
                    foreach ($locations as $name):
                        echo '<option name="location" value="' . $name . '">' . $name . '</option>';
                    endforeach; ?>
                </select>

            </td>
            <td><input class="form-control" type="text" name="model" placeholder="Mfc/Model"/></td>
            <td><input class="form-control" type="text" name="serial" placeholder="Serial #"/></td>
            <td style="width:90px"><input class="form-control" type="text" name="price" placeholder="Price"/></td>
            <td style="width:90px"><input class="form-control" type="text" name="value" placeholder="Value"/></td>
            <td>
                <button class="btn btn-primary">Update</button>
            </td>
        </tr>
    </form>

</table>
<div class="spacer"></div>

<div class="spacer"></div>
<table class="table table-bordered table-responsive">
    <th>#</th>
    <th>Item</th>
    <th>Location</th>
    <th>Manf/Model</th>
    <th>Serial #</th>
    <th>Price</th>
    <th>Value</th>
    <th></th>
    <?php foreach ($items->result() as $row): ?>
        <tr>
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->item; ?></td>
            <td style="width:140px"><?php echo $row->location; ?></td>
            <td><?php echo $row->model; ?></td>
            <td><?php echo $row->serial; ?></td>
            <td style="width:50px"><?php echo $row->price; ?></td>
            <td style="width:50px"><?php echo $row->value; ?></td>
            <td>
                <a href="<?php echo site_url('inventory/edit/' . $row->id); ?>"><span
                        class="glyphicon glyphicon-pencil"></span></a>
                &nbsp;&nbsp;
                <a href="<?php echo site_url('inventory/delete/' . $row->id); ?>"><span
                        class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>