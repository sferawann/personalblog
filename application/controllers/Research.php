<?php

class Research extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Research_model');
    }

    function index()
    {
        $data['Research'] = $this->Research_model->tampil_data()->result();
        $data['Course'] = $this->Research_model->ambildata_course()->result();
        $this->load->view('research', $data);
    }
}
