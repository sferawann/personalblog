<?php
class Experience extends CI_Controller
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
		$x['data'] = $this->setting_model->get_about_data();
		$this->load->view('superadmin/v_experience', $x);
	}

	function add_new()
	{
		$x['data']	   = $this->setting_model->get_about_data();
		$this->load->view('superadmin/v_add_experience', $x);
	}

	function get_edit()
	{
		$id_about = $this->uri->segment(4);
		$x['data'] = $this->setting_model->get_about_by_id($id_about);
		$this->load->view('superadmin/v_edit_experience', $x);
	}

	function publish()
	{
		$data['publish'] = $this->setting_model->save_experience();
		echo $this->session->set_flashdata('msg', 'success');
		redirect('superadmin/Experience');
	}

	function edit()
	{
		$id 	  = $this->input->post('id_about', TRUE);
		$name = $this->input->post('name_about', TRUE);
		$tahun = $this->input->post('tahun_about', TRUE);
		$description = $this->input->post('description_about', TRUE);

		$this->setting_model->edit_experience($id, $name, $tahun, $description);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('superadmin/experience');
	}

	function delete()
	{
		$id_about = $this->input->post('id_about', TRUE);
		$this->post_model->delete_experience($id_about);
		echo $this->session->set_flashdata('msg', 'success-delete');
		redirect('superadmin/about_setting');
	}
}
