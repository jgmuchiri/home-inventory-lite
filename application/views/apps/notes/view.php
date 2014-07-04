<?php
foreach ($thisNote->result() as $row) {
    echo '<h3>' . $row->title . '</h3>
                <div style="float:right">
                    <a class="edit-note" id="'.$row->id.'" href="#"><span class="glyphicon glyphicon-pencil"></span></a>
                    &nbsp;&nbsp;
                    <a href="' . site_url('notes/delete/' . $row->id) . '"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
                ';
    echo '<hr/>';
    echo '<div>' . $row->content . '</div>';
}
?>

<script type="text/javascript">
    var editNote = '<?php echo site_url("notes/edit"); ?>/';
    $('.edit-note').click(function () {
        var id = $(this).attr('id');
        $('#notes-content').load(editNote + id);
    });
</script>