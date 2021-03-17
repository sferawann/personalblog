<?php
class Category_model extends CI_Model{

	function get_all_category(){
		$result = $this->db->get('category');
		return $result; 
	}

	function add_new_row($category,$slug){
		$data = array(
	        'name_category' => $category,
	        'slug_category' => $slug
		);
		$this->db->insert('category', $data);
	}

	function edit_row($id,$category,$slug){
		$data = array(
	        'name_category' => $category,
	        'slug_category' => $slug
		);
		$this->db->where('id_category', $id);
		$this->db->update('category', $data);
	}

	function delete_row($id){
		$this->db->where('id_category', $id);
		$this->db->delete('category');
	}


}