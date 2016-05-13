<?php $CRUD_AUTH = $this->session->userdata('CRUD_AUTH'); ?>
<div class="container">
		<h2><?php echo '車手管理'; return; echo $this->lang->line('user_manager_users');?></h2>
        <ul class="nav nav-tabs" id="auth_tab" style="margin-bottom: 0px;">
        <?php if ((int) $CRUD_AUTH['group']['group_manage_flag'] == 1 || 
        		(int) $CRUD_AUTH['group']['group_manage_flag'] == 3 ||
        		(int) $CRUD_AUTH['user_manage_flag'] == 1 || 
        		(int) $CRUD_AUTH['user_manage_flag'] == 3 ||
        		(int) 1==1 ) { ?>
            <li class="active">
            	<a href="<?php echo base_url(); ?>index.php/admin/player/reg"> &nbsp; 
            		<?php echo '車手登錄'; return; echo $this->lang->line('users');?> &nbsp; 
            	</a>
            </li>
            <li>
            	<a href="<?php echo base_url(); ?>index.php/admin/player/list">
            		<?php echo '車手資料庫'; return; echo $this->lang->line('groups');?>
            	</a>
            </li>
          <?php } ?>
        </ul>
        <?php echo $content; ?>
</div>
