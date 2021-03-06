<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php echo __HTML_CHARSET__; ?>">
        <title><?php echo $this->lang->line('codeigniter_admin_pro'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <?php
            $btpath = 'media/node_modules/bootstrap/dist';
            $jquerypath = 'media/node_modules/jquery/dist';
            //$btpath="media/bootstrap";
        ?>

        <link href="<?php echo base_url(); ?>media/css/template.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>media/jquery/ui/css/smoothness/jquery-ui-1.9.1.custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>media/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>media/select2/select2.css" rel="stylesheet">

        <!-- <link href="<?php echo base_url().$btpath; ?>/css/bootstrap.css" rel="stylesheet"> -->
        <!--<script src="<?php echo base_url().$jquerypath;; ?>/jquery.min.js"></script>-->
        <!-- <script src="<?php echo base_url().$btpath;; ?>/js/bootstrap.min.js"></script> -->

        <script src="<?php echo base_url(); ?>media/jquery/jquery-1.8.2.min.js"></script>
        <script src="<?php echo base_url(); ?>media/jquery/ui/jquery-ui-1.9.1.custom.min.js"></script>
        <script src="<?php echo base_url(); ?>media/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>media/bootstrap/js/bootstrapx-clickover.js"></script>
        <script src="<?php echo base_url(); ?>media/tinymce/tinymce.min.js"></script>
        <script src="<?php echo base_url(); ?>media/js/config-element.js"></script>
        <script src="<?php echo base_url(); ?>media/js/config-common.js"></script>
        <script src="<?php echo base_url(); ?>media/js/config-form.js"></script>
        <script src="<?php echo base_url(); ?>media/js/options/text-options.js"></script>
        <script src="<?php echo base_url(); ?>media/js/options/password-options.js"></script>
        <script src="<?php echo base_url(); ?>media/js/options/textarea-options.js"></script>
        <script src="<?php echo base_url(); ?>media/js/options/select-options.js"></script>
        <script src="<?php echo base_url(); ?>media/js/options/radio-options.js"></script>
        <script src="<?php echo base_url(); ?>media/js/options/checkbox-options.js"></script>
        <script src="<?php echo base_url(); ?>media/js/options/image-options.js"></script>
        <script src="<?php echo base_url(); ?>media/select2/select2.js"></script>
    </head>
<style>
	.popover.left .arrow {
		display: none;
	}
	
	.tab-content {
		overflow: visible;
	}
	
	#frm_preview {
		padding: 10px 10px 0 10px;
		border: 1px solid #DDDDDD;
		border-radius: 5px;
		background: #FBFBFB;
	}
	
</style>
    <body>
        <?php echo $main_menu; ?>
        <?php echo $main_content; ?>
        <?php echo $main_footer; ?>
    </body>
</html>
