
<?php if($temp === 1): ?>
	 <a class="list-group-item row ">
	<span class="col-sm-5 title">User Name:</span>
		<div class="col-sm-6" >
			<form method='POST' class='form-group' action="">
				<input  id='change_username' type='text' value="<?php echo $username ?>" class='form-control'/><br>
				<div class="alert alert-danger" role="alert">Existed username</div>
					<button id='submit_save_username' class='btn btn-primary'>Save change</button>
					<button id='submit_cancel' class='btn btn-primary'>Cancel</button>
			</form>
		</div>
 </a>
 <?php elseif($temp === 2): ?>
 	 <a class="list-group-item row ">
	<span class="col-sm-5 title">User Name:</span>
		<div class="col-sm-6" >
			<form method='POST' class='form-group' action="">
				<input  id='change_username' type='text' value="<?php echo $username ?>" class='form-control'/><br>
				<div class="alert alert-danger" role="alert">It's not null!</div>
					<button id='submit_save_username' class='btn btn-primary'>Save change</button>
					<button id='submit_cancel' class='btn btn-primary'>Cancel</button>
			</form>
		</div>
 </a>
<?php elseif($temp === 3): ?>
	<a href="<?php echo base_url() ?>index.php/setting/form_edit_username"  
					  	class="list-group-item row edit" data-id="username" data-value="<?php echo $username ;?>">
					  		<span class="col-sm-5 title">User Name:</span>
					  		<div class="col-sm-6">
						   		<span class="col-md-11" id="username"><?php echo $username;?></span>
						   		<span class="glyphicon glyphicon-pencil"></span>
					   		</div>
					  </a>

<?php endif; ?>


