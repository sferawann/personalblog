<?php

class Pkm_Model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('p.id_pkm, p.namakegiatan_pkm, p.ketuanjurusan_pkm, p.anggotajurusan_pkm, p.mitra_pkm, p.lingkup_pkm, 
        p.mulai_pkm, p.selesai_pkm, p.sumberdana_pkm, p.jumlahdana_pkm, pt.id_post,pt.tittle_post')->from('pkm as p');
        $this->db->join('post as pt', 'p.id_pkm = pt.id_post', 'left');
        $pkm = $this->db->get();
        return $pkm;
    }
    function ambildata_course()
    {
        $course = $this->db->get('post');
        return $course;
    }
}
