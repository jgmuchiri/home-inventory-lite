<ol class="breadcrumb alert-info">
    <?php
    $links = array(
        'inventory'=>'inventory',
        'tasks'=>'tasks',
        'notes'=>'notes'
    );

    //highlight the current nav link
    function navActive($arg){
        $ci = & get_instance();
        if($ci->uri->segment(1)==$arg){
            return 'label label-default';
        }else{
            return 'label label-info';
        }
    }

    foreach($links as $link=>$name){
        echo '<li>'.anchor($link,$name,'class="'.navActive($name).'"').'</li>';
    }
    ?>
</ol>
<hr/>