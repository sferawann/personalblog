<?php

class Auth extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index()
    {

        $this->form_validation->set_rules('username_user', 'Username_user', 'required|trim');
        $this->form_validation->set_rules('password_user', 'Password_user', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $usernames = $this->input->post('username_user');
        $passwords = $this->input->post('password_user');
        $user = $this->db->get_where('user', ['username_user' => $usernames])->row_array();
        if ($usernames == $user['username_user']) {
            if ($passwords == $user['password_user']) {
                $data = ['username_user' => $user['username_user']];
                $this->session->set_userdata($data);
                // print_r($data);
                redirect('Home');
            } else {
                $this->session->set_flashdata('error_password', 'Password salah');
                redirect('/');
            }
        } else {
            $this->session->set_flashdata('error_username', 'Username salah');
            redirect('/');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('logout', 'berhasil');
        redirect('Auth');
    }
}
