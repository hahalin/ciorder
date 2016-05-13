<?php $CRUD_AUTH = $this->session->userdata('CRUD_AUTH'); ?>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"><a class="btn btn-navbar"
                                  data-toggle="collapse" data-target=".nav-collapse"> <span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span> </a> 
            <a class="brand" href="<?php echo base_url(); ?>index.php/admin/dashboard">TRCC 資料庫管理系統<?php echo $this->lang->line('codeigniter_admin_pro'); ?></a>
            
            <div class="nav-collapse collapse">
                <ul class="nav">
                	<li class="active">
                			<a href=#>menu1</a>
                	</li>
                	<li  class="dropdown">
                			<a href=# data-toggle="dropdown" class="dropdown-toggle">menu2 <b class="caret"></b></a>
                			<ul class="dropdown-menu">
                				<li><a href=#>menu2-1</a></li>
                				<li class="dropdown-submenu"><a href=#>menu2-2</a>
	                				<ul class="dropdown-menu">
	                					<li><a href=#>2-2-1</a></li>
	                					<li><a href=#>2-2-2</a></li>
	                				</ul>
                				</li>
                			</ul>
                	</li>
               </ul> 	
                    
                <ul class="nav pull-right">
                    <!-- <li class="divider-vertical"></li> -->
                    <li class="dropdown">
                        <a class=" dropdown-toggle" data-toggle="dropdown" href="#" > &nbsp;  <i class="icon icon-user"></i>&nbsp; <?php echo $CRUD_AUTH['user_name']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>index.php/user/editprofile"> <i class="icon-user"></i> <?php echo $this->lang->line('edit_profile');?></a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/user/changepassword"> <i class="icon-pencil"></i> <?php echo $this->lang->line('change_password');?></a></li>
                                <li class="divider"></li>
	                            <li><a href="<?php echo base_url(); ?>index.php/admin/logout"> <i class="icon-minus-sign"></i> <?php echo $this->lang->line('log_out');?></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
	function clickGroup(obj){
		window.location = $(obj).parent().find('ul').find('a:first').attr('href');
	}
    $(document).ready(function(){
    	$('#mnu_component > ul > li').each(function(){
			if ($(this).hasClass('dropdown-submenu')){
				if ($(this).find('li').length <= 0){
					$(this).remove();
				}
			}
       });
        
       if ($('#mnu_component').children('ul').find('li').length <= 0){
           $('#mnu_component').hide();
       }else{
           $('#mnu_component').show();
       } 
    });
</script>