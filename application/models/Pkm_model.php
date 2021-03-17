<?php

class Pkm_Model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('p.id_pkm, p.author_pkm, p.tittle_pkm, p.jurnalname_pkm, p.publisher_pkm,p.volume_pkm, p.tanggal_pkm, 
        p.page_pkm, p.permalink_pkm, p.contens_pkm, p.metadescription_pkm,c.id_course,c.tittle_course, r.id_research, r.tittle_research, 
        r.link_research, r.abstract_research, r.publisher_research,r.jurnalname_research, r.author_research, r.volume_research, 
        r.date_research, r. pages_research, c.id_course,c.tittle_course')->from('pkm as p');
        $this->db->join('course as c', 'p.id_pkm = c.id_course', 'left');
        $this->db->join('research as r', 'p.id_pkm = r.id_research', 'left');
        $pkm = $this->db->get();
        return $pkm;
    }
    function ambildata_course()
    {
        $course = $this->db->get('course');
        return $course;
    }
    function ambildata_research()
    {
        $research = $this->db->get('research');
        return $research;
    }
}
