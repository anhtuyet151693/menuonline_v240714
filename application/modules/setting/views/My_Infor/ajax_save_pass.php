 
 <?php if($temp===1): ?>
 		<a class="list-group-item row ">
	<span class="col-sm-5 title">PassWord:</span>
		<div class="col-sm-6" >
			<form method='POST' class='form-group' action="">
			<label>Old password:</label>
				<input  type="password"  id='old_pass' type='text' value="<?php echo $pass; ?>" 
						class='form-control'/>
					<br/>
			
			<label>New password:</label>
				<input  type="password"  id='new_pass' type='text'
						class='form-control'/>
					<br/>
			<label>Confirm new password:</label>
				<input  type="password"  id='conf_new_pass' type='text' 
						class='form-control'/>
				<div class="alert alert-danger" role="alert">It's not null</div><br></br>
					<button id='submit_save_pass' class='btn btn-primary'>Save change</button>
					<button id='submit_cancel' class='btn btn-primary'>Cancel</button>
			</form>
		</div>
 </a>
 
 
 <?php elseif($temp===2): ?>
 	<a class="list-group-item row ">
	<span class="col-sm-5 title">PassWord:</span>
		<div class="col-sm-6" >
			<form method='POST' class='form-group' action="">
			<label>Old password:</label>
				<input  type="password"  id='old_pass' type='text' value="<?php echo $pass; ?>" 
						class='form-control'/>
					<br/>
			
			<label>New password:</label>
				<input  type="password"  id='new_pass' type='text'
						class='form-control'/>
					<br/>
			<label>Confirm new password:</label>
				<input  type="password"  id='conf_new_pass' type='text' 
						class='form-control'/>
				<div class="alert alert-danger" role="alert">Password not confirm!</div><br></br>
					<button id='submit_save_pass' class='btn btn-primary'>Save change</button>
					<button id='submit_cancel' class='btn btn-primary'>Cancel</button>
			</form>
		</div>
 </a>
 
 <?php elseif ($temp===3):?>
 	 <a href="<?php echo base_url() ?>index.php/setting/form_edit_pass" 
		 class="list-group-item row edit" data-id="pass"  data-value="<?php echo $pass ;?>">
			<span class="col-sm-5 title">PassWord:</span>
					<div class="col-sm-6" id="pass">
						   <span class="col-md-11"></span>
						   <span class="glyphicon glyphicon-pencil"></span>
					 </div>
	</a>
 <?php endif; ?>
 
 
