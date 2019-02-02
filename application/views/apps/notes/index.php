<div class="panel panel-primary" style="position: relative; height: 100%; float: left; width:100%; ">
    <div class="panel-heading">Notes
        <a class="newNote label label-danger" href="#">
            <span class="glyphicon glyphicon-new-window"></span> new note
        </a>
    </div>

    <div id="notes-sidebar">
        <ol class="list-unstyled">
            <?php
            foreach ($notes_list->result() as $row) {
                echo '<li><a  class="view-note" href="#" id="' . $row->id . '">' .
                    $row->title
                    .
                    '</a></li>';
            }
            ?>
        </ol>
    </div>
    <div class="spacer"></div>
    <div id="notes-content"></div>
    <div class="spacer"></div>
</div>

<script type="text/javascript">
    var newNote = '<?php echo site_url("notes/newNote"); ?>';
    var viewNote = '<?php echo site_url("notes/view"); ?>/';


    $('.newNote').click(function () {
        $('#notes-content').load(newNote);
    });
    $('.view-note').click(function () {
        var id = $(this).attr('id');
        $('#notes-content').load(viewNote + id);
    });
</script>