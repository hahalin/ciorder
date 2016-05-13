<html>
	
	<head>
		
	</head>
	<body>
		<?php

		echo '<pre>';
		print_r($list);
		echo '</pre>';

		foreach($list as $k=>$v)
		{
			echo $v->code.'</br>';
		}

		?>
		
		<div id="main">
			
		</div>
		<script src="./dist/common.bundle.js"></script>

	</body>
</html>