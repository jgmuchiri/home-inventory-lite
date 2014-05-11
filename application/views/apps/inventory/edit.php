<table class="table">
    <?php
        foreach($item->result() as $row):
    ?>
    <form class="form-control" method="post" action="<?php echo site_url('inventory/edit/'.$row->id); ?>">
        <tr>
            <td><input class="form-control" type="text" name="item" value="<?php echo $row->item; ?>" placeholder="Item name"/></td>
            <td style="width:140px">
                <select name="location" class="form-control">
                    <option value="Other">--Location--</option>
                    <?php
                    function selected($item1,$item2){
                        if($item1==$item2){
                            return ' selected ';
                        }
                    }
                    $locations = $this->config->item('location');
                    foreach ($locations as $name):
                        echo '<option '.selected($name, $row->location).' name="location" value="' . $name . '">' . $name . '</option>';
                    endforeach; ?>
                </select>
            </td>
            <td><input class="form-control" type="text" name="model" value="<?php echo $row->model; ?>" placeholder="Mfc/Model"/></td>
            <td><input class="form-control" type="text" name="serial" value="<?php echo $row->serial; ?>" placeholder="Serial #"/></td>
            <td style="width:90px"><input class="form-control" type="text" name="price" value="<?php echo $row->price; ?>" placeholder="Purchase price"/></td>
            <td style="width:90px"><input class="form-control" type="text" name="value" value="<?php echo $row->value; ?>" placeholder="Current Value"/></td>
            <td><button class="btn btn-primary">Update</button></td>
        </tr>
        <?php
            endforeach;
        ?>
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
    <?php
    $count=0;
    foreach($list->result() as $row): ?>
        <tr>
            <td><?php
                for($i=1; $i<$count; $i++){
                    echo $count;
                }

                $count++;
               ?></td>
            <td><?php echo $row->item; ?></td>
            <td style="width:140px"><?php echo $row->location; ?></td>
            <td><?php echo $row->model; ?></td>
            <td><?php echo $row->serial; ?></td>
            <td style="width:50px"><?php echo $row->price; ?></td>
            <td style="width:50px"><?php echo $row->value; ?></td>
            <td>
                <a href="<?php echo site_url('inventory/edit/' . $row->id); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                &nbsp;&nbsp;
                <a href="<?php echo site_url('inventory/delete/' . $row->id); ?>"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>