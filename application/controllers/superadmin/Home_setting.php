<?php

class Home_setting extends CI_Controller
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
		$data = $this->setting_model->get_home_data()->row();
		$x['id_home'] = $data->id_home;
		$x['caption_1'] = $data->caption_1_home;
		$x['caption_2'] = $data->caption_2_home;
		$x['image_heading'] = $data->bgheading_home;
		$x['image_testimonial'] = $data->bgtestimonial_home;
		$this->load->view('superadmin/v_home_setting', $x);
	}

	function update()
	{
		$id_home = htmlspecialchars($this->input->post('id_home', TRUE), ENT_QUOTES);
		$caption1 = htmlspecialchars($this->input->post('caption1', TRUE), ENT_QUOTES);
		$caption2 = htmlspecialchars($this->input->post('caption2', TRUE), ENT_QUOTES);

		$config['upload_path'] = './theme/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = FALSE;

		$this->upload->initialize($config);
		if (!empty($_FILES['img_heading']['name']) && !empty($_FILES['img_testimonial']['name'])) {
			if ($this->upload->do_upload('img_heading')) {
				$img_heading = $this->upload->data();
				$bg_heading = $img_heading['file_name'];
			}
			if ($this->upload->do_upload('img_testimonial')) {
				$img_testimoni = $this->upload->data();
				$bg_testimoni = $img_testimoni['file_name'];
			}
			$this->setting_model->update_information($id_home, $caption1, $caption2, $bg_heading, $bg_testimoni);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/home_setting');
		} elseif (!empty($_FILES['img_heading']['name']) && empty($_FILES['img_testimonial']['name'])) {
			if ($this->upload->do_upload('img_heading')) {
				$img_heading = $this->upload->data();
				$bg_heading = $img_heading['file_name'];
			}
			$this->setting_model->update_information_heading($id_home, $caption1, $caption2, $bg_heading);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/home_setting');
		} elseif (empty($_FILES['img_heading']['name']) && !empty($_FILES['img_testimonial']['name'])) {
			if ($this->upload->do_upload('img_testimonial')) {
				$img_testimoni = $this->upload->data();
				$bg_testimoni = $img_testimoni['file_name'];
			}
			$this->setting_model->update_information_testimoni($id_home, $caption1, $caption2, $bg_testimoni);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/home_setting');
		} else {
			$this->setting_model->update_information_noimg($id_home, $caption1, $caption2);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/home_setting');
		}
	}
}
