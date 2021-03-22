<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index()
    {
        $data['Home'] = $this->Home_model->tampil_data()->result();
        $data['Post'] = $this->Home_model->ambildata_course()->result();
        $this->load->view('home', $data);
    }
}
