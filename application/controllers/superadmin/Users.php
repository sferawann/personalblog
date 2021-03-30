<?php
class Users extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('superadmin/Users_model', 'users_model');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	function index()
	{
		$x['data'] = $this->users_model->get_users();
		$this->load->view('superadmin/v_users', $x);
		$this->load->helper('text');
	}

	function insert()
	{
		$nama = htmlspecialchars($this->input->post('name_user', TRUE), ENT_QUOTES);
		$email = htmlspecialchars($this->input->post('email_user', TRUE), ENT_QUOTES);
		$pass = htmlspecialchars($this->input->post('password_user', TRUE), ENT_QUOTES);
		$pass2 = htmlspecialchars($this->input->post('password2_user', TRUE), ENT_QUOTES);
		$level = htmlspecialchars($this->input->post('level_user', TRUE), ENT_QUOTES);

		$config['upload_path'] = './assets/img'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		$cek_email = $this->users_model->validasi_email($email);
		if ($cek_email->num_rows() > 0) {
			echo $this->session->set_flashdata('msg', 'error-email');
			redirect('superadmin/users');
		} else {
			if ($pass == $pass2) {
				if (!empty($_FILES['filefoto']['name'])) {
					if ($this->upload->do_upload('filefoto')) {
						$gbr = $this->upload->data();
						//Compress Image
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/img/' . $gbr['file_name'];
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = FALSE;
						$config['quality'] = '60%';
						$config['width'] = 100;
						$config['height'] = 100;
						$config['new_image'] = './assets/img/' . $gbr['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$gambar = $gbr['file_name'];
						$this->users_model->insert_user($nama, $email, $pass, $level, $gambar);
						echo $this->session->set_flashdata('msg', 'success');
						redirect('superadmin/users');
					} else {
						echo $this->session->set_flashdata('msg', 'error-img');
						redirect('superadmin/users');
					}
				} else {
					$this->users_model->insert_user_noimg($nama, $email, $pass, $level);
					echo $this->session->set_flashdata('msg', 'success');
					redirect('superadmin/users');
				}
			} else {
				echo $this->session->set_flashdata('msg', 'error');
				redirect('superadmin/users');
			}
		}
	}

	function update()
	{
		$userid = $this->input->post('id_user', TRUE);
		$nama = htmlspecialchars($this->input->post('name_user', TRUE), ENT_QUOTES);
		$email = htmlspecialchars($this->input->post('email_user', TRUE), ENT_QUOTES);
		$pass = htmlspecialchars($this->input->post('password_user', TRUE), ENT_QUOTES);
		$pass2 = htmlspecialchars($this->input->post('password2_user', TRUE), ENT_QUOTES);
		$level = htmlspecialchars($this->input->post('level_user', TRUE), ENT_QUOTES);

		$config['upload_path'] = './assets/images'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		$cek_email = $this->users_model->validasi_email($email);
		if ($cek_email->num_rows() > 0) {
			$row = $cek_email->row();
			$id_user = $row->id_user;
			if ($id_user <> $userid) {
				echo $this->session->set_flashdata('msg', 'error-email');
				redirect('superadmin/users');
			} else {
				if (empty($pass) || empty($pass2)) {
					if (!empty($_FILES['filefoto']['name'])) {
						if ($this->upload->do_upload('filefoto')) {
							$gbr = $this->upload->data();
							//Compress Image
							$config['image_library'] = 'gd2';
							$config['source_image'] = './assets/img/' . $gbr['file_name'];
							$config['create_thumb'] = FALSE;
							$config['maintain_ratio'] = FALSE;
							$config['quality'] = '60%';
							$config['width'] = 100;
							$config['height'] = 100;
							$config['new_image'] = './assets/img/' . $gbr['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$gambar = $gbr['file_name'];
							$this->users_model->update_user_nopass($userid, $nama, $email, $level, $gambar);
							echo $this->session->set_flashdata('msg', 'info');
							redirect('superadmin/users');
						} else {
							echo $this->session->set_flashdata('msg', 'error-img');
							redirect('superadmin/users');
						}
					} else {
						$this->users_model->update_user_nopassimg($userid, $nama, $email, $level);
						echo $this->session->set_flashdata('msg', 'info');
						redirect('superadmin/users');
					}
				} else {
					if ($pass == $pass2) {
						if (!empty($_FILES['filefoto']['name'])) {
							if ($this->upload->do_upload('filefoto')) {
								$gbr = $this->upload->data();
								//Compress Image
								$config['image_library'] = 'gd2';
								$config['source_image'] = './assets/img/' . $gbr['file_name'];
								$config['create_thumb'] = FALSE;
								$config['maintain_ratio'] = FALSE;
								$config['quality'] = '60%';
								$config['width'] = 100;
								$config['height'] = 100;
								$config['new_image'] = './assets/img/' . $gbr['file_name'];
								$this->load->library('image_lib', $config);
								$this->image_lib->resize();

								$gambar = $gbr['file_name'];
								$this->users_model->update_user($userid, $nama, $email, $pass, $level, $gambar);
								echo $this->session->set_flashdata('msg', 'info');
								redirect('superadmin/users');
							} else {
								echo $this->session->set_flashdata('msg', 'error-img');
								redirect('superadmin/users');
							}
						} else {
							$this->users_model->update_user_noimg($userid, $nama, $email, $pass, $level);
							echo $this->session->set_flashdata('msg', 'info');
							redirect('superadmin/users');
						}
					} else {
						echo $this->session->set_flashdata('msg', 'error');
						redirect('superadmin/users');
					}
				}
			}
		} else {
			if (empty($pass) || empty($pass2)) {
				if (!empty($_FILES['filefoto']['name'])) {
					if ($this->upload->do_upload('filefoto')) {
						$gbr = $this->upload->data();
						//Compress Image
						$config['image_library'] = 'gd2';
						$config['source_image'] = './assets/img/' . $gbr['file_name'];
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = FALSE;
						$config['quality'] = '60%';
						$config['width'] = 100;
						$config['height'] = 100;
						$config['new_image'] = './assets/img/' . $gbr['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$gambar = $gbr['file_name'];
						$this->users_model->update_user_nopass($userid, $nama, $email, $level, $gambar);
						echo $this->session->set_flashdata('msg', 'info');
						redirect('superadmin/users');
					} else {
						echo $this->session->set_flashdata('msg', 'error-img');
						redirect('superadmin/users');
					}
				} else {
					$this->users_model->update_user_nopassimg($userid, $nama, $email, $level);
					echo $this->session->set_flashdata('msg', 'info');
					redirect('superadmin/users');
				}
			} else {
				if ($pass == $pass2) {
					if (!empty($_FILES['filefoto']['name'])) {
						if ($this->upload->do_upload('filefoto')) {
							$gbr = $this->upload->data();
							//Compress Image
							$config['image_library'] = 'gd2';
							$config['source_image'] = './assets/img/' . $gbr['file_name'];
							$config['create_thumb'] = FALSE;
							$config['maintain_ratio'] = FALSE;
							$config['quality'] = '60%';
							$config['width'] = 100;
							$config['height'] = 100;
							$config['new_image'] = './assets/img/' . $gbr['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$gambar = $gbr['file_name'];
							$this->users_model->update_user($userid, $nama, $email, $pass, $level, $gambar);
							echo $this->session->set_flashdata('msg', 'info');
							redirect('superadmin/users');
						} else {
							echo $this->session->set_flashdata('msg', 'error-img');
							redirect('superadmin/users');
						}
					} else {
						$this->users_model->update_user_noimg($userid, $nama, $email, $pass, $level);
						echo $this->session->set_flashdata('msg', 'info');
						redirect('superadmin/users');
					}
				} else {
					echo $this->session->set_flashdata('msg', 'error');
					redirect('superadmin/users');
				}
			}
		}
	}

	function lock()
	{
		$id_user = $this->uri->segment(4);
		$this->users_model->lock_user($id_user);
		redirect('superadmin/users');
	}

	function unlock()
	{
		$id_user = $this->uri->segment(4);
		$this->users_model->unlock_user($id_user);
		redirect('superadmin/users');
	}

	function delete()
	{
		$userid = $this->input->post('kode', TRUE);
		$this->users_model->delete_user($userid);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('superadmin/users');
	}
}
