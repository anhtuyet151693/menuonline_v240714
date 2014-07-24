<?php if($temp==1): ?>
	 <a class="list-group-item row ">
	<span class="col-sm-5 title">Full Name:</span>
		<div class="col-sm-6" >
			<form method='POST' class='form-group' action="">
				<input  id='change_name' type='text' value="<?php echo $name ?>" class='form-control'/><br>
				<div class="alert alert-danger" role="alert">It's not null!</div><br>
					<button id='submit_save_name' class='btn btn-primary'>Save change</button>
					<button id='submit_cancel' class='btn btn-primary'>Cancel</button>
			</form>
		</div>
 </a>
		
<?php else: ?>
	<a id='href' href="<?php echo base_url() ?>index.php/setting/form_edit_name" 
					  	 class="list-group-item row edit" data-id="name" data-value="<?php echo $name ;?>">
					   		<span class="col-sm-5 title">Full Name:</span>
					   		<div class="col-sm-6" >
						   		<span  id="edit_name" class="col-md-11" > 
						   			<?php echo $name ;?>
						   		</span>
						   		<span class="glyphicon glyphicon-pencil"></span>
					   		</div>
  </a>
<?php endif; ?>
