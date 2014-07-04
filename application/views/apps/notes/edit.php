<?php
foreach ($thisNote->result() as $row):
    echo form_open('notes/edit/' . $row->id);
    ?>
    <input type="text" class="form-control" value="<?php echo $row->title; ?>" name="title" placeholder="Enter
    note title...">

    <div class="spacer"></div>
    <textarea id="editor" class="form-control" rows="15" name="content"
              placeholder="Enter contents"><?php echo $row->content; ?></textarea>

    <div class="spacer"></div>
    <button class="btn btn-primary">Submit</button>

    <?php echo form_close(); ?>

<?php
endforeach;
?>
<?php echo $this->conf->editor('editor'); //insert wysiwyg editor ?>