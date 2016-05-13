<html>
<head></head>
<body>
	<h2>Create a news common data</h2>

	<?php echo validation_errors(); ?>
	
	<?php echo form_open('base/commondata/create') ?>
	<label for="code">code</label>
	<input type="input" name="code" value="<?php echo set_value('code', $code); ?>" /><br />

	<label for="nm">Name</label>
	<input type="input" name="nm" value="<?php echo set_value('nm', $nm); ?>"  /><br />

	<input type="submit" name="submit" value="Create news CommonData" />

</form>

</body>
</html>