<?php

class Tamyiz extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tamyiz_model');
    }

    public function index()
    {
        $data['Tamyiz'] = $this->Tamyiz_model->tampil_data()->result();
        $data['Post'] = $this->Tamyiz_model->ambildata_course()->result();
        $this->load->view('tamyiz', $data);
    }

    // public function tampil_by_id($id)
    // {
    //     $data['Tamyiz'] = $this->tamyiz_model->tampil_by_id($id)->result();
    // }
}
