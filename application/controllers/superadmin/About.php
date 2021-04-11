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
		$this->load->view('superadmin/v_about_setting', $x);
	}

	function update()
	{
		$id_aboutme = htmlspecialchars($this->input->post('id_aboutme', TRUE), ENT_QUOTES);
		$fullname = $this->input->post('fullname_aboutme');
		$email = $this->input->post('email_aboutme');
		$location = $this->input->post('location_aboutme');
		$summary = $this->input->post('summary_aboutme');
		$skills = $this->input->post('skills_aboutme');
		$education = $this->input->post('education_aboutme');
		$googlescholar = $this->input->post('googlescholar_sites');
		$sinta = $this->input->post('sinta_sites');
		$linkedin = $this->input->post('linkedin_sites');
		$scopus = $this->input->post('scopus_sites');

		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = FALSE;

		$this->upload->initialize($config);
		if (!empty($_FILES['image_aboutme']['name'])) {
			if ($this->upload->do_upload('image_aboutme')) {
				$image_aboutme = $this->upload->data();
				$image = $image_aboutme['file_name'];
			}
			$this->setting_model->update_information_about($id_aboutme, $fullname, $email, $location, $summary, $skills, $education, $image, $googlescholar, $sinta, $scopus, $linkedin);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/about');
		} else {
			$this->setting_model->update_information_about_noimg($id_aboutme, $fullname, $email, $location, $summary, $skills, $education, $googlescholar, $sinta, $scopus, $linkedin);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/about');
		}
	}
	 	
}
