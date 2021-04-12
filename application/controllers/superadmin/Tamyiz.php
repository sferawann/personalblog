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
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$audioconfig['upload_path'] = './assets/audio';
		$audioconfig['allowed_types'] = 'mp3|mp4';
		$audioconfig['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		$this->upload->initialize($audioconfig);

		if ((!empty($_FILES['image_tamyiz']['name1'])) && (!empty($_FILES['auidio_tamyiz']['name2']))) {
			if (($this->upload->do_upload('image_tamyiz')) && ($this->upload->do_upload('auidio_tamyiz'))) {
				// $img = $this->upload->data();
				$image_tamyiz = $this->upload->data();
				$image = $image_tamyiz['name1'];
				$audio_tamyiz = $this->upload->data();
				$audio = $audio_tamyiz['name2'];


				$title	  = $this->input->post('tittle_tamyiz', TRUE);
				$contents = $this->input->post('contents_tamyiz', TRUE);
				$metadescription = $this->input->post('metadescription_tamyiz', TRUE);

				$this->tamyiz_model->save_tamyiz($title, $contents, $metadescription, $image, $audio);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('superadmin/tamyiz');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('superadmin/tamyiz');
			}
		} else {
			redirect('superadmin/tamyiz');
		}
	}

	function edit()
	{
		$id = htmlspecialchars($this->input->post('id_tamyiz', TRUE), ENT_QUOTES);
		$tittle = $this->input->post('tittle_tamyiz');
		$contents = $this->input->post('contents_tamyiz');
		$metadescription = $this->input->post('metadescription_tamyiz');

		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|mp3|mp4';
		$config['encrypt_name'] = FALSE;
		$audioconfig['upload_path'] = './assets/audio/';
		$audioconfig['allowed_types'] = 'mp3|mp4';
		$audioconfig['encrypt_name'] = FALSE;

		$this->upload->initialize($config, $audioconfig);

		if (!empty($_FILES['image_tamyiz']['file_name1'])) {
			if ($this->upload->do_upload('image_tamyiz')) {
				$image_aboutme = $this->upload->data();
				$image = $image_aboutme['file_name1'];
			}
			$this->tamyiz_model->edit_tamyiz_with_img_audio($id, $tittle, $contents, $metadescription, $image);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/tamyiz');
		} elseif (!empty($_FILES['audio_tamyiz']['file_name2'])) {
			if ($this->upload->do_upload('audio_tamyiz')) {
				$audio_tamyiz = $this->upload->data();
				$audio = $audio_tamyiz['file_name2'];
			}
			$this->tamyiz_model->edit_tamyiz_with_img_audio($id, $tittle, $contents, $metadescription, $audio);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/tamyiz');
		} else {
			$this->tamyiz_model->edit_tamyiz_no_img_audio($id, $tittle, $contents, $metadescription);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/tamyiz');
		}
	}

	// function edit()
	// {
	// 	$config['upload_path'] = './assets/images/';
	// 	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	// 	$config['encrypt_name'] = TRUE;

	// 	$this->upload->initialize($config);

	// 	if (!empty($_FILES['filefoto']['name'])) {
	// 		if ($this->upload->do_upload('filefoto')) {
	// 			$img = $this->upload->data();
	// 			//Compress Image
	// 			$config['image_library'] = 'gd2';
	// 			$config['source_image'] = './assets/images/' . $img['file_name'];
	// 			$config['create_thumb'] = FALSE;
	// 			$config['maintain_ratio'] = FALSE;
	// 			$config['quality'] = '60%';
	// 			$config['width'] = 500;
	// 			$config['height'] = 320;
	// 			$config['new_image'] = './assets/images/' . $img['file_name'];
	// 			$this->load->library('image_lib', $config);
	// 			$this->image_lib->resize();

	// 			$this->_create_thumbs($img['file_name']);

	// 			$image = $img['file_name'];
	// 			$id 	  = $this->input->post('post_id', TRUE);
	// 			$title	  = strip_tags(htmlspecialchars($this->input->post('title', TRUE), ENT_QUOTES));
	// 			$contents = $this->input->post('contents');
	// 			$category = $this->input->post('category', TRUE);

	// 			$preslug  = strip_tags(htmlspecialchars($this->input->post('slug', TRUE), ENT_QUOTES));
	// 			$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $preslug);
	// 			$trim     = trim($string);
	// 			$praslug  = strtolower(str_replace(" ", "-", $trim));

	// 			$query = $this->db->get_where('tbl_post', array('post_slug' => $praslug));
	// 			if ($query->num_rows() > 1) {
	// 				$uniqe_string = rand();
	// 				$slug = $praslug . '-' . $uniqe_string;
	// 			} else {
	// 				$slug = $praslug;
	// 			}

	// 			$xtags[] = $this->input->post('tag');
	// 			foreach ($xtags as $tag) {
	// 				$tags = @implode(",", $tag);
	// 			}

	// 			$description = htmlspecialchars($this->input->post('description', TRUE), ENT_QUOTES);

	// 			$this->post_model->edit_post_with_img($id, $title, $contents, $category, $slug, $image, $tags, $description);
	// 			echo $this->session->set_flashdata('msg', 'info');
	// 			redirect('backend/post');
	// 		} else {
	// 			echo $this->session->set_flashdata('msg', 'warning');
	// 			redirect('backend/post');
	// 		}
	// 	} else {
	// 		$id 	  = $this->input->post('post_id', TRUE);
	// 		$title	  = strip_tags(htmlspecialchars($this->input->post('title', TRUE), ENT_QUOTES));
	// 		$contents = $this->input->post('contents');
	// 		$category = $this->input->post('category', TRUE);

	// 		$preslug  = strip_tags(htmlspecialchars($this->input->post('slug', TRUE), ENT_QUOTES));
	// 		$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $preslug);
	// 		$trim     = trim($string);
	// 		$praslug  = strtolower(str_replace(" ", "-", $trim));

	// 		$query = $this->db->get_where('tbl_post', array('post_slug' => $praslug));
	// 		if ($query->num_rows() > 1) {
	// 			$uniqe_string = rand();
	// 			$slug = $praslug . '-' . $uniqe_string;
	// 		} else {
	// 			$slug = $praslug;
	// 		}

	// 		$xtags[] = $this->input->post('tag');
	// 		foreach ($xtags as $tag) {
	// 			$tags = @implode(",", $tag);
	// 		}

	// 		$description = htmlspecialchars($this->input->post('description', TRUE), ENT_QUOTES);

	// 		$this->post_model->edit_post_no_img($id, $title, $contents, $category, $slug, $tags, $description);
	// 		echo $this->session->set_flashdata('msg', 'info');
	// 		redirect('backend/post');
	// 	}
	// }

	function delete()
	{
		$id_tamyiz = $this->input->post('id_tamyiz', TRUE);
		$this->tamyiz_model->delete_post($id_tamyiz);
		echo $this->session->set_flashdata('msg', 'success-delete');
		redirect('superadmin/tamyiz');
	}
}
