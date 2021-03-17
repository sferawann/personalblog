<?php

class Navbar_model extends CI_Model
{

	function get_navbar()
	{
		$query = $this->db->get_where('navbar', array('parentid_navbar' => '0'));
		return $query;
	}

	function insert_navbar($name, $slug)
	{
		$data = array(
			'name_navbar' => $name,
			'slug_navbar' => $slug
		);
		$this->db->insert('navbar', $data);
	}

	function update_navbar($id, $name, $slug)
	{
		$this->db->set('name_navbar', $name);
		$this->db->set('slug_navbar', $slug);
		$this->db->where('id_navbar', $id);
		$this->db->update('navbar');
	}

	function delete_navbar($id)
	{
		$this->db->trans_start();
		$this->db->query("DELETE FROM navbar WHERE parentid_navbar='$id'");
		$this->db->query("DELETE FROM navbar WHERE id_navbar='$id'");
		$this->db->trans_complete();
	}

	function insert_subnavbar($name, $slug, $id)
	{
		$data = array(
			'name_navbar' => $name,
			'slug_navbar' => $slug,
			'parentid_navbar' => $id
		);
		$this->db->insert('navbar', $data);
	}
}
