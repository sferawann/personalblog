<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inbox_model extends CI_Model
{

	function get_all_inbox($offset, $limit)
	{
		$query = $this->db->get('inbox', $offset, $limit);
		return $query;
	}

	function get_inbox_by_id($id_inbox)
	{
		$query = $this->db->get_where('inbox', array('id_inbox' => $id_inbox));
		return $query;
	}

	function search_inbox($keyword)
	{
		$this->db->like('name_inbox', $keyword);
		$this->db->or_like('subject_inbox', $keyword);
		$query = $this->db->get('inbox');
		return $query;
	}

	function update_status_by_id($id_inbox)
	{
		$data = array(
			'status_inbox' => 1
		);
		$this->db->where('id_inbox', $id_inbox);
		$this->db->update('inbox', $data);
	}

	function delete_inbox($id_inbox)
	{
		$this->db->where('id_inbox', $id_inbox);
		$this->db->delete('inbox');
	}
}
