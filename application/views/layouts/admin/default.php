<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php echo __HTML_CHARSET__; ?>">
        <title><?php echo $this->lang->line('codeigniter_admin_pro'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <?php
            $btpath='assets/node_modules/bootstrap/dist';
            $jquerypath='assets/node_modules/jquery/dist';
            $assetspath='assets/js';
        ?>
        <!--
        <link href="<?php echo base_url(); ?>media/css/template.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>media/css/style.css" rel="stylesheet">
        -->

        <link href="<?php echo base_url().$btpath; ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>media/select2/select2.css" rel="stylesheet">
        <!-- <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet"> -->

        <link href="<?php echo base_url(); ?>assets/css/submenu.css" rel="stylesheet">  <!--for bootstrap multi-level submenu   -->

        <script src="<?php echo base_url().$jquerypath;; ?>/jquery.min.js"></script>
        <script src="<?php echo base_url().$btpath;; ?>/js/bootstrap.min.js"></script>
        <!--<script src="<?php echo base_url().$btpath;; ?>/js/jquery-migrate-1.2.1.min"></script>-->
        <!--<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/js/ie-utils.js"></script>
        <script src="<?php echo base_url(); ?>media/bootstrap-modal/js/bootstrap.modal.js"></script>
        <script src="<?php echo base_url(); ?>media/select2/select2.js"></script>
       
    </head>
    <body>
        <?php echo $main_menu; ?>
        <?php echo $main_content; ?>
        <?php echo $main_footer; ?>
        <?php
            if (isset($js))
            {
                echo "<script src='".base_url()."app/".$js."'></script>";
            }
        ?>
    </body>
</html>