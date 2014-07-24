
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Grant</h3>
  </div>
  <div class="panel-body">

  <?php if($role_signin_id == "r01"): ?>
	 	 <div>
	   		<a type="button" class="btn btn-default btn_infor"  data-id="r02" 
	   			href="<?php echo base_url() ?>index.php/setting/grant_manage_partnermanager">
	   				<?php echo $role_name_pm ;?>
	   		</a>
	   		<a type="button" class="btn btn-default btn_infor"  data-id="r04"
	   			href="<?php echo base_url() ?>index.php/setting/grant_menu_online_user" >
	   				<?php echo $role_name_umo ;?>
	   		</a>
		</div>
		 <div id="body_panel">
		
		</div>
<?php else: ?>
		<table class="table" >
	<thead>
		<tr>
			<td>User ID</td>
			<td>Name</td>
			<td>User Name</td>
			<td>Enable</td>
			<td>Aisle name</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>
	</thead>
						
	<tbody>				
		<?php $i=0;
			 foreach($role as $role_user): 
			$i++; ?>
			<tr  data-id="<?php echo $role_user['_id'];?>" >
				<td class="id"><?php echo $role_user['_id'];?></td>
				<td>
					<div>
					 <div>
						<a data-toggle="collapse" data-parent="#accordion" 
							href="#abc<?php echo $i; ?>" data-id = "<?php echo $role_user['_id'] ;?>" class="get_role"> 
								<?php echo $role_user['name'];?>
						 </a>
					 </div>
					<div id="abc<?php echo $i; ?>" class="panel-collapse collapse" >
						 <div class="panel-body  well-sm">
								<table class="table">									
										<tr>
											<td>Roles:</td>
											<td id="<?php echo $role_user['_id'] ;?>">							
											 </td>
										</tr>
								  </table>
							</div>
						</div>
					</div>
				</td>
				<td><?php echo $role_user["user_name"];?></td>
				<td>
					<input data-id="<?php echo $role_user['_id'];?>" data-name="<?php echo $role_user['name'];?>" 
								<?php if($role_user["enable"]){echo "checked";}?>  type="checkbox" class="chk_enable"  
								value="<?php echo $role_user["enable"] ?>"/>
						</td>
						<?php $gh_name=isset($role_user['aisle_name'])?$role_user['aisle_name']:NULL;
												if($gh_name!=NULL): ?>
											<td><?php echo  $gh_name;	?></td>
											<?php else: ?><td></td>
												<?php endif; ?>
						<td >			
									<a  data-name = "<?php echo $role_user['user_name']; ?>"
										class="glyphicon glyphicon-pencil edit grant" 
										data-id="<?php echo $role_user['_id']; ?>" 
										data-toggle="modal" data-target="#myModal"
									</a>
						</td>
						<td><a class="glyphicon glyphicon-trash delete" data-id="<?php echo $role_user['_id'];?>" 
							data-name="<?php echo $role_user['user_name']; ?>" >
							</a>
						</td>
			</tr>
			<?php endforeach;?>
	</tbody>
</table>

  <?php endif; ?>
 
  </div>
</div>