				<table class="table table-hover">
					  	<tr>
					  		<input  type="hidden" value="<?php echo $user_id; ?>" id="inp_userid"/>
					  		<td >Họ tên:</td>
					  		<td ><?php echo $name; ?></td>
					  	</tr>
					  	<tr>
					  		<td >User name:</td>
					  		<td ><?php echo $user_name; ?></td>
					  	</tr>
					  	<tr>
					  		<td >Roles:</td>
					  		<td ><?php foreach($role_name as $r_name):?>
					  				<input type="checkbox" value="<?php echo $r_name; ?>"/>
					  				<?php echo $r_name; ?><br>
					  				<?php endforeach; ?>
					  		</td>
					  		</tr>
					  		<tr>
					  			<div id="accordion">
					  			<td >
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
										<span class="caret"></span>Permission: </a>
								</td>
					  			<td>
									 <div id="collapseOne" class="panel-collapse collapse">
										<div class="panel-body">
											<?php foreach($permission as $per):?>
									  			<input type="checkbox" value="<?php echo $per['_id']; ?>" 
									  			class="inp_per"/>
									  			<?php echo $per['per_name']; ?><br>
							  					<?php endforeach; ?>
										 </div>
									</div>
					  			</td>
					  			</div>
					  		</tr>
					</table>
