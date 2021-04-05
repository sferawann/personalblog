<?php

class Setting_model extends CI_Model
{

	function get_home_data()
	{
		$query = $this->db->get('home', 1);
		return $query;
	}

	function get_home_by_id($id_home)
	{
		$result = $this->db->query("SELECT * FROM home WHERE id_home='$id_home'");
		return $result;
	}

	function update_information($id_home, $caption1, $caption2, $bg_heading, $bg_testimoni)
	{
		$this->db->set('caption_1_home', $caption1);
		$this->db->set('caption_2_home', $caption2);
		$this->db->set('bgheading_home', $bg_heading);
		$this->db->set('bgtestimonial_home', $bg_testimoni);
		$this->db->where('id_home', $id_home);
		$this->db->update('home');
	}

	function update_information_heading($id_home, $caption1, $caption2, $bg_heading)
	{
		$this->db->set('caption_1_home', $caption1);
		$this->db->set('caption_2_home', $caption2);
		$this->db->set('bgheading_home', $bg_heading);
		$this->db->where('id_home', $id_home);
		$this->db->update('home');
	}

	function update_information_testimoni($id_home, $caption1, $caption2, $bg_testimoni)
	{
		$this->db->set('caption_1_home', $caption1);
		$this->db->set('caption_2_home', $caption2);
		$this->db->set('bgtestimonial_home', $bg_testimoni);
		$this->db->where('id_home', $id_home);
		$this->db->update('home');
	}

	function update_information_noimg($id_home, $caption1, $caption2)
	{
		$this->db->set('caption_1_home', $caption1);
		$this->db->set('caption_2_home', $caption2);
		$this->db->where('id_home', $id_home);
		$this->db->update('home');
	}

	// about information

	function get_about_data()
	{
		$query = $this->db->get('about', 1);
		return $query;
	}

	function get_about_by_id($id_about)
	{
		$result = $this->db->query("SELECT * FROM about WHERE id_about='$id_about'");
		return $result;
	}

	function save_home()
	{
		$this->form_validation->set_rules('caption_1_home', 'tittle_research', 'required');
		$this->form_validation->set_rules('caption_2_home', 'link_research', 'required');
		$this->form_validation->set_rules('bgheading_home', 'abstract_research', 'required');
		$this->form_validation->set_rules('bgtestimonial_home', 'abstract_research', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('superadmin/v_add_home');
		} else {
			$data = array(
				'caption_1_home'         => $this->input->post('caption_1_home'),
				'caption_2_home'         => $this->input->post('caption_2_home'),
				'bgheading_home'     => $this->input->post('bgheading_home'),
				'bgtestimonial_home'     => $this->input->post('bgtestimonial_home')

			);
			$this->db->insert('home', $data);
			$this->load->view('superadmin/v_add_home');
		}
	}

	function update_information_about($id_about, $description, $image)
	{
		$this->db->set('image_about', $image);
		$this->db->set('description_about', $description);
		$this->db->where('id_about', $id_about);
		$this->db->update('about');
	}

	function update_information_about_noimg($id_about, $description)
	{
		$this->db->set('description_about', $description);
		$this->db->where('id_about', $id_about);
		$this->db->update('about');
	}
}
