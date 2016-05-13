<?php //$CI = & get_instance(); ?>

		
		<p>orderaaa</p>
		<?php
			
			$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
			
			$now=date_create();
			//$datetime = $now->format('Y-m-d H:i:s');
			$datetime = $now->format('Ymd');
			echo $datetime;

			$time = time();
			
			$timezone = 'UP8';
			
			echo date_default_timezone_get();

			date_default_timezone_set('asia/taipei');

			echo date_default_timezone_get();

			$daylight_saving = TRUE;
			
			echo unix_to_human($time);
			echo "<br/>";

			echo unix_to_human(local_to_gmt($time, $timezone, $daylight_saving));
			echo "<br/>";
			
			echo unix_to_human(gmt_to_local($time, $timezone, $daylight_saving));
			echo "<br/>";
			
			$now = time();
			
			print_r ($form);
			
			
		?>

