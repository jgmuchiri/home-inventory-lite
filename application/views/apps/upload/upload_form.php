<?php echo form_open_multipart('upload/do_upload', 'class="input-group"'); ?>
    <input type="hidden" name="inventoryID" value="<?php echo $inventoryID; ?>"/>
    <span>
    <input class="form-control" type="file" name="userfile" size="20"/>
</span>

    <span class="input-group-btn">
    <button class="btn btn-info" type="submit">upload</button>
</span>

<?php echo form_close(); ?>