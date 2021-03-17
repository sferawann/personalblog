<?php
class Comment extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('superadmin/Comment_model', 'comment_model');
		$this->load->library('upload');
		error_reporting(0);
		$this->load->helper('text');
	}

	function index()
	{
		$count = $this->db->get_where('comment', array('parent_comment' => '0'));
		$page = $this->uri->segment(4);
		if (!$page) :
			$offset = 0;
		else :
			$offset = $page;
		endif;
		$limit = 10;
		$config['base_url'] = base_url() . 'superadmin/comment/index/';
		$config['total_rows'] = $count->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;

		//Tambahan untuk styling
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next >>';
		$config['prev_link'] = '<< Prev';
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		$data['data'] = $this->comment_model->get_all_comment($offset, $limit);
		$data['total_rows'] = $count->num_rows();
		$data['total_unpublish'] = $this->db->get_where('comment', array('status_comment' => '0'))->num_rows();
		$this->load->view('superadmin/v_comment', $data);
	}


	//upload image summernote
	function upload_image()
	{
		if (isset($_FILES["file"]["name"])) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('file')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '60%';
				$config['width'] = 600;
				$config['height'] = 488;
				$config['new_image'] = './assets/img/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url() . 'assets/img/' . $data['file_name'];
			}
		}
	}


	function reply()
	{
		$post_id = htmlspecialchars($this->input->post('id_post', TRUE), ENT_QUOTES);
		$comment_id = htmlspecialchars($this->input->post('is_comment', TRUE), ENT_QUOTES);
		$comments = $this->input->post('comment', TRUE);
		$user_id = $this->session->userdata('id');
		$query = $this->db->get_where('user', array('id_user' => $user_id));
		if ($query->num_rows() > 0) {
			$b = $query->row_array();
			$user_name = $b['name_user'];
			$user_email = $b['email_user'];
			$this->comment_model->reply_comment($post_id, $comment_id, $comments, $user_id, $user_name, $user_email);
			$this->session->set_flashdata('msg', 'success');
			redirect('superadmin/comment');
		} else {
			$this->session->set_flashdata('msg', 'error');
			redirect('superadmin/comment');
		}
	}

	function publish()
	{
		$id_comment = htmlspecialchars($this->input->post('id_comment1', TRUE), ENT_QUOTES);
		$this->comment_model->publish_comment($id_comment);
		$this->session->set_flashdata('msg', 'success-publish');
		redirect('superadmin/comment');
	}

	function edit()
	{
		$id_comment = htmlspecialchars($this->input->post('id_comment2', TRUE), ENT_QUOTES);
		$comments = $this->input->post('comments2', TRUE);
		$this->comment_model->edit_comment($id_comment, $comments);
		$this->session->set_flashdata('msg', 'success-edit');
		redirect('superadmin/comment');
	}

	function delete()
	{
		$id_comment = htmlspecialchars($this->input->post('id_comment3', TRUE), ENT_QUOTES);
		$this->comment_model->delete_comment($id_comment);
		$this->session->set_flashdata('msg', 'success-delete');
		redirect('superadmin/comment');
	}

	function change()
	{
		if (isset($_FILES["file"]["name"])) {
			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('file')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '60%';
				$config['width'] = 90;
				$config['height'] = 90;
				$config['new_image'] = './assets/img/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$image = $data['file_name'];
				$name  = htmlspecialchars($this->input->post('name', TRUE), ENT_QUOTES);
				$email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
				$id    = htmlspecialchars($this->input->post('id_comment5', TRUE), ENT_QUOTES);

				$this->comment_model->change_image($id, $name, $email, $image);
				$this->session->set_flashdata('msg', 'success-change');
				redirect('superadmin/comment');
			}
		}
	}

	function results()
	{
		$keyword = htmlspecialchars($this->input->get('search_query', TRUE), ENT_QUOTES);
		$data = $this->comment_model->search_comment($keyword);
		if ($data->num_rows() > 0) {
			$x['data'] = $data;
			$x['total_rows'] = $data->num_rows();
			$this->load->view('superadmin/v_comment', $x);
		} else {
			$this->session->set_flashdata('msg', 'info');
			redirect('superadmin/comment');
		}
	}

	function unpublish()
	{
		$count = $this->db->get_where('comment', array('status_comment' => '0'));
		$page = $this->uri->segment(4);
		if (!$page) :
			$offset = 0;
		else :
			$offset = $page;
		endif;
		$limit = 10;
		$config['base_url'] = base_url() . 'superadmin/comment/unpublish/';
		$config['total_rows'] = $count->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;

		//Tambahan untuk styling
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next >>';
		$config['prev_link'] = '<< Prev';
		$this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		$data['data'] = $this->comment_model->get_all_comment_unpublish($offset, $limit);
		$data['total_rows'] = $count->num_rows();
		$data['total_all'] = $this->db->get_where('comment', array('parent_comment' => '0'))->num_rows();
		$this->load->view('superadmin/v_comment_unpublish', $data);
	}
}
