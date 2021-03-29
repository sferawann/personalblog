<?php
class PKM extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('superadmin/Pkm_model', 'pkm_model');
        $this->load->library('upload');
        $this->load->helper('text');
    }

    function index()
    {
        $x['data'] = $this->pkm_model->get_all_pkm();
        $this->load->view('superadmin/v_PKM', $x);
    }

    function add_new()
    {
        $this->load->view('superadmin/v_add_PKM');
    }


    function publish()
    {
        $data['publish'] = $this->pkm_model->save_pkm();
        echo $this->session->set_flashdata('msg', 'success');
        redirect('superadmin/PKM');
    }

    function delete()
    {
        $id_pkm = $this->input->post('id', TRUE);
        $this->pkm_model->delete_pkm($id_pkm);
        echo $this->session->set_flashdata('msg', 'success-delete');
        redirect('superadmin/PKM');
    }
}
