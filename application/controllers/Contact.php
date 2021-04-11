<?php

class Contact extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
    }

    function index()
    {
        $data['Post'] = $this->Contact_model->ambildata_course()->result();
        $this->load->view('contact', $data);
    }

    function addinbox()
    {
        $data['addinbox'] = $this->Contact_model->add_inbox();
        // echo $this->session->set_flashdata('msg', 'success');
        $this->session->set_flashdata('msg', 'success');
        redirect('Contact');
    }
}
