<?php

class About extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('About_model');
    }

    function index()
    {
        $data['About'] = $this->About_model->tampil_data()->result();
        $data['Post'] = $this->About_model->ambildata_course()->result();
        $this->load->view('about', $data);
    }
}
