<?php echo form_open('inventory/add'); ?>

<input style="width:220px" class="form-control" type="text" name="item" placeholder="Item name"/>
<select style="width:125px"  name="location" class="form-control">
    <option value="Other">--Location--</option>
    <?php
    $locations = $this->config->item('location');
    foreach ($locations as $name):
        echo '<option name="location" value="' . $name . '">' . $name . '</option>';
    endforeach; ?>
</select>
<input style="width:160px" class="form-control" type="text" name="model" placeholder="Mfc/Model"/>
<input style="width:150px" class="form-control" type="text" name="serial" placeholder="Serial #"/>
<input style="width:90px" class="form-control" type="text" name="price" placeholder="Price"/>
<input style="width:80px" class="form-control" type="text" name="value" placeholder="Value"/>
<button style="width:80px" class="form-control btn btn-info">submit</button>

<?php echo form_close(); ?>