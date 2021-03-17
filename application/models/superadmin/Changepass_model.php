<?php
class Changepass_model extends CI_Model{
	
	function checking_old_password($user_id,$old_pass){
		$this->db->where('id_user', $user_id);
		$this->db->where('password_user', $old_pass);
		$query = $this->db->get('user');
		return $query;
	}

	function change_password($user_id,$new_pass){
		$this->db->set('password_user', $new_pass);
		$this->db->where('id_user', $user_id);
		$this->db->update('user');
	}
}