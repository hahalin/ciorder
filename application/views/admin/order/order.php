<?php $CRUD_AUTH = $this->session->userdata('CRUD_AUTH'); ?>
<div class="container">
		<h2><?php echo 'order mgr'; ?></h2>
        <ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
        <?php if ((int) $CRUD_AUTH['group']['group_manage_flag'] == 1 || 
        		(int) $CRUD_AUTH['group']['group_manage_flag'] == 3 ||
        		(int) $CRUD_AUTH['user_manage_flag'] == 1 || 
        		(int) $CRUD_AUTH['user_manage_flag'] == 3 ||
        		(int) 1==1 ) { ?>
            <li class="active">
                <a href="<?php echo base_url(); ?>index.php/order/index">
                    <?php echo 'orderlist';?>
                </a>
            </li>
            <li>
            	<a href="<?php echo base_url(); ?>index.php/order/add"> &nbsp; 
            		<?php echo 'new order'; ?> &nbsp; 
            	</a>
            </li>
            
          <?php } ?>
        </ul>
        <?php echo $content; ?>
</div>
