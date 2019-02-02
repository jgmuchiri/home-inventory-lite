<div class="spacer"></div>
<?php echo form_open('notes/create'); ?>
<input type="text" class="form-control" value="<?php echo set_value('title'); ?>" name="title" placeholder="Enter
    note title...">
<div class="spacer"></div>
<textarea class="form-control" id="editor" rows="15" name="content" placeholder="Enter contents"><?php echo set_value
    ('content'); ?></textarea>
<div class="spacer"></div>
<button class="btn btn-primary">Submit</button>

<?php echo form_close(); ?>
<div class="spacer"></div>

<?php echo $this->conf->editor('editor'); //insert wysiwyg editor ?>