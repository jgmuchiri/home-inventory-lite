<?php foreach ($images as $row) {
    echo anchor('upload/view/'
        . $row->file, '<img style="padding:5px" src="'
        . base_url()
        . 'assets/documents/uploads/'
        . $row->file
        . '" width="'.$imgWidth.'" height="'.$imgHeight.'"/></a>');
}