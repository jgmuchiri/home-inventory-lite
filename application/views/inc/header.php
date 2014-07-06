<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <title>
        <?php
        echo $this->config->item('site_name');
        ?>
    </title>

    <?php
    //stylesheets
    $styles = array(
        'bootstrap',
        'dashboard'
    );
    foreach($styles as $style){
       echo link_tag(base_url().'assets/css/'.$style.'.css');
    }
    ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/docs.js"></script>


    <style type="text/css" id="holderjs-style"></style>
</head>

<body style="margin:0 auto; width:920px">

<div class="container-fluid"><!--container-->
    <div class="row">
        <div class="main">

            <a class="navbar-brand" style="background: #fff; color: #3cc" href="<?php echo base_url(); ?>">
                <span class="glyphicon glyphicon-home"><?php
                    echo $this->config->item('site_name');
                    ?></span></a>

            <div class="clearfix"></div>

            <?php $this->load->view('inc/nav'); ?>

            <?php
            echo validation_errors();
            echo $this->session->flashdata('result');
            ?>
