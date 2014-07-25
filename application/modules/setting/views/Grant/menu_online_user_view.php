
<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		 <form class="navbar-form navbar-right" role="form" 
		 			action="<?php echo base_url() ?>index.php/home/signin" method="POST">
					 	<div>
					 			<label class="remember">
									<a href="<?php echo base_url() ?>index.php/home" 
										class="btn btn-info active" role="button">Home</a>
							      	</label>
			  					<label class="remember">I'm <?php echo $this->session->userdata('name');?></label>
			  					&nbsp;
							 	<div class="dropdown">
									  <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
									    	<span class="glyphicon glyphicon-cog" style="font-size:25px; color:#ffffff">
									    	</span>
									  </a>
									  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									    <li role="presentation"><a role="menuitem" tabindex="-1" 
									    		href="<?php echo base_url() ?>index.php/setting">Setting</a>
									    </li>
									     <li role="presentation" class="divider"></li>
									    <li role="presentation"><a role="menuitem" tabindex="-1" 
									    		href="<?php echo base_url() ?>index.php/home/logout">Sign out</a>
									    </li>
									  </ul>
								</div>
						</div>	 		
			</form>
  <!--    <div class="nav navbar-nav navbar-right">
         <a class="navbar-brand" href="#">Home</a>
      </div>-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

<div class="container" id="settingbody">
<div class="row">
	<div class="col-md-3">
		<div class="list-group " id="choose">
			<a class="list-group-item disabled active" style="font-weight: bold;">Your Setting</a>
			  <a href="<?php echo base_url() ?>index.php/setting/my_infor" 
			  		class="list-group-item " id="myInfo">My Infomation</a>
			  		<!--Neu user dang dang nhap co role la r01 or r02 thi [ q12]-->
			  <?php 
			  		foreach($this->session->userdata('role') as $key_r):
			  			if($key_r=='r01' or $key_r=='r02'):
			  ?>
			  <a href="<?php echo base_url() ?>index.php/setting/grant"  class="list-group-item">Grant</a>
			  <?php 		endif;
			  		endforeach;
			  ?>
			  <?php if($key_r=='r01'): ?>
			 <a href="<?php echo base_url() ?>index.php/setting/role_management"
			 		class="list-group-item">Roles Management</a>
			  <?php endif; ?>
		</div>
	</div>
	
	
	
	<div class="col-md-9" id="profilebody">
	
		<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Grant</h3>
  </div>
  <div class="panel-body">

  <?php //($role_signin_id == "r01"): ?>
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
<?php //else: ?>
		<table class="table" >
	<thead>
		<tr>
			<td>User ID</td>
			<td>Name</td>
			<td>User Name</td>
			<td>Enable</td>
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

  <?php //endif; ?>
 
  </div>
</div>

	</div>
</div>
</div>



<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
        		<span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $role_user['name']; ?></h4>
      </div>
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
</div>
-->