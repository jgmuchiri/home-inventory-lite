<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="active"><a href="<?php echo site_url(); ?>">Home</a></li>
        <?php
        // Enter list of apps with their names
        $apps = array(
            'documents' => 'My Documents',
            'tasks'     => 'Task List',
            'notes'     => 'Notes/Journal',
            'inventory' => 'Inventory',
            'recipes'   => 'Recipes',
            'manuals'   => 'Manuals'
        );
        foreach ($apps as $link => $name) {
            echo '<li><a href="' . site_url($link) . '">' . $name . '</a>';
        }
        ?>
    </ul>

</div>