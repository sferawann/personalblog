<?php
class Research extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('superadmin/Research_model', 'research_model');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	function index()
	{
		$x['data'] = $this->research_model->get_all_research();
		$this->load->view('superadmin/v_research', $x);
	}

	function add_new()
	{
		$this->load->view('superadmin/v_add_research');
	}


	function publish()
	{
		$data['publish'] = $this->research_model->save_research();
		echo $this->session->set_flashdata('msg', 'success');
		redirect('superadmin/Research');
	}

	function delete()
	{
		$id_research = $this->input->post('id', TRUE);
		$this->Research_model->delete_research($id_research);
		echo $this->session->set_flashdata('msg', 'success-delete');
		redirect('superadmin/research');
	}
}
