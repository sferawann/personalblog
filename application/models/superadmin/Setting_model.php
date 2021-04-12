<?php

class Setting_model extends CI_Model
{

	function get_home_data()
	{
		$query = $this->db->get('home');
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

	function get_aboutme_data()
	{
		$query = $this->db->get('aboutme');
		return $query;
	}


	function get_about_by_id($id_about)
	{
		$result = $this->db->query("SELECT * FROM about WHERE id_about='$id_about'");
		return $result;
	}
	function get_aboutme_by_id($id_aboutme)
	{
		$result = $this->db->query("SELECT * FROM aboutme WHERE id_aboutme='$id_aboutme'");
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

	function edit_aboutme()
	{
		$id 	  = $this->input->post('id_aboutme');
		$fullname	  = $this->input->post('fullname_aboutme');
		$email = $this->input->post('email_aboutme');
		$location = $this->input->post('location_aboutme');
		$summary = $this->input->post('summary_aboutme');
		$skills = $this->input->post('skills_aboutme');
		$education = $this->input->post('education_aboutme');
		$googlescholar = $this->input->post('googlescholar_aboutme');
		$sinta = $this->input->post('sinta_aboutme');
		$linkedin = $this->input->post('linkedin_aboutme');
		$scopus = $this->input->post('scopus_aboutme');

		$data = array(
			'id_aboutme'       => $id,
			'fullname_aboutme'         => $fullname,
			'email_aboutme'     => $email,
			'location_aboutme'    => $location,
			'summary_aboutme'    => $summary,
			'skills_aboutme'    => $skills,
			'education_aboutme'    => $education,
			'googlescholar_aboutme'    => $googlescholar,
			'sinta_aboutme'    => $sinta,
			'linkedin_aboutme'    => $linkedin,
			'scopus_aboutme'    => $scopus
		);

		$this->db->where('id_aboutme', $id);
		$this->db->update('aboutme', $data);
	}

	function edit_aboutme_with_img($id, $image, $fullname, $email, $location, $summary, $skills, $education, $googlescholar, $sinta, $linkedin, $scopus)
	{
		$result = $this->db->query("UPDATE aboutme SET image_aboutme='$image',fullname_aboutme='$fullname',
		email_aboutme='$email',location_aboutme='$location',summary_aboutme='$summary',skills_aboutme='$skills',
		education_aboutme='$education', googlescholar_aboutme='$googlescholar', sinta_aboutme='$sinta',
		linkedin_aboutme='$linkedin',scopus_aboutme='$scopus' WHERE id_aboutme='$id'");
		return $result;
	}

	function edit_aboutme_no_img($id, $fullname, $email, $location, $summary, $skills, $education, $googlescholar, $sinta, $linkedin, $scopus)
	{
		$result = $this->db->query("UPDATE aboutme SET fullname_aboutme='$fullname',
		email_aboutme='$email',location_aboutme='$location',summary_aboutme='$summary',skills_aboutme='$skills',
		education_aboutme='$education', googlescholar_aboutme='$googlescholar', sinta_aboutme='$sinta',
		linkedin_aboutme='$linkedin',scopus_aboutme='$scopus' WHERE id_aboutme='$id'");
		return $result;
	}

	function delete_aboutme($id_aboutme)
	{
		$this->db->where('id_aboutme', $id_aboutme);
		$this->db->delete('about');
	}
}
