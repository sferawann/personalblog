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

	function get_edit()
	{
		$id_research = $this->uri->segment(4);
		$x['data'] = $this->research_model->get_research_by_id($id_research);
		$this->load->view('superadmin/v_edit_research', $x);
	}

	function edit()
	{
		$id 	  = $this->input->post('id_research', TRUE);
		$title	  = strip_tags(htmlspecialchars($this->input->post('tittle_research', TRUE), ENT_QUOTES));
		$link = $this->input->post('link_research');
		$abstract = $this->input->post('abstract_research', TRUE);

		$publisher  = $this->input->post('publisher_research', TRUE);
		$jurnalname   = $this->input->post('jurnalname_research', TRUE);
		$author     = $this->input->post('author_research', TRUE);
		$volume  = $this->input->post('volume_research', TRUE);
		$date = $this->input->post('date_research', TRUE);
		$pages = $this->input->post('pages_research', TRUE);

		$this->research_model->edit_research($id, $title, $link, $abstract, $publisher, $jurnalname, $author, $date, $pages, $volume);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('superadmin/research');
	}

	function delete()
	{
		$id_research = $this->input->post('id', TRUE);
		$this->Research_model->delete_research($id_research);
		echo $this->session->set_flashdata('msg', 'success-delete');
		redirect('superadmin/research');
	}
}
