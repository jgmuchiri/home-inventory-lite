<?php
foreach ($item->result() as $row):
    ?>

    <div class="input-group inventory-form">
        <?php echo form_open('inventory/edit/' . $row->id); ?>

        <input style="width:220px" class="form-control" type="text" name="item" value="<?php echo $row->item; ?>"
               placeholder="Item name"/>
        <select style="width:125px" name="location" class="form-control">
            <option value="Other">--Location--</option>
            <?php
            function selected($item1, $item2)
            {
                if ($item1 == $item2) {
                    return ' selected ';
                }
            }

            $locations = $this->config->item('location');
            foreach ($locations as $name):
                echo '<option ' . selected($name, $row->location) . ' name="location" value="' . $name . '">' . $name . '</option>';
            endforeach; ?>
        </select>
        <input style="width:160px" class="form-control" type="text" name="model" value="<?php echo $row->model; ?>"
               placeholder="Mfc/Model"/>
        <input style="width:150px" class="form-control" type="text" name="serial" value="<?php echo $row->serial; ?>"
               placeholder="Serial #"/>
        <input style="width:90px" class="form-control" type="text" name="price" value="<?php echo $row->price; ?>"
               placeholder="Price"/>
        <input style="width:80px" class="form-control" type="text" name="value" value="<?php echo $row->value; ?>"
               placeholder="Value"/>
        <button style="width:80px" class="form-control btn btn-info">update</button>

        <?php echo form_close(); ?>
    </div>

<?php
endforeach;
?>