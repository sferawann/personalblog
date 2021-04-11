<?php

class Setting_model extends CI_Model
{

	function get_home_data()
	{
		$query = $this->db->get('home');
		return $query;
	}
	function get_aboutmeandsites_data()
	{
		$this->db->select('am.id_aboutme, am.image_aboutme, am.fullname_aboutme, am.email_aboutme, 
		am.location_aboutme, am.summary_aboutme, am.skills_aboutme, am.education_aboutme, s.googlescholar_sites, 
		s.sinta_sites, s.scopus_sites, s.linkedin_sites')->from('aboutme as am');
		$this->db->join('sites as s', 'am.id_aboutme = s.id_sites', 'left');
		$query = $this->db->get();
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
		$query = $this->db->get('about');
		return $query;
	}

	function get_about_by_id($id_about)
	{
		$result = $this->db->query("SELECT * FROM about WHERE id_about='$id_about'");
		return $result;
	}

	function save_experience()
	{
		$this->form_validation->set_rules('name_about', 'name_about', 'required');
		$this->form_validation->set_rules('tahun_about', 'tahun_about', 'required');
		$this->form_validation->set_rules('description_about', 'description_about', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('superadmin/v_add_experience');
		} else {
			$data = array(
				'name_about'         => $this->input->post('name_about'),
				'tahun_about'         => $this->input->post('tahun_about'),
				'description_about'     => $this->input->post('description_about')
			);
			$this->db->insert('about', $data);
			$this->load->view('superadmin/v_add_experience');
		}
	}

	function edit_experience()
	{
		$id_about      = $this->input->post('id_about');
		$name_about      = $this->input->post('name_about');
		$tahun_about        = $this->input->post('tahun_about');
		$description_about    = $this->input->post('description_about');

		$data = array(
			'id_about'       => $id_about,
			'name_about'         => $name_about,
			'tahun_about'     => $tahun_about,
			'description_about'    => $description_about
		);

		$this->db->where('id_about', $id_about);
		$this->db->update('about', $data);
	}

	function save_home()
	{
		$this->form_validation->set_rules('caption_1_home', 'caption_1_home', 'required');
		$this->form_validation->set_rules('caption_2_home', 'caption_2_home', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('superadmin/v_add_home');
		} else {

			$config['upload_path'] = './theme/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['encrypt_name'] = FALSE;
			$this->load->library('upload', $config);
			if ($_FILES['bgheading_home']['tmp_name'] != '') {
				if (!$this->upload->do_upload('bgheading_home')) {
					echo "<script type='text/javascript'>window.alert('Gagal Tersimpan, Cek Kelengkapan Data Masukan Foto')</script>";
					redirect('superadmin/Home', 'refresh');
				} else {
					$gambar = $this->upload->data();
					$photo1 = $gambar['file_name'];
				}
			} elseif ($_FILES['bgtestimonial_home']['tmp_name'] != '') {
				if (!$this->upload->do_upload('bgtestimonial_home')) {
					echo "<script type='text/javascript'>window.alert('Gagal Tersimpan, Cek Kelengkapan Data Masukan Foto')</script>";
					redirect('superadmin/Home', 'refresh');
				} else {
					$gambar = $this->upload->data();
					$photo2 = $gambar['file_name'];
				}
			} else {
				$photo1 = '';
				$photo2 = '';
			}
			$home = array(
				'caption_1_home' => $this->input->post('caption_1_home'),
				'caption_2_home' => $this->input->post('caption_2_home'),
				'bgheading_home' => $photo1,
				'bgtestimonial_home' => $photo2,
			);
			$this->db->insert('home', $home);
		}
	}

	function update_information_about($id_aboutme, $email, $location, $summary, $skills, $education, $image, $id_sites, $googlescholar, $sinta, $linkedin, $scopus)
	{
		$this->db->set('image_aboutme', $image);
		$this->db->set('email_aboutme', $email);
		$this->db->set('location_aboutme', $location);
		$this->db->set('summary_aboutme', $summary);
		$this->db->set('skills_aboutme', $skills);
		$this->db->set('education_aboutme', $education);
		$this->db->where('id_aboutme', $id_aboutme);
		$this->db->update('about');

		$this->db->set('googlescholar_sites', $googlescholar);
		$this->db->set('sinta_sites', $sinta);
		$this->db->set('linkedin_sites', $linkedin);
		$this->db->set('scopus_sites', $scopus);
		$this->db->where('id_sites', $id_sites);
		$this->db->update('sites');
	}

	function update_information_about_noimg($id_aboutme, $email, $location, $summary, $skills, $education, $id_sites, $googlescholar, $sinta, $linkedin, $scopus)
	{
		$this->db->set('email_aboutme', $email);
		$this->db->set('location_aboutme', $location);
		$this->db->set('summary_aboutme', $summary);
		$this->db->set('skills_aboutme', $skills);
		$this->db->set('education_aboutme', $education);
		$this->db->where('id_aboutme', $id_aboutme);
		$this->db->update('about');

		$this->db->set('googlescholar_sites', $googlescholar);
		$this->db->set('sinta_sites', $sinta);
		$this->db->set('linkedin_sites', $linkedin);
		$this->db->set('scopus_sites', $scopus);
		$this->db->where('id_sites', $id_sites);
		$this->db->update('sites');
	}

	//experience

}
