<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_pass extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('superadmin/Changepass_model','changepass_model');
		$this->load->helper('text');
	}

	function index(){
		$this->load->view('superadmin/v_change_pass');
	}

	function change(){
		$user_id = $this->session->userdata('id');
		if(!empty($id_user)){
			$old_password = htmlspecialchars($this->input->post('old_password',TRUE),ENT_QUOTES);
			$new_password = htmlspecialchars($this->input->post('new_password',TRUE),ENT_QUOTES);
			$conf_password = htmlspecialchars($this->input->post('conf_password',TRUE),ENT_QUOTES);
			$old_pass = md5($old_password);
			$new_pass = md5($new_password);
			$checking_old_password = $this->changepass_model->checking_old_password($id_user,$old_pass);
			if($checking_old_password->num_rows() > 0){
				if($new_password == $conf_password){
					$this->changepass_model->change_password($id_user,$new_pass);
					$this->session->set_flashdata('msg','success');
					redirect('superadmin/change_pass');
				}else{
					$this->session->set_flashdata('msg','error-notmatch');
					redirect('superadmin/change_pass');
				}
			}else{
				$this->session->set_flashdata('msg','error-notfound');
				redirect('superadmin/change_pass');
			}
		}else{
			$this->session->set_flashdata('msg','error');
			redirect('superadmin/change_pass');
		}
	}
}