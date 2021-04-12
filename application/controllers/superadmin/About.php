<?php

class About extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('superadmin/Setting_model', 'setting_model');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	function index()
	{
		// $x['about'] = $this->setting_model->get_about_data();
		$x['data'] = $this->setting_model->get_aboutme_data();
		$this->load->view('superadmin/v_about', $x);
	}

	function get_edit()
	{
		$id_aboutme = $this->uri->segment(4);
		$x['data'] = $this->setting_model->get_aboutme_by_id($id_aboutme);
		$this->load->view('superadmin/v_edit_about', $x);
	}

	function edit()
	{
		$id = htmlspecialchars($this->input->post('id_aboutme', TRUE), ENT_QUOTES);
		$fullname = $this->input->post('fullname_aboutme');
		$email = $this->input->post('email_aboutme');
		$location = $this->input->post('location_aboutme');
		$summary = $this->input->post('summary_aboutme');
		$skills = $this->input->post('skills_aboutme');
		$education = $this->input->post('education_aboutme');
		$googlescholar = $this->input->post('googlescholar_aboutme');
		$sinta = $this->input->post('sinta_aboutme');
		$linkedin = $this->input->post('linkedin_aboutme');
		$scopus = $this->input->post('scopus_aboutme');

		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = FALSE;

		$this->upload->initialize($config);
		if (!empty($_FILES['image_aboutme']['file_name'])) {
			if ($this->upload->do_upload('image_aboutme')) {
				$image_aboutme = $this->upload->data();
				$image = $image_aboutme['file_name'];
			}
			$this->setting_model->edit_aboutme_with_img($id, $image, $fullname, $email, $location, $summary, $skills, $education,  $googlescholar, $sinta, $scopus, $linkedin);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/about');
		} else {
			$this->setting_model->edit_aboutme_no_img($id, $fullname, $email, $location, $summary, $skills, $education, $googlescholar, $sinta, $scopus, $linkedin);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/about');
		}
		// $id 	  = $this->input->post('id_aboutme');
		// $fullname	  = $this->input->post('fullname_aboutme');
		// $email = $this->input->post('email_aboutme');
		// $location = $this->input->post('location_aboutme');
		// $summary = $this->input->post('summary_aboutme');
		// $skills = $this->input->post('skills_aboutme');
		// $education = $this->input->post('education_aboutme');
		// $googlescholar = $this->input->post('googlescholar_aboutme');
		// $sinta = $this->input->post('sinta_aboutme');
		// $linkedin = $this->input->post('linkedin_aboutme');
		// $scopus = $this->input->post('scopus_aboutme');


		// $this->setting_model->edit_aboutme($id, $fullname, $email, $location, $summary, $skills, $education, $googlescholar, $sinta, $linkedin, $scopus);
		// echo $this->session->set_flashdata('msg', 'info');
		// redirect('superadmin/about');
	}
	function delete()
	{
		$id_aboutme = $this->input->post('id_aboutme', TRUE);
		$this->setting_model->delete_aboutme($id_aboutme);
		echo $this->session->set_flashdata('msg', 'success-delete');
		redirect('superadmin/about');
	}

	// function edit()
	// {
	// 	$config['upload_path'] = './assets/img/';
	// 	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	// 	$config['encrypt_name'] = TRUE;

	// 	$this->upload->initialize($config);

	// 	if (!empty($_FILES['image_aboutme']['name'])) {
	// 		if ($this->upload->do_upload('image_aboutme')) {
	// 			$img = $this->upload->data();
	// 			//Compress Image
	// 			$config['image_library'] = 'gd2';
	// 			$config['source_image'] = './assets/img/' . $img['file_name'];
	// 			$config['create_thumb'] = FALSE;
	// 			$config['maintain_ratio'] = FALSE;
	// 			$config['quality'] = '60%';
	// 			$config['width'] = 500;
	// 			$config['height'] = 320;
	// 			$config['new_image'] = './assets/img/' . $img['file_name'];
	// 			$this->load->library('image_lib', $config);
	// 			$this->image_lib->resize();

	// 			$this->_create_thumbs($img['file_name']);

	// 			$image = $img['file_name'];
	// 			$id 	  = $this->input->post('id_aboutme');
	// 			$fullname	  = $this->input->post('fullname_aboutme');
	// 			$email = $this->input->post('email_aboutme');
	// 			$location = $this->input->post('location_aboutme');
	// 			$summary = $this->input->post('summary_aboutme');
	// 			$skills = $this->input->post('skills_aboutme');
	// 			$education = $this->input->post('education_aboutme');
	// 			$googlescholar = $this->input->post('googlescholar_aboutme');
	// 			$sinta = $this->input->post('sinta_aboutme');
	// 			$linkedin = $this->input->post('linkedin_aboutme');
	// 			$scopus = $this->input->post('scopus_aboutme');

	// 			$this->setting_model->edit_aboutme_with_img($id, $fullname, $email, $location, $summary, $image, $skills, $education, $googlescholar, $sinta, $linkedin, $scopus);
	// 			// var_dump($c);
	// 			// print_r($c);
	// 			echo $this->session->set_flashdata('msg', 'info');
	// 			redirect('superadmin/about');
	// 		} else {
	// 			echo $this->session->set_flashdata('msg', 'warning');
	// 			redirect('superadmin/about');
	// 		}
	// 	} else {
	// 		$id 	  = $this->input->post('id_aboutme');
	// 		$fullname	  = $this->input->post('fullname_aboutme');
	// 		$email = $this->input->post('email_aboutme');
	// 		$location = $this->input->post('location_aboutme');
	// 		$summary = $this->input->post('summary_aboutme');
	// 		$skills = $this->input->post('skills_aboutme');
	// 		$education = $this->input->post('education_aboutme');
	// 		$googlescholar = $this->input->post('googlescholar_aboutme');
	// 		$sinta = $this->input->post('sinta_aboutme');
	// 		$linkedin = $this->input->post('linkedin_aboutme');
	// 		$scopus = $this->input->post('scopus_aboutme');

	// 		$this->setting_model->edit_aboutme_with_img($id, $fullname, $email, $location, $summary, $skills, $education, $googlescholar, $sinta, $linkedin, $scopus);
	// 		// var_dump($c);
	// 		// print_r($c);
	// 		echo $this->session->set_flashdata('msg', 'info');
	// 		redirect('superadmin/about');
	// 	}
	// }

	// function _create_thumbs($file_name)
	// {
	// 	// Image resizing config
	// 	$config = array(
	// 		array(
	// 			'image_library' => 'GD2',
	// 			'source_image'  => './assets/img/' . $file_name,
	// 			'maintain_ratio' => FALSE,
	// 			'width'         => 370,
	// 			'height'        => 237,
	// 			'new_image'     => './assets/img/thumb/' . $file_name
	// 		)
	// 	);

	// 	$this->load->library('image_lib', $config[0]);
	// 	foreach ($config as $item) {
	// 		$this->image_lib->initialize($item);
	// 		if (!$this->image_lib->resize()) {
	// 			return false;
	// 		}
	// 		$this->image_lib->clear();
	// 	}
	// }



	// function update()
	// {
	// 	$id_aboutme = htmlspecialchars($this->input->post('id_aboutme', TRUE), ENT_QUOTES);
	// 	$fullname = $this->input->post('fullname_aboutme');
	// 	$email = $this->input->post('email_aboutme');
	// 	$location = $this->input->post('location_aboutme');
	// 	$summary = $this->input->post('summary_aboutme');
	// 	$skills = $this->input->post('skills_aboutme');
	// 	$education = $this->input->post('education_aboutme');
	// 	$googlescholar = $this->input->post('googlescholar_sites');
	// 	$sinta = $this->input->post('sinta_sites');
	// 	$linkedin = $this->input->post('linkedin_sites');
	// 	$scopus = $this->input->post('scopus_sites');

	// 	$config['upload_path'] = './assets/img/';
	// 	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	// 	$config['encrypt_name'] = FALSE;

	// 	$this->upload->initialize($config);
	// 	if (!empty($_FILES['image_aboutme']['name'])) {
	// 		if ($this->upload->do_upload('image_aboutme')) {
	// 			$image_aboutme = $this->upload->data();
	// 			$image = $image_aboutme['file_name'];
	// 		}
	// 		$this->setting_model->update_information_about($id_aboutme, $fullname, $email, $location, $summary, $skills, $education, $image, $googlescholar, $sinta, $scopus, $linkedin);
	// 		$this->session->set_flashdata('msg', 'success');
	// 		redirect('superadmin/about');
	// 	} else {
	// 		$this->setting_model->update_information_about_noimg($id_aboutme, $fullname, $email, $location, $summary, $skills, $education, $googlescholar, $sinta, $scopus, $linkedin);
	// 		$this->session->set_flashdata('msg', 'success');
	// 		redirect('superadmin/about');
	// 	}
	// }

}
