<?php $this->conf->inc('header'); ?>
    <style>
        .task {
            font: normal 14px 'Open Sans', Arial, sans-serif;
            color: #999;
            background: #f1f1f1;
            max-width: 400px;
        }

        .add-new-task input[type='text'] {
            width: 99%;
            font: normal 1.2em 'Open Sans', Arial, sans-serif;
            color: #999;
            box-shadow: 2px 2px 0px #ddd;
            border: none;
            display: block;
            padding: 12px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            margin-left: 1px;
        }

        :focus {
            outline: 0;
        }

        .task .input-group {
            margin-bottom: 3px;
        }
    </style>

<?php echo validation_errors(); ?>
<div class="task panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Task List</h3>
    </div>
    <form class="add-new-task" autocomplete="off" action="<?php echo site_url('tasks/add'); ?>" method="post">
        <input type="text" name="task_name" placeholder="Add a new item..."/>
    </form>
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

<?php $this->conf->inc('footer'); ?>