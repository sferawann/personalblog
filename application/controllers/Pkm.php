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
        $data['Course'] = $this->Pkm_model->ambildata_course()->result();
        $data['Research'] = $this->Pkm_model->ambildata_research()->result();
        $this->load->view('pkm', $data);
    }
}
