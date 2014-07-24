<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends MX_Controller {
	 
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('session');
		$this->load->model("setting_mod");
		$this->load->model("grant_mod");
	}
	/*----------------------------------------------------My Information-----------------------------------------------*/
	// value of myinfor
	private function public_myinfor(){
		$id = $this->session->userdata("id");
		$inf_user = $this->setting_mod->get_infor_user($id);
		foreach($inf_user['roles'] as $key_r => $val_r){
			$role_id= $val_r;
		}
		
		$permissions_id=$this->setting_mod->get_role_id($role_id);
				foreach($permissions_id['permission'] as $key => $val){
					// get per_id and information of all permission
						$permissions= $this->setting_mod->get_permission($val);
						$array_per[$val]=$permissions['per_name'];
					}
				$roles = $permissions_id['role_name'];
					//var_dump($roles);
		$aisle_id=isset($inf_user['aisle_id'])?$inf_user['aisle_id']:NULL;
		$aisle_name=isset($inf_user['aisle_name'])?$inf_user['aisle_name']:NULL;
		$enable=isset($inf_user['enable'])?$inf_user['enable']:NULL;	
			
		 $array= array(
				'userid'=>$id,
				'name'=>$inf_user["name"],
				'aisle_id'=>$aisle_id,
				'aisle_name'=>$aisle_name,
				'username'=>$inf_user["user_name"],
				'pass'=>$inf_user["pass"],
				'enable'=>$enable,
				'role_id'=>$role_id,
				'roles'=>$roles,
				'permissions'=>$array_per
			);	
		return $array;
	}
	
	
	//--------- get information of user who loging
	public function my_infor(){
		$this->load->view("home/header");
		$array=$this->public_myinfor();
		$this->load->view("My_Infor/myInfo_body",$array);
		$this->load->view("home/footer");
	}
	
	
	/*--------------Edit name of user----------------*/
	public function form_edit_name(){
		$name = $this->input->post("value");
		$name_edit=array(
			'name'=>$name
		);
		$this->load->view("My_Infor/ajax_edit_name", $name_edit);
		//redirect("my_infor", 'refresh');
	}
	
	public function update_name_user(){
		$name_change = $this->input->post("name_edit");
		$userid =  $this->session->userdata("id");
		$name = $this->setting_mod->get_infor_user($userid);
		if($name_change===""){
			$name_edit=array(
				'temp'=>1,
				'name'=>$name['name']
			);
			$this->load->view("My_Infor/ajax_btn_save_name", $name_edit);
		}else{
			$this->setting_mod->update_name_user($userid, $name_change);
			$name_edit=array(
				'temp'=>2,
				'name'=>$name_change
			);
			$this->load->view("My_Infor/ajax_btn_save_name", $name_edit);
		}
		
		
	}
	
	
	
	/*--------------Edit username of user----------------*/
	public function form_edit_username(){
		$username = $this->input->post("value");
		$username_edit=array(
			'username'=>$username
		);
		$this->load->view("My_Infor/ajax_edit_username", $username_edit);
	}
	
	/*-------------update username --------------------------*/
	public function update_username_user(){
		$username_change = $this->input->post("username_edit");
		$userid =  $this->session->userdata("id");
		$username = $this->setting_mod->get_infor_user($userid);
		//var_dump($username['user_name']);
		if($username_change === $username['user_name']){
			$username_edit=array(
				'temp'=>1,
				'username'=>$username['user_name']
			);
		}else if($username_change == ""){
			$username_edit=array(
				'temp'=>2,
				'username'=>$username['user_name']
			);
		}else{
			$this->setting_mod->update_username_user($userid, $username_change);
			$username_edit=array(
				'temp'=>3,
				'username'=>$username_change
			);
		}
			$this->load->view("My_Infor/ajax_btn_save_username", $username_edit);
	}
	
	
	/*--------------Edit pass of user----------------*/
	public function form_edit_pass(){
		$pass = $this->input->post("value");
		$pass_edit=array(
			'pass'=>$pass
		);
		$this->load->view("My_Infor/ajax_edit_pass", $pass_edit);
	}
	///confirm pass
	public function update_pass(){
		$old_pass = $this->input->post("old_pass");
		$pass_new = $this->input->post("new_pass");
		$pass_conf_new= $this->input->post("conf_new_pass");
		//var_dump($pass_new);
		//var_dump($pass_conf_new);
		$userid =  $this->session->userdata("id");
		if($pass_new=="" or $pass_conf_new==""){
			$pass = array(
				'temp' => 1,
				'pass' => $old_pass
			);
		}else if($pass_new!==$pass_conf_new){
			$pass = array(
				'temp' => 2,
				'pass' => $old_pass
			);
		}else{
			$this->setting_mod->update_pass($userid, $pass_new);
			$pass=array(
				'temp' => 3,
				'pass'=>$pass_new
		);
	}
		$this->load->view("My_Infor/ajax_save_pass", $pass);
}

	/*------------------------------------Grant user--------------------------------	*/
	public function grant(){
		$this->load->view("home/header");
		//$array=$this->public_myinfor();
		foreach($this->session->userdata("role") as $role_id){
			if($role_id=="r01"){
				// Lay ten role co id=r02
				$user_pm=$this->setting_mod->get_role_id("r02");
				$role_name_pm = $user_pm["role_name"];
				// Lay ten role co id=r04
				$user_umo=$this->setting_mod->get_role_id("r04");
				$role_name_umo = $user_umo["role_name"];
				$arr = array(
					'role_signin_id'=>$role_id,
					"role_pm_id"=>"r02",
					"role_name_pm"=>$role_name_pm,
					"role_umo_id"=>"r04",
					"role_name_umo"=>$role_name_umo
				);
				//$this->load->view("Grant/grant_body", $arr);
			}elseif($role_id=="r02"){
		// neu user dag dag nhap la partner manger thi tim nhung partner user cua gian hang do -> den show_user_view 
				$aisle_id=$this->session->userdata("aisle_id");
			//	echo $aisle_id;
				$role=$this->grant_mod->get_user_pu($aisle_id);
				$arr = array(
					'role_signin_id'=>$role_id,
					"role"=>$role
				);
				//$this->load->view("Grant/grant_body",$arr);
			}
			$this->load->view("Grant/grant_body",$arr);
		}
		$this->load->view("home/footer");
	}
	
	public function grant_manage_partnermanager(){
		$this->load->view("home/header");
		$role=$this->grant_mod->get_user("r02");
		$user_pm=$this->setting_mod->get_role_id("r02");
		$role_name_pm = $user_pm["role_name"];
				// Lay ten role co id=r04
		$user_umo=$this->setting_mod->get_role_id("r04");
		$role_name_umo = $user_umo["role_name"];
		$arr = array(
					"role"=>$role,
					"role_pm_id"=>"r02",
					"role_name_pm"=>$role_name_pm,
					"role_umo_id"=>"r04",
					"role_name_umo"=>$role_name_umo
				);
		$this->load->view("Grant/manage_partnermanager_view", $arr);
		
		$this->load->view("home/footer");
	}
	
	
	public function grant_menu_online_user(){
		$this->load->view("home/header");
		$role=$this->grant_mod->get_user("r04");
		$user_pm=$this->setting_mod->get_role_id("r02");
		$role_name_pm = $user_pm["role_name"];
				// Lay ten role co id=r04
		$user_umo=$this->setting_mod->get_role_id("r04");
		$role_name_umo = $user_umo["role_name"];
		$arr = array(
					"role"=>$role,
					"role_pm_id"=>"r02",
					"role_name_pm"=>$role_name_pm,
					"role_umo_id"=>"r04",
					"role_name_umo"=>$role_name_umo
				);
		$this->load->view("Grant/menu_online_user_view", $arr);
		
		$this->load->view("home/footer");
	}
	
	public function get_role_id(){
		$user_id = $this->input->post("user_id");
		$role_use = $this->grant_mod->get_role_user_id((int)$user_id);
		foreach($role_use['roles'] as $key => $r_id){
			$r_name = $this->grant_mod->get_role_name($r_id);	
			$arr_role[$r_id] = $r_name['role_name'];
		}
		$arr_role_name = array('arr_role'=>$arr_role);
		$this->load->view("Grant/role_name",$arr_role_name);
	}
	
	public function update_enable(){
			$id=$this->input->post('id');
			$check=$this->input->post('val');
			$u=$this->grant_mod->update_enable((int)$check, $id);
			foreach($u as $key => $val){
				if($key=="nModified" && $val==1){
					$arr =array('modify'=>$val);
				}
			}
			echo json_encode($arr);
	}
	
	// system manager phan quyen cho partner manager va menu online user
	public function grant_user(){
		$user_id = $this->input->post("user_id");
		//var_dump($user_id);
		$user = $this->grant_mod->find_user_id((int)$user_id);
		//var_dump($user);
		$i=0; $j=0;
		$result_per=[];
		//trong bang role, lay tat ca cac per_id cua role do
		foreach($user['roles'] as $role_id){
			$arr_role_id[$role_id]=$role_id;
			$r_id=$this->grant_mod->get_role_name($role_id);
			$arr_role_name[$role_id] =  $r_id['role_name'];
			//var_dump($r_id['role_name']);
			foreach($r_id['permission'] as $per_id){
				$arr_per[$i]= $per_id;
				$i++;
			}
		}
		// Tim per luu trong bang tam, neu co type=0 thi unset per 
			$find_per = $this->grant_mod->find_per($user_id);
			foreach($find_per as $per){
				//var_dump($per['per_id']);
				if(in_array($per['per_id'], $arr_per) ){
					$val = $per['per_id'];
					$key = array_search($val,$arr_per);
					if($key!==false){
					    unset($arr_per[$key]);
					    
					}
				}
			}
		
		//ten per trong bang per
		//var_dump($arr_per);
		foreach($arr_per as $per_key => $per_id){
			//var_dump($per_id);
			$per=$this->grant_mod->find_per_name($per_id);
			$permission[$i] = $per;
			$i++;
		}
		
		$arr_user = array(
			'user_id'=>$user['_id'],
			'name'=>$user['name'],
			'user_name'=>$user['user_name'],
			'user_name'=>$user['user_name'],
			'pass'=>$user['pass'],
			'role_id'=>$arr_role_id,
			'role_name'=>$arr_role_name,
			'permission'=>$permission
			/*'permission_id'=>$arr_per,
			'permission_name'=>$permission*/
		);
		
		//$this->load->view("grant_view", $arr_user);
		$this->load->view("Grant/edit_modal", $arr_user);
		$this->load->view("home/footer");
	}
		
	// partner manager phan quyen cho partner user cua gian hang do
	public function grant_pu(){
		
	}
}
	
?>