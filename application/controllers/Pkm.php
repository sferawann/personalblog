<?php

class Pkm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pkm_model');
    }

    public function index()
    {
        $data['Pkm'] = $this->Pkm_model->tampil_data()->result();
        $data['Post'] = $this->Pkm_model->ambildata_course()->result();
        $this->load->view('pkm', $data);
    }
}
