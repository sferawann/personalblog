<?php
class Tag_model extends CI_Model{

	function get_all_tag(){
		$result = $this->db->get('tags');
		return $result; 
	}

	function add_new_row($tag){
		$data = array(
	        'name_tags' => $tag
		);
		$this->db->insert('tags', $data);
	}

	function edit_row($id,$tag){
		$data = array(
	        'name_tags' => $tag
		);
		$this->db->where('id_tags', $id);
		$this->db->update('tags', $data);
	}

	function delete_row($id){
		$this->db->where('id_tags', $id);
		$this->db->delete('tags');
	}


}