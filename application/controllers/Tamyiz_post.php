<?php

class Tamyiz_post extends CI_Controller
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
        $data['User'] = $this->Tamyiz_model->ambildata_user()->result();
        $this->load->view('tamyiz_post', $data);
    }

    public function tampil_by_id($id)
    {
        $data['Tamyiz'] = $this->Tamyiz_model->tampil_by_id($id)->result();
        // var_dump($data['Tamyiz']);
        // die;

        $this->load->view('tamyiz_post', $data);

    }
}
