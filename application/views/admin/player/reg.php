<?php $CRUD_AUTH = $this->session->userdata('CRUD_AUTH'); ?>

<?php 
	$CI = & get_instance();
	//$key = $CI->input->post('key');
	$lang = $CI->lang; 
	
?>

<div class="container">
		<h2><?php  echo "參賽車手登錄作業";  //echo $this->lang->line('user_manager_permission');?>	</h2>
		
		<div style="height: 52px;">
		    <div data-spy="affix" data-offset-top="90" style="
		         top: 24px;
		         width: 100%;
		         padding-top:5px;
		         padding-bottom:5px;
		         z-index: 100;">
		        <div class="container" style="border-bottom: 1px solid #CCC; padding-bottom:5px;padding-top:5px;
		        	background: #FBFBFB;
		       		background-image: linear-gradient(to bottom, #FFFFFF, #FBFBFB);">
		            <div style="text-align:right;width:100%;">
		                <a class="btn"  onclick="crudCancel();">  &nbsp; <?php echo $lang->line('cancel'); ?>  &nbsp; </a>
		                <a class="btn btn-info" onclick="crudConfirm();" > &nbsp;  <i class="icon-edit icon-white"></i>  <?php echo $lang->line('confirm'); ?> &nbsp; </a>
		            </div>
		        </div>
		    </div>
	    </div>		
		
	   <div class='x-table well  <?php echo $this->conf['color']; ?>' style="background:#FBFBFB;">
			<form method="post" action="?xtype=update"  enctype="multipart/form-data" 
			  id="crudForm" style="padding: 0; margin: 0;" class="form-horizontal">
			  <input type="hidden" name="auth_token" id="auth_token" value="<?php //echo $this->getToken(); ?>"/>
		      
		      <div class="form-group">
			      <label for="crudRowsPerPage" class="">
			      		<b>組別<b style="color: red;">*</b></b>
				  </label>
				  
				 
				  	  <select name="cargroup" id="cargroup" class="form-control">
				  	  	  <?php 
				  	  	  		foreach($cargroups as $group)
								{
									echo '<option value="'.$group->id.'">';
									echo $group->name;
									echo '</option>';
								}
						  ?>
				  	  </select>
				 
			  </div> 
			  
			  <div class="form-group">
				  <label for="crudRowsPerPage" class="">
				  	  <b>車隊<b style="color: red;">*</b></b>
				  </label>
			      
			      
						<select name="teamid" id="teamid" style="width: 220px;" class="form-control_">
							 <?php  
				  	  	  		foreach($teams as $team)
								{
									echo '<option value="'.$team->id.'">';
									echo $team->name;
									echo '</option>';
								}
						 	 ?>
						</select>
			      
			      <script>
					$(document).ready(function() { $("#teamid").select2(); });
				  </script>
			  </div>
			  
			  <div class="form-group">
			  	<label for="crudRowsPerPage" class="control-label">
				  	 		 <b>車手ID<b style="color: red;">*</b></b>
				 </label>
			     <div	 class="controls">
					  	
				  		<div id="playerid" style="width:220px;"></div>
				  		&nbsp;	
				  		<button class="btn btn-primary" id="btn-newp" type="button">新增報名</button>
				  		<br/>
         					     	
			     </div>
			  </div>
			  <div id="player_reg_container"></div>
			  
			     <script>
			     		$(document).ready(function() {
			     			$('#btn-newp').click(function(){
			     				$.get("<?php echo base_url(); ?>index.php/admin/playercrl/player_json?id=0",{},function(data){
									$('#player_reg_container').html('');
									$('#player_reg_container').append(data);
								},'html');
			     			});
			     			
							$("#playerid").select2({
							    placeholder: "<?php echo'請輸入車手ID(輸入兩個字元後開始自動查找)' ;//echo $this->lang->line('search_for_a_user');?>",
							    minimumInputLength: 2,
							    ajax: {
							        url: "<?php echo base_url(); ?>index.php/admin/playercrl/player_json",
							        dataType: 'jsonp',
							        data: function(term, page) {
							            return {
							                q: term, // search term
							            };
							        },
							        results: function(data, page) { // parse the results into the format expected by Select2.
							            return {results: data};
							        }
							    },
							    initSelection: function(element, callback) {},
							    formatResult: movieFormatResult, // omitted for brevity, see the source of this page
							    formatSelection: movieFormatSelection, // omitted for brevity, see the source of this page
							    dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
							    escapeMarkup: function(m) {
							        return m;
							    } 
							});
						});
						
						$("#playerid").on('change',function(e){
							$.get("<?php echo base_url(); ?>index.php/admin/playercrl/player_json?id="+e.val,{},function(data){
								$('#player_reg_container').html('');
								$('#player_reg_container').append(data);
							},'html');
						});
						
						function movieFormatResult(player) {
							
						    return player.mid+" "+player.mname;
						}
						
						function movieFormatSelection(player) {
						    return player.mid;
						}
			      </script>
			  
			  
		   </form>
	  </div> <!-- x-table well -->
</div> <!-- container-->

<script language="JavaScript">
	
</script>