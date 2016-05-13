<?php $CRUD_AUTH = $this->session->userdata('CRUD_AUTH'); ?>

<?php 
	$CI = & get_instance();
	//$key = $CI->input->post('key');
	$lang = $CI->lang; 
	
?>

<div class="container">
		<h2><?php  echo "訂單新增作業";?>	</h2>
		
		<div style="height: 52px;">
		    <div data-spy="affix" data-offset-top="90" style="
		         top: 24px;
		         width: 100%;
		         padding-top:5px;
		         padding-bottom:5px;
		         z-index: 100;">
		        <div class="container" >
		            <div style="text-align:left;width:100%;">
		                <a class="btn btn-info" onclick="crudConfirm();" > 
		                	新增
		                </a>
		                <a class="btn"  onclick="crudCancel();">
		                	取消    
		                </a>
		            </div>
		        </div>
		    </div>
	    </div>		
		
	   <div class='x-table well'>
			<form method="post" action="?xtype=update" enctype="multipart/form-data" 
			  id="crudForm" class="form-horizontal">
			  <input type="hidden" name="auth_token" id="auth_token" value="<?php //echo $this->getToken(); ?>"/>
		      
		      <div class="form-group">
			      <label for="crudRowsPerPage" class="">
		      		<b>單號</b>
				  </label>
				  <div class="controls">
                        <input type="text" name="data[orders][orderno]" id="dataOrdersOrderno" style="width:210px;">
                        </input>                            
        	      </div>
			  </div> 
			  
		   </form>
	  </div> <!-- x-table well -->
</div> <!-- container-->
<script type="text/javascript">
   function crudConfirm() {
   	$('#crudForm').submit();
   }

</script>



