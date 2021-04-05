<?php
class Pkm_model extends CI_Model
{

    //BACKEND
    function get_all_pkm()
    {
        $result = $this->db->query("SELECT id_pkm, namakegiatan_pkm, ketuanjurusan_pkm, anggotajurusan_pkm, mitra_pkm, 
        lingkup_pkm, mulai_pkm, selesai_pkm, sumberdana_pkm, jumlahdana_pkm FROM pkm");
        return $result;
    }

    function get_pkm_by_id($id_pkm)
    {
        $result = $this->db->query("SELECT * FROM pkm WHERE id_pkm='$id_pkm'");
        return $result;
    }

    function save_pkm()
    {
        $this->form_validation->set_rules('namakegiatan_pkm', 'namakegiatan_pkm', 'required');
        $this->form_validation->set_rules('ketuanjurusan_pkm', 'ketuanjurusan_pkm', 'required');
        $this->form_validation->set_rules('anggotajurusan_pkm', 'anggotajurusan_pkm', 'required');
        $this->form_validation->set_rules('mitra_pkm', 'mitra_pkm', 'required');
        $this->form_validation->set_rules('lingkup_pkm', 'lingkup_pkm', 'required');
        $this->form_validation->set_rules('mulai_pkm', 'mulai_pkm', 'required');
        $this->form_validation->set_rules('selesai_pkm', 'selesai_pkm', 'required');
        $this->form_validation->set_rules('sumberdana_pkm', 'sumberdana_pkm', 'required');
        $this->form_validation->set_rules('jumlahdana_pkm', 'jumlahdana_pkm', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('superadmin/v_add_PKM');
        } else {
            $data = array(
                'namakegiatan_pkm'       => $this->input->post('namakegiatan_pkm'),
                'ketuanjurusan_pkm'      => $this->input->post('ketuanjurusan_pkm'),
                'anggotajurusan_pkm'     => $this->input->post('anggotajurusan_pkm'),
                'mitra_pkm'              => $this->input->post('mitra_pkm'),
                'lingkup_pkm'            => $this->input->post('lingkup_pkm'),
                'mulai_pkm'              => $this->input->post('mulai_pkm'),
                'selesai_pkm'            => $this->input->post('selesai_pkm'),
                'sumberdana_pkm'         => $this->input->post('sumberdana_pkm'),
                'jumlahdana_pkm'         => $this->input->post('jumlahdana_pkm')
            );
            $this->db->insert('pkm', $data);
            $this->load->view('superadmin/v_add_PKM');
        }
    }

    function edit_pkm()
    {
        $id_pkm                 = $this->input->post('id_pkm');
        $namakegiatan_pkm       = $this->input->post('namakegiatan_pkm');
        $ketuanjurusan_pkm      = $this->input->post('ketuanjurusan_pkm');
        $anggotajurusan_pkm     = $this->input->post('anggotajurusan_pkm');
        $mitra_pkm              = $this->input->post('mitra_pkm');
        $lingkup_pkm            = $this->input->post('lingkup_pkm');
        $mulai_pkm              = $this->input->post('mulai_pkm');
        $selesai_pkm            = $this->input->post('selesai_pkm');
        $sumberdana_pkm         = $this->input->post('sumberdana_pkm');
        $jumlahdana_pkm         = $this->input->post('jumlahdana_pkm');

        $data = array(
            'id_pkm'                => $id_pkm,
            'namakegiatan_pkm'      => $namakegiatan_pkm,
            'ketuanjurusan_pkm'     => $ketuanjurusan_pkm,
            'anggotajurusan_pkm'    => $anggotajurusan_pkm,
            'mitra_pkm'             => $mitra_pkm,
            'lingkup_pkm'           => $lingkup_pkm,
            'mulai_pkm'             => $mulai_pkm,
            'selesai_pkm'           => $selesai_pkm,
            'sumberdana_pkm'        => $sumberdana_pkm,
            'jumlahdana_pkm'        => $jumlahdana_pkm
        );

        $this->db->where('id_pkm', $id_pkm);
        $this->db->update('pkm', $data);
    }

    function delete_pkm($id_pkm)
    {
        $this->db->where('id_pkm', $id_pkm);
        $this->db->delete('pkm');
    }
}
