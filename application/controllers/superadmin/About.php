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
		$x['about'] = $this->setting_model->get_about_data();
		$x['aboutmeandsites'] = $this->setting_model->get_aboutmeandsites_data();
		$this->load->view('superadmin/v_about', $x);
	}

	function get_edit()
	{
		$id_aboutme = $this->uri->segment(4);
		$x['aboutmeandsites'] = $this->setting_model->get_aboutme_by_id($id_aboutme);
		$this->load->view('superadmin/v_edit_about', $x);
	}
	function edit()
	{
		$id_aboutme 	  = $this->input->post('id_aboutme', TRUE);
		$fullname_aboutme = $this->input->post('fullname_aboutme', TRUE);
		$email_aboutme = $this->input->post('email_aboutme', TRUE);
		$location_aboutme = $this->input->post('location_aboutme', TRUE);
		$summary_aboutme = $this->input->post('summary_aboutme', TRUE);
		$skills_aboutme = $this->input->post('skills_aboutme', TRUE);
		$education_aboutme = $this->input->post('education_aboutme', TRUE);
		$id_sites = $this->input->post('id_sites', TRUE);
		$googlescholar_sites = $this->input->post('googlescholar_sites', TRUE);
		$sinta_sites = $this->input->post('sinta_sites', TRUE);
		$scopus_sites = $this->input->post('scopus_sites', TRUE);
		$linkedin_sites = $this->input->post('linkedin_sites', TRUE);

		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = FALSE;

		$this->upload->initialize($config);
		if (!empty($_FILES['image_aboutme']['name'])) {
			if ($this->upload->do_upload('image_aboutme')) {
				$image_aboutme = $this->upload->data();
				$image_aboutme = $image_aboutme['file_name'];
			}
			$this->setting_model->edit_aboutme($id_aboutme, $fullname_aboutme, $email_aboutme, $location_aboutme, $summary_aboutme, $skills_aboutme, $education_aboutme, $id_sites, $googlescholar_sites, $sinta_sites, $scopus_sites, $linkedin_sites);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/about');
		} else {
			$this->setting_model->edit_aboutme($id_aboutme, $fullname_aboutme, $email_aboutme, $location_aboutme, $summary_aboutme, $skills_aboutme, $education_aboutme, $id_sites, $googlescholar_sites, $sinta_sites, $scopus_sites, $linkedin_sites);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/about');
		}

		$this->setting_model->edit_aboutme($id_aboutme, $fullname_aboutme, $email_aboutme, $location_aboutme, $summary_aboutme, $skills_aboutme, $education_aboutme, $id_sites, $googlescholar_sites, $sinta_sites, $scopus_sites, $linkedin_sites);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('superadmin/about');
	}

	function delete()
	{
		$id_about = $this->input->post('id_about', TRUE);
		$this->post_model->delete_experience($id_about);
		echo $this->session->set_flashdata('msg', 'success-delete');
		redirect('superadmin/about_setting');
	}

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
