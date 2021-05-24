<?php
class Tamyiz extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('superadmin/Tamyiz_model', 'tamyiz_model');
		$this->load->library('upload');
		$this->load->helper('form', 'url');
	}

	function index()
	{
		$x['data'] = $this->tamyiz_model->get_tamyiz_data();
		$this->load->view('superadmin/v_tamyiz', $x);
	}

	function add_new()
	{
		$x['data']	   = $this->tamyiz_model->get_tamyiz_data();
		// var_dump($x);
		// die;
		$this->load->view('superadmin/v_add_tamyiz', $x);
	}

	function get_edit()
	{
		$id_tamyiz = $this->uri->segment(4);
		$x['data'] = $this->tamyiz_model->get_tamyiz_by_id($id_tamyiz);
		$this->load->view('superadmin/v_edit_tamyiz', $x);
	}

	function publish()
	{
		$image_tamyiz = $_FILES['image_tamyiz']['name'];
		$date = date('Y-m-d_H-i-s');
		$filename = 'gambar_' . $date;
		if ($image_tamyiz) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = '*';
			$config['max_size']     = '2048';
			$config['file_name'] = $filename;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if ($this->upload->do_upload('image_tamyiz')) {
				$image_tamyiz = $this->upload->data('file_name');
				$data['image_tamyiz'] = $image_tamyiz;
			} else {
				$this->upload->display_errors();
			}
		}
		$audio_tamyiz = $_FILES['audio_tamyiz']['name'];
		$date = date('Y-m-d_H-i-s');
		$filename_ = 'musik_' . $date;
		if ($audio_tamyiz) {
			$config['upload_path'] = './assets/audio/';
			$config['allowed_types'] = '*';
			$config['max_size']     = '2048';
			$config['file_name'] = $filename_;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if ($this->upload->do_upload('audio_tamyiz')) {
				$audio_tamyiz = $this->upload->data('file_name');
				$data['audio_tamyiz'] = $audio_tamyiz;
			} else {
				$this->upload->display_errors();
			}
		}

		$title	  = $this->input->post('tittle_tamyiz', TRUE);
		$contents = $this->input->post('contents_tamyiz', TRUE);
		$metadescription = $this->input->post('metadescription_tamyiz', TRUE);

		$this->tamyiz_model->save_tamyiz($title, $contents, $metadescription, $data['audio_tamyiz'], $data['image_tamyiz']);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('superadmin/tamyiz');
	}

	// function edit()
	// {
	// 	$id = htmlspecialchars($this->input->post('id_tamyiz', TRUE), ENT_QUOTES);

	// }

	function edit()
	{
		$id = $_POST['id_tamyiz'];
		$upload1 = $_FILES['image_tamyiz']['name'];
		$upload2 = $_FILES['audio_tamyiz']['name'];

		$query = $this->db->query("SELECT `image_tamyiz`, `audio_tamyiz` FROM `tamyiz` WHERE `id_tamyiz` = $id ");

		$fileLama = $query->row_array();
		// var_dump($upload1);
		// die;

		if (!empty($upload1)) {
			$config['allowed_types'] = '*';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/img/';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('image_tamyiz')) {
				unlink(FCPATH . './assets/img/' . $fileLama['image_tamyiz']);
				$file = $this->upload->data('file_name');
				// $this->db->set('file', $file);
				$data['image_tamyiz'] = $file;
			} else {
				echo $this->upload->display_errors();
			}
			if (!empty($upload2)) {
				$config['allowed_types'] = '*';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/audio/';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('audio_tamyiz')) {
					unlink(FCPATH . './assets/img/' . $fileLama['audio_tamyiz']);
					$file_ = $this->upload->data('file_name');
					// $this->db->set('file', $file);
					$data['audio_tamyiz'] = $file_;
				} else {
					echo $this->upload->display_errors();
				}
			}
			$title	  = $this->input->post('tittle_tamyiz', TRUE);
			$contents = $this->input->post('contents_tamyiz', TRUE);
			$metadescription = $this->input->post('metadescription_tamyiz', TRUE);

			$this->tamyiz_model->edit_tamyiz_with_img_audio($id, $title, $contents, $metadescription, $data['audio_tamyiz'], $data['image_tamyiz']);
			echo $this->session->set_flashdata('msg', 'success');
			redirect('superadmin/tamyiz');
		}

		$title	  = $this->input->post('tittle_tamyiz', TRUE);
		$contents = $this->input->post('contents_tamyiz', TRUE);
		$metadescription = $this->input->post('metadescription_tamyiz', TRUE);

		$this->tamyiz_model->edit_tamyiz_no_img_audio($id, $title, $contents, $metadescription);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('superadmin/tamyiz');
		// var_dump($data);
		// die;
	}

	function delete()
	{
		$id_tamyiz = $this->input->post('id', TRUE);
		$this->tamyiz_model->delete($id_tamyiz);
		echo $this->session->set_flashdata('msg', 'success-delete');
		redirect('superadmin/tamyiz');
	}
}
