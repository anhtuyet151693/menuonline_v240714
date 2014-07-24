
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
										class="glyphicon glyphicon-pencil grant" 
										data-id="<?php echo $role_user['_id']; ?>" 
										data-toggle="modal" data-target=".bs-example-modal-lg"
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




<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div id="loadmodal">
				
			</div>
	 <div class="modal-footer">
       <button type="button" class="btn btn-default">Save changes</button>
        <button type="button" class="btn btn-default">Add roles</button>
         <button type="button" class="btn btn-default">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
       
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<!--<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" 
		aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
        		<span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $role_user['name']; ?></h4>
      </div>
      <div class="modal-body">
		<div class="row">
			<div id="loadmodal">
				
			</div>
			</div>
        
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default">Save changes</button>
        <button type="button" class="btn btn-default">Add roles</button>
         <button type="button" class="btn btn-default">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
       
      </div>
    </div>
  </div>
</div>-->