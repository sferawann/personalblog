<?php

class Subscribe_model extends CI_Model
{

	function get_subscribers()
	{
		$query = $this->db->get('subscribe');
		return $query;
	}

	function update_status($id)
	{
		$this->db->set('status_subscribe', '1');
		$this->db->where('id_subscribe', $id);
		$this->db->update('subscribe');
	}

	function delete_email($id)
	{
		$this->db->where('id_subscribe', $id);
		$this->db->delete('subscribe');
	}

	function decrease_rating($id)
	{
		$this->db->set('rating_subscribe', 'rating_subscribe-1', FALSE);
		$this->db->where('id_subscribe', $id);
		$this->db->update('subscribe');
	}

	function increase_rating($id)
	{
		$this->db->set('rating_subscribe', 'rating_subscribe+1', FALSE);
		$this->db->where('id_subscribe', $id);
		$this->db->update('subscribe');
	}
}
