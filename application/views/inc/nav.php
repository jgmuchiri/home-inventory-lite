<div class="btn-group">
    <?php
        $links = array(
           'tasks'=>'tasks',
            'notes'=>'notes',
            'inventory'=>'inventory'
        );
    foreach($links as $link=>$name){
        echo anchor($link,$name,'class="btn btn-info"');
    }
    ?>
</div>
<hr/>