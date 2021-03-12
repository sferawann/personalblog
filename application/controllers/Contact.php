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
        $data['Course'] = $this->Contact_model->ambildata_course()->result();
        $this->load->view('contact', $data);
    }
}
