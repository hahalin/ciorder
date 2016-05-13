<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php echo __HTML_CHARSET__; ?>">
        <title><?php echo $this -> lang -> line('codeigniter_admin_pro'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>media/css/template.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>media/bootstrap-modal/css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>media/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>media/select2/select2.css" rel="stylesheet">

        <script src="<?php echo base_url(); ?>media/bootstrap/js/jquery-1.7.1.min.js"></script>
        <script src="<?php echo base_url(); ?>media/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>media/tinymce/tinymce.min.js"></script>
        <script src="<?php echo base_url(); ?>media/bootstrap-modal/js/bootstrap.modal.js"></script>
		<script src="<?php echo base_url(); ?>media/bootstrap-modal/js/jquery.easing.1.3.js"></script>
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

    </head>

    <body>
        <?php echo $main_menu; ?>
        
        <div class="container">
        	<h2><?php echo $title; ?></h2>
        </div>
	
		<div class="container">
			
			<ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
            			<?php 
            			    
            				foreach($tabs as $tab)
							{
								
								echo '<li';
								//if (isset($tab['active']) && $this['active'])
								if (isset($tab['active']) && $tab['active'])
								{
									echo ' class="active"';
								}
								echo ">";
								
								echo "<a ";
								echo " href=#";
								echo ">";
								echo $tab['title'];
								echo "</a>";
							
								echo '</li>';
							}
            			
            			?>
            			
            			<!--
            			<li class="active"><a href="http://localhost:8080/ciadmina/index.php/admin/scrud/browse?com_id=4">組別</a></li>
						<li><a href="http://localhost:8080/ciadmina/index.php/admin/scrud/browse?com_id=7">車隊</a></li>
						<li><a href="http://localhost:8080/ciadmina/index.php/admin/scrud/browse?com_id=8">駕駛&amp;領航員</a></li>
						-->
			</ul>
			
		</div>
	
		<div style="height: 52px;">
				<div data-spy="affix" data-offset-top="90" style="
				top: 24px;
				width: 100%;
				padding-top:5px;
				padding-bottom:5px;
				z-index: 100;" class="affix-top">
					<div class="container" style="border-bottom: 1px solid #CCC; padding-bottom:5px;padding-top:5px;
					background: #FBFBFB;
					background-image: linear-gradient(to bottom, #FFFFFF, #FBFBFB);">
						<div style="text-align:right;width:100%;">
							<div class="btn-group">
								<a class="btn" onclick="searchModal();"><i class="icon-search"></i> Search</a>
								<a class="btn" href="?com_id=4"><i class="icon-remove-sign"></i></a>
							</div>
							<a class="btn" onclick="crudExport();"><i class="icon-download"></i> Export CSV</a>
							<a class="btn" onclick="crudExportAll();"><i class="icon-download"></i> Export CSV (All)</a>
							<a type="button" class="btn btn-info" onclick="newRecord();"> <i class="icon-plus icon-white"></i> Add</a>
						</div>
					</div>
				</div>
</div>
		<?php $CI = & get_instance(); ?>
		<?php echo $this->input->get('b'); ?>
		<div class="container  ">
			<div style="overflow: auto;width:800px;margin:auto;font-size:\"120%\";line-height:35px;">
				
				<table class="table table-bordered table-hover list table-condensed table-striped">
				<thead>
	                        <tr>
	                        	<?php
								foreach ($fields as $f) {
									echo '<th style="text-align:center;">';
									echo $f;
									echo '</th>';
								}
								?>
							</tr>
				</thead>
				<tbody>
							<?php
	                        		foreach ($dataset as $o)
									{
										echo '<tr>';
										//echo '<hidden id="id"'.$o->i
										foreach ($fields as $f)
										{
											echo '<td style="text-align:center;">';
											//$num= $this->{'_load'.$class}($importfile);
											echo $o->{$f};
											echo '</td>';
										}
										echo '</tr>';
									}
							?>
				</tbody>
				</table>
				
			</div>
		</div>
        
        <?php //echo $main_footer; ?>
    </body>
</html>
