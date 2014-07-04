<div class="spacer"></div>

<div id="contents"></div>

<script type="text/javascript">
$(document).ready(function(){
    var tasks ='<?php echo site_url("tasks/view"); ?>';
    var notes ='<?php echo site_url("notes"); ?>';
    var inventory ='<?php echo site_url("inventory/view"); ?>';


    $("#contents").load(tasks);
});

</script>