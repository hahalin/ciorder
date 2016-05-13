<html>
	<head>
		<?php
            $btpath='media/node_modules/bootstrap/dist';
            $jquerypath='media/node_modules/jquery/dist';
            $assetspath='assets';
        ?>
		
        <script src="<?php echo base_url().$jquerypath; ?>/jquery.min.js"></script>
		<script type="text/javascript">
		        var CFG = {
			        url: '<?php echo $this->config->item("base_url");?>',
			        token: '<?php echo $this->security->get_csrf_hash();?>'
		    	};
		    	//window.CFG=CFG;
		    	//console.log(window.CFG);
	    </script>

		<script src="<?php echo base_url().$assetspath;?>/dist/test-ajax-auth.js"></script>
	</head>

	<body>
		<h2>testajaxcall</h2>
		<!-- <input type="hidden" name="frank_csrf_cookie_name" /> -->
	</body>

</html>