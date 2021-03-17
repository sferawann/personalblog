<?php

class Testimonial_model extends CI_Model
{

	function get_testimonial()
	{
		$query = $this->db->get('testimonial');
		return $query;
	}

	function insert_testimonial($nama, $content, $gambar)
	{
		$data = array(
			'name_testimonial' => $nama,
			'content_testimonial' => $content,
			'image_testimonial' => $gambar,
		);
		$this->db->insert('testimonial', $data);
	}

	function update_testimonial($id, $nama, $content, $gambar)
	{
		$this->db->set('name_testimonial', $nama);
		$this->db->set('content_testimonial', $content);
		$this->db->set('image_testimonial', $gambar);
		$this->db->where('id_testimonial', $id);
		$this->db->update('testimonial');
	}

	function update_testimonial_noimg($id, $nama, $content)
	{
		$this->db->set('name_testimonial', $nama);
		$this->db->set('content_testimonial', $content);
		$this->db->where('id_testimonial', $id);
		$this->db->update('testimonial');
	}

	function delete_testimonial($id_testimonial)
	{
		$this->db->where('id_testimonial', $id_testimonial);
		$this->db->delete('testimonial');
	}
}
