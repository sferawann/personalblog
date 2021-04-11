<?php

class Home extends CI_Controller
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
		$data['data'] = $this->setting_model->get_home_data();
		// $x['id_home'] = $data->id_home;
		// $x['caption_1'] = $data->caption_1_home;
		// $x['caption_2'] = $data->caption_2_home;
		// $x['image_heading'] = $data->bgheading_home;
		// $x['image_testimonial'] = $data->bgtestimonial_home;
		$this->load->view('superadmin/v_home', $data);
	}

	function add_new()
	{
		$this->load->view('superadmin/v_add_home');
	}

	function publish()
	{
		$data['publish'] = $this->setting_model->save_home();
		echo $this->session->set_flashdata('msg', 'success');
		redirect('superadmin/Home');
		
	}

	function get_edit()
	{
		$id_home = $this->uri->segment(4);
		$x['data'] = $this->setting_model->get_home_by_id($id_home);
		$this->load->view('superadmin/v_edit_home', $x);
	}

	function update()
	{
		$id_home = htmlspecialchars($this->input->post('id_home', TRUE), ENT_QUOTES);
		$caption1 = htmlspecialchars($this->input->post('caption_1_home', TRUE), ENT_QUOTES);
		$caption2 = htmlspecialchars($this->input->post('caption_2_home', TRUE), ENT_QUOTES);

		$config['upload_path'] = './theme/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = FALSE;

		$this->upload->initialize($config);
		if (!empty($_FILES['bgheading_heading']['name']) && !empty($_FILES['bgtestimonial_home']['name'])) {
			if ($this->upload->do_upload('bgheading_home')) {
				$img_heading = $this->upload->data();
				$bg_heading = $img_heading['file_name'];
			}
			if ($this->upload->do_upload('bgtestimonial_home')) {
				$img_testimoni = $this->upload->data();
				$bg_testimoni = $img_testimoni['file_name'];
			}
			$this->setting_model->update_information($id_home, $caption1, $caption2, $bg_heading, $bg_testimoni);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/home');
		} elseif (!empty($_FILES['bgheading_heading']['name']) && empty($_FILES['bgtestimonial_home']['name'])) {
			if ($this->upload->do_upload('bgheading_heading')) {
				$img_heading = $this->upload->data();
				$bg_heading = $img_heading['file_name'];
			}
			$this->setting_model->update_information_heading($id_home, $caption1, $caption2, $bg_heading);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/home');
		} elseif (empty($_FILES['bgheading_heading']['name']) && !empty($_FILES['bgtestimonial_home']['name'])) {
			if ($this->upload->do_upload('bgheading_heading')) {
				$img_testimoni = $this->upload->data();
				$bg_testimoni = $img_testimoni['file_name'];
			}
			$this->setting_model->update_information_testimoni($id_home, $caption1, $caption2, $bg_testimoni);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/home');
		} else {
			$this->setting_model->update_information_noimg($id_home, $caption1, $caption2);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/home');
		}
	}
	function delete()
	{
		$id_home = $this->input->post('id', TRUE);
		$this->setting_model->delete_home($id_home);
		echo $this->session->set_flashdata('msg', 'success-delete');
		redirect('superadmin/research');
	}
}
