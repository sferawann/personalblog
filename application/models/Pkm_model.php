<?php

class Pkm_Model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('p.id_pkm, p.author_pkm, p.tittle_pkm, p.jurnalname_pkm, p.publisher_pkm,p.volume_pkm, p.tanggal_pkm, 
        p.page_pkm, p.permalink_pkm, p.contens_pkm, p.metadescription_pkm, r.id_research, r.tittle_research, 
        r.link_research, r.abstract_research, r.publisher_research,r.jurnalname_research, r.author_research, r.volume_research, 
        r.date_research, r.pages_research, pt.id_post,pt.tittle_post')->from('pkm as p');
        $this->db->join('post as pt', 'p.id_pkm = pt.id_post', 'left');
        $this->db->join('research as r', 'p.id_pkm = r.id_research', 'left');
        $pkm = $this->db->get();
        return $pkm;
    }
    function ambildata_course()
    {
        $course = $this->db->get('post');
        return $course;
    }
    function ambildata_research()
    {
        $research = $this->db->get('research');
        return $research;
    }
}
