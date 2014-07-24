<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Grant_mod extends CI_Model {
	public function __construct() {
		parent::__construct();
		$mgdb = new MongoClient();   
		  $this->db = $mgdb->ManagerUser;
	}
	
	//Lay tat ca cac partner user co gian hang = gian hang cua patner manager dang dang nhap
	public function get_user_pu($aisle_id){
		$get_user_pu=$this->db->users->find(array("roles"=>"r03", "aisle_id"=>$aisle_id));
		return $get_user_pu;
	}
	
	// get user 
	public function get_user($role_id){
		$get_user_pm=$this->db->users->find(array("roles"=>$role_id));
		return $get_user_pm;
	}
	
	// get role id of user clicked
	public function get_role_user_id($user_id){
		$get_role_user_id=$this->db->users->findOne(array("_id"=>$user_id),array("roles"=>1));
		return $get_role_user_id;
	}
	// get role nam to show in role of user
	public function get_role_name($role_id){
		$get_role_name=$this->db->Roles->findOne(array("_id"=>$role_id));
		return $get_role_name;
		
	}
	
	// update enable
	public function update_enable($check, $userid){
		$newdata = array('$set' => array("enable" =>$check));
		return  $this->db->users->update(array("_id" =>(int)$userid), $newdata);
	}
	
	public function find_user_id($user_id){
		$user = $this->db->users->findOne(array('_id'=>(int)$user_id));
		return $user;
	}

	public function find_per_name($per_id){
		$per = $this->db->Permissions->findOne(array('_id'=>$per_id));
		return $per;
	}

	// Neu khi phan quyen, per pi delete thi se luu vao bang tam  va codeigniter framework type=0
	public function dele_per($userid, $per_id){
		$per = $this->db->User_Permission->insert(array('user_id'=>(int)$userid,
														'per_id'=>$per_id,
														'type'=>0								
													));
	}
	//(int)$userid,  'type'=>0
															  
	public function find_per($userid){
		$find_per = $this->db->User_Permission->find(array('user_id'=>(int)$userid, 'type'=>0));	
		return $find_per;
	}
	
}
?>