<div class="panel panel-primary" style="float: left; width:400px">
    <div class="panel-heading">
        <h3 class="panel-title">New task</h3>
    </div>
    <form class="add-new-task" autocomplete="off" action="<?php echo site_url('tasks/add'); ?>" method="post">
        <input type="text" name="task_name" placeholder="Add a new item..."/>
    </form>
</div>

    <div class="task panel panel-primary" style="float:right">
        <div class="panel-heading">
            <h3 class="panel-title">Task List</h3>
        </div>

        <div class="panel-body">
            <?php foreach ($tasks->result() as $row): ?>
                <div class="input-group">
                    <div class="input-group-addon">
                        <input type="checkbox">
                    </div>
                    <input type="text" class="form-control" value="<?php echo $row->name; ?>">

                    <div class="input-group-addon">
                        <a href="<?php echo site_url('tasks/delete/'.$row->id); ?>"><span id="<?php echo $row->id; ?>"
                                                                                          class="delete-button glyphicon
                glyphicon-remove"></span></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>