<?php

class Course_Post extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Course_model');
    }

    function index($id)
    {
        $data['Post'] = $this->Course_model->tampil_data_id($id)->result();
        var_dump($data['Post']);
        die;
        // $this->load->view('course_post', $data);
    }
}
