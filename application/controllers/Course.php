<?php

class Course extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Course_model');
    }

    function index()
    {
        $data['Post'] = $this->Course_model->tampil_data()->result();
        $this->load->view('course', $data);
    }
}
