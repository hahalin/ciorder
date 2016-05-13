<input	type="hidden" name="player_id" id="player_id" value="<?php echo $player['id']; ?>" />

<?php if ($player['id']==0)
{
?>

<div class="control-group">
		<label for="crudRowsPerPage" class="control-label">
				  	 		 <b>ID</b>
		</label>
		<div	 class="controls">
			<input type="text" name="mid" id="mid" style="width:210px;" placeholder="新報名車手ID…">
		</div>
</div>

<?php	
}
?>

<div class="control-group">
		<label for="crudRowsPerPage" class="control-label">
				  	 		 <b>姓名</b>
		</label>
		<div	 class="controls">
			<input type="text" name="mname" id="mname" style="width:210px;" value="<?php echo $player['mname']; ?>">
		</div>
</div>


<div class="control-group">
		<label for="crudRowsPerPage" class="control-label">
				  	 		 <b>血型</b>
		</label>
		<div	 class="controls">
			<input type="text" name="mname" id="mname" style="width:210px;" value="<?php echo $player['mblood']; ?>">
		</div>
</div>



<div class="control-group">
		<label for="crudRowsPerPage" class="control-label">
				  	 		 <b>電話</b>
		</label>
		<div	 class="controls">
			<input type="text" name="mname" id="mname" style="width:210px;" value="<?php echo $player['mtel']; ?>">
		</div>
</div>