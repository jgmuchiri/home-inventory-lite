<style>
    #notes-sidebar {
        height: 100%;
        overflow: auto;
        border: solid 0px 1px 0px 0px #428bca;
        padding: 5px 0px;
        margin: 0px 5px 0px 0px;

        float: left;
        width: 210px;
        font-size: 12px;
        color: #000000;
        text-align: left;

        -moz-box-shadow: 3px 0px 5px 0px #428bca;
        -webkit-box-shadow: 3px 0px 5px 0px #428bca;
        box-shadow: 3px 0px 5px 0px #428bca;
    }

    #notes-sidebar a {
        margin: 0px 0px 5px 0px;
        display: block;
        background: #f0f0f0;
        width: 100%;
        padding: 3px;
    }

    #notes-sidebar a:hover {
        background: #428bca;
        color: #FFFFFF;
    }

    #content {
        font-size: 12px;
        color: #000000;
        text-align: left;
        margin-left: 215px;
        background-color: #FFFFFF;
        padding: 0px 10px;
    }

    .newNote {
        color: #FFFFFF;
        float: right;
    }

    .newNote:hover {
        color: #ccc;
    }
</style>
<div class="panel panel-primary" style="position: relative; height: 100%; float: left; width:100%; ">
    <div class="panel-heading">Notes
        <a class="newNote" href="<?php echo site_url('notes/create'); ?>">
            [new note]
        </a>
    </div>

    <div id="notes-sidebar">
        <ol class="list-unstyled">
            <?php
            foreach ($notes_list->result() as $row) {
                echo '<li><a href="' . site_url('notes/index/' . $row->id . '') . '" id="' . $row->id . '" class="">' .
                    $row->title
                    .
                    '</a></li>';
            }
            ?>
        </ol>
    </div>

    <div id="content">
        <?php
        foreach ($thisNote->result() as $row) {
            echo '<h3>' . $row->title . '</h3>
                <div style="float:right">
                    <a href="' . site_url('notes/edit/' . $row->id) . '"><span class="glyphicon glyphicon-pencil"></span></a>
                    &nbsp;&nbsp;
                    <a href="' . site_url('notes/delete/' . $row->id) . '"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
                ';
            echo '<hr/>';
            echo '<div>' . $row->content . '</div>';
        }
        ?>

    </div>
    <div class="spacer"></div>
</div>