<?php
echo '<div class="h3">update location</div>';

foreach ($locations as $r) {
    echo form_open('inventory/locUpdate/'.$r->id);
    echo '<div class="input-group clearfix">';
    echo form_input('locName', $r->loc, 'class="form-control"');
    echo '<span class="input-group-btn"><button class="btn btn-info">update</button></span>';
    echo '</div>';
    echo form_close();
}



//create new loc
echo form_open('inventory/locAdd');
echo '<div class="h3">add location</div>';
echo '<div class="input-group">';
echo form_input('locName', '', 'class="form-control"');
echo '<span class="input-group-btn"><button class="btn btn-info">submit</button></span></div>';
echo form_close();