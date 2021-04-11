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
        $data['Aboutme'] = $this->About_model->tampil_data_aboutme()->result();
        $data['Post'] = $this->About_model->ambildata_course()->result();
        $this->load->view('about', $data);
    }
}
