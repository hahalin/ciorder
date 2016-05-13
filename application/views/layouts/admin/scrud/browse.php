<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php echo __HTML_CHARSET__; ?>">
        <title><?php echo $this -> lang -> line('codeigniter_admin_pro'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

		<?php
			$btpath = 'media/node_modules/bootstrap/dist';
			$jquerypath = 'media/node_modules/jquery/dist';
            //$btpath="media/bootstrap";
		?>

        <!-- Le styles -->
        <!--
        <link href="<?php echo base_url(); ?>media/css/template.css" rel="stylesheet">
        -->

        <link href="<?php echo base_url().$btpath; ?>/css/bootstrap.css" rel="stylesheet">
        <script src="<?php echo base_url().$jquerypath;; ?>/jquery.min.js"></script>
        <script src="<?php echo base_url().$btpath;; ?>/js/bootstrap.min.js"></script>

        <link href="<?php echo base_url(); ?>media/bootstrap-modal/css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>media/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>media/select2/select2.css" rel="stylesheet">

        <script src="<?php echo base_url(); ?>media/tinymce/tinymce.min.js"></script>

        <script src="<?php echo base_url(); ?>media/bootstrap-modal/js/bootstrap.modal.js"></script>
        
		<script src="<?php echo base_url(); ?>media/bootstrap-modal/js/jquery.easing.1.3.js"></script>
		<!-- -->

		
		<script src="<?php echo base_url(); ?>media/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>media/select2/select2.js"></script>

        
        <style>
            .list thead tr th .arrow {
                display: inline;
                float: right;
                width: 7px;
                height: 4px;
                margin-top: 7px;
                margin-right: 3px;
            }
            .pagination{
                margin: 5px 0 !important;
            }
            .table{
                margin-bottom:5px;
            }
            .list thead tr th .desc {
                background: url("<?php echo base_url(); ?>media/icons/arrow_down_black.png") no-repeat right center;
            }

            .list thead tr th .asc {
                background: url("<?php echo base_url(); ?>
				media/icons/arrow_up_black.png") no-repeat right center;
				}
        </style>    
        
            <script>
                
                // CKEDITOR.replace( 'editor-ckeditor' ,{
                //     filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                //     filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                //     filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr='
                // });
                //http://www.responsivefilemanager.com/support.php
                // Payam Omrani  Payam Omrani • a year ago
                // my problem is solved !!

                // add lines to tinymce init

                // convert_urls: false,
                // relative_urls: false,
                tinymce.init({
                    convert_urls: false,
                    relative_urls: false,
                    
                    selector: "textarea",theme: "modern",width: 680,height: 300,
                    plugins: [
                         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                   ],
                   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                   image_advtab: true ,
                   filemanager_crossdomain: true,

                   external_filemanager_path:"<?php echo base_url(); ?>media/filemanager/",
                   filemanager_title:"Responsive Filemanager" ,
                   external_plugins: { "filemanager" : "<?php echo base_url(); ?>media/filemanager/plugin.min.js"}
                 });


            </script>
    </head>

    <body>
        <?php echo $main_menu; ?>
        <?php echo $main_content; ?>
        <?php echo $main_footer; ?>
    </body>
</html>
