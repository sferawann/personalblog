<?php

class About_setting extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('superadmin/Setting_model', 'setting_model');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	function index()
	{
		$data = $this->setting_model->get_about_data()->row();
		$x['id_about'] = $data->id_about;
		$x['image_about'] = $data->image_about;
		$x['description_about'] = $data->description_about;
		$this->load->view('superadmin/v_about_setting', $x);
	}

	function update()
	{
		$id_about = htmlspecialchars($this->input->post('id_about', TRUE), ENT_QUOTES);
		$description = $this->input->post('description', TRUE);

		$config['upload_path'] = './theme/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = FALSE;

		$this->upload->initialize($config);
		if (!empty($_FILES['img_about']['name'])) {
			if ($this->upload->do_upload('img_about')) {
				$img_about = $this->upload->data();
				$image = $img_about['file_name'];
			}
			$this->setting_model->update_information_about($id_about, $description, $image);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/about_setting');
		} else {
			$this->setting_model->update_information_about_noimg($id_about, $description);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/about_setting');
		}
	}
}
