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

    function get_edit()
    {
        $id_pkm = $this->uri->segment(4);
        $x['data'] = $this->pkm_model->get_pkm_by_id($id_pkm);
        $this->load->view('superadmin/v_edit_PKM', $x);
    }

    function publish()
    {
        $data['publish'] = $this->pkm_model->save_pkm();
        echo $this->session->set_flashdata('msg', 'success');
        redirect('superadmin/PKM');
    }

    function edit()
    {
        $id                 = $this->input->post('id_pkm', TRUE);
        $namak              = strip_tags(htmlspecialchars($this->input->post('namakegiatan_pkm', TRUE), ENT_QUOTES));
        $ketuanjurusan      = $this->input->post('ketuanjurusan_pkm');
        $anggotajurusan     = $this->input->post('anggotajurusan_pkm', TRUE);
        $mitra              = $this->input->post('mitra_pkm', TRUE);
        $lingkup            = $this->input->post('lingkup_pkm', TRUE);
        $mulai              = $this->input->post('mulai_pkm', TRUE);
        $selesai            = $this->input->post('selesai_pkm', TRUE);
        $sumberdana         = $this->input->post('sumberdana_pkm', TRUE);
        $jumlahdana         = $this->input->post('jumlahdana_pkm', TRUE);

        $this->pkm_model->edit_pkm(
            $id,
            $namak,
            $ketuanjurusan,
            $anggotajurusan,
            $mitra,
            $lingkup,
            $mulai,
            $selesai,
            $sumberdana,
            $jumlahdana
        );
        echo $this->session->set_flashdata('msg', 'info');
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
