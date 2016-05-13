<?php $CRUD_AUTH = $this -> session -> userdata('CRUD_AUTH'); ?>
<?php //echo '<pre>'; print_r ($CRUD_AUTH); echo '</pre>'; ?>
<?php //echo '<pre>'; print_r ($mnuGroup); echo '</pre>'; ?>
<style>
/*https://github.com/daneden/animate.css/blob/master/animate.css*/
@-webkit-keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
}

	.affix {
	top: 0;
	width: 100%;
	z-index:101;
	max-height: 35px;

	box-shadow: 3px 3px 5px #ccc;
/*	background-color: #fefefe;
	-webkit-transition: all 0.4s ease;
	transition: all 0.4s ease;
*/
	-webkit-animation-duration:1s;
	animation-duration:1s;
	-webkit-animation-name:fadeInDown;
	animation-name:fadeInDown;
	-webkit-animation-fill-mode:both;
	animation-fill-mode:both;
			
}
</style>
<!-- <div id='nav' > -->
<!-- <div class="container" > -->
<nav class="navbar navbar-default"  data-spy="affix" data-offset-top="45" role="navigation">
	<div class='container'>
		<div class="navbar-header" style='display:none_;'>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/admin/dashboard"><?php echo $this -> lang -> line('codeigniter_admin_pro'); ?></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<!-- <li class="activea"><a href="#">首頁</a></li> -->
				<!-- <li <?php if ($type != 'dashboard') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>index.php/admin/dashboard"><?php echo $this -> lang -> line('main'); ?></a></li> -->
				<?php if ((int) $CRUD_AUTH['group']['group_manage_flag'] == 1 ||
				(int) $CRUD_AUTH['group']['group_manage_flag'] == 3 ||
				(int) $CRUD_AUTH['user_manage_flag'] == 1 ||
				(int) $CRUD_AUTH['user_manage_flag'] == 3) { ?>
				<li class="dropdown <?php if ($type == 'user') { ?>active<?php } ?>">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $this -> lang -> line('users'); ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>index.php/admin/user/user"><?php echo $this -> lang -> line('user_manager'); ?></a></li>
						<li><a href="<?php echo base_url(); ?>index.php/admin/user/group"><?php echo $this -> lang -> line('groups'); ?></a></li>
						<li><a href="<?php echo base_url(); ?>index.php/admin/user/permission"><?php echo $this -> lang -> line('permissions'); ?></a></li>
					</ul>
				</li>
				<?php } ?>
				<li class="dropdown <?php if ($type == 'component') { ?>active<?php } ?>" id="mnu_component"><a data-toggle="dropdown"
					class="dropdown-toggle" href="#"><?php echo $this -> lang -> line('components'); ?> <b
				class="caret"></b> </a>
				<ul class="dropdown-menu">
					<?php foreach ($mnuGroup as $v){
						if (empty($v['coms'])) continue;
						
					?>
					<li class="dropdown-submenu">
						<a href="#" tabindex="-1" onclick="clickGroup(this); return false;"><?php echo $v['name']; ?></a>
						<ul class="dropdown-menu">
							<?php foreach ($v['coms'] as $com){
								$permissions = $auth->getPermissionType($com['id']);
								if (!in_array(4, $permissions)) continue;
							?>
							<li><a href="<?php echo base_url(); ?>index.php/admin/scrud/browse?com_id=<?php echo $com['id']; ?>"><?php echo $com['component_name']?></a></li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>
					<?php foreach ($coms as $com){
						if (in_array($com['id'], $exComs)) continue;
						$permissions = $auth->getPermissionType($com['id']);
						if (!in_array(4, $permissions)) continue;
					?>
					<li><a href="<?php echo base_url(); ?>index.php/admin/scrud/browse?com_id=<?php echo $com['id']; ?>"><?php echo $com['component_name']?></a></li>
					<?php } ?>
				</ul>
				</li>
				<li class="dropdown" style="display:none;">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">賽事管理<b class="caret"></b></a>
					
					<ul class="dropdown-menu">
						<li class="dropdown-submenu"><a href="#">分站建檔</b></a>
						<ul class="dropdown-menu">
							<li><a href=#>分站(Stage)</a></li>
							<li><a href=#>SS(Itinerary)</a></li>
						</ul>
						</li>
						<li class="dropdown-submenu"><a href=#>報名</a>
						
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo base_url(); ?>index.php/admin/playercrl/reg">參賽車手登錄作業</a>
								</li>
								<li>
									<a href=#>出發序(Start List)</a>
								</li>
							</ul>
						</li>
						<li class="dropdown-submenu"><a href=#>成績登錄</a>
							<ul class="dropdown-menu">
								<li>
									<a href=#>分段成績登錄(Split Times Input)</a>
								</li>
								<li>
									<a href=#>SS成績統計(Stage Times Calculate)</a>
								</li>
								<li>
									<a href=#>罰秒登錄(Penalities Input)</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>

				<?php if ((int) $CRUD_AUTH['group']['group_manage_flag'] == 2 ||
				(int) $CRUD_AUTH['group']['group_manage_flag'] == 3 ||
				(int) $CRUD_AUTH['user_manage_flag'] == 2 ||
				(int) $CRUD_AUTH['user_manage_flag'] == 3) { ?>
				<li class="dropdown  <?php if ($type == 'tool') { ?>active<?php } ?>" ><a data-toggle="dropdown"
				class="dropdown-toggle" href="#"><?php echo $this -> lang -> line('tools'); ?><b
				class="caret"></b> </a>
				<ul class="dropdown-menu">
				<li><a href="<?php echo base_url(); ?>index.php/admin/component/builder"><?php echo $this -> lang -> line('component_builder'); ?></a></li>
				<li><a href="<?php echo base_url(); ?>index.php/admin/component/groups"><?php echo $this -> lang -> line('groups'); ?></a></li>
				<li class="divider"></li>
				<li><a href="<?php echo base_url(); ?>index.php/admin/table/index"><?php echo $this -> lang -> line('table_builder'); ?></a></li>
				<li><a href="<?php echo base_url(); ?>index.php/admin/language/index"><?php echo $this -> lang -> line('language_manager'); ?></a></li>
				</ul>
				</li>
				<?php } ?>

				<?php if ($auth->isSettingManagement()){
				?>
				<li class="dropdown <?php if ($type == 'setting') { ?>active<?php } ?>"><a href="#" class="dropdown-toggle"
				data-toggle="dropdown"><?php echo $this -> lang -> line('settings'); ?> <b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
				<li><a href="<?php echo base_url(); ?>index.php/admin/setting/index"><?php echo $this->lang->line('general')?></a></li>
				<li class="nav-header"><?php echo $this -> lang -> line('email_templates'); ?></li>
				<li><a href="<?php echo base_url(); ?>index.php/admin/setting/email/new_user"><?php echo $this -> lang -> line('new_user'); ?></a></li>
				<li><a href="<?php echo base_url(); ?>index.php/admin/setting/email/reset_password"><?php echo $this -> lang -> line('reset_password'); ?></a></li>
				</ul></li>
				<?php } ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
                    <!-- <li class="divider-vertical"></li> -->
                    <li class="dropdown   <?php if ($type == 'account') { ?>active<?php } ?>">
                        <a class=" dropdown-toggle" data-toggle="dropdown" href="#" > &nbsp;  <i class="glyphicon glyphicon-user"></i>&nbsp; <?php echo $CRUD_AUTH['user_name']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        	<?php if ($auth->isSettingManagement()){?>
							<li><a href="<?php echo base_url(); ?>index.php/admin/setting/index"> <i class="glyphicon glyphicon-cog"></i> <?php echo $this->lang->line('settings');?></a></li>
							<?php } ?>
                            <?php if ($CRUD_AUTH['group']['group_name'] != 'SystemAdmin') { ?>
                                <li><a href="<?php echo base_url(); ?>index.php/user/editprofile"> <i class="glyphicon glyphicon-user"></i> <?php echo $this->lang->line('edit_profile');?></a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/user/changepassword"> <i class="glyphicon glyphicon-pencil"></i> <?php echo $this->lang->line('change_password');?></a></li>
                                <li class="divider"></li>
                            <?php } ?>
                            <li><a href="<?php echo base_url(); ?>index.php/admin/logout"> <i class="glyphicon glyphicon-minus-sign"></i> <?php echo $this->lang->line('log_out');?></a></li>
                        </ul>
                    </li>
                </ul>
		</div>
	</div>
</nav>

<!-- </div> -->
<!-- </div> -->
<script type='text/javascript'>
	//dynamic fixed topnav
	//http://stackoverflow.com/questions/14667829/how-to-create-a-sticky-navigation-bar-that-becomes-fixed-to-the-top-after-scroll
	//http://www.bootply.com/69848#
	//navbar-fixed-top_
	$(function() {
		// $('#nav').affix({
		//       offset: {
		//         top: 10
		//       },
		//       width:'100%'
			// });
	});
</script>
<script>
	function clickGroup(obj) {
		window.location = $(obj).parent().find('ul').find('a:first').attr('href');
	}
	$(document).ready(function() {
		$('#mnu_component > ul > li').each(function() {
			if ($(this).hasClass('dropdown-submenu')) {
				if ($(this).find('li').length <= 0) {
					$(this).remove();
				}
			}
		});
		if ($('#mnu_component').children('ul').find('li').length <= 0) {
			$('#mnu_component').hide();
		} else {
			$('#mnu_component').show();
		}
	});
</script>